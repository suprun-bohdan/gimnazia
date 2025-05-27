<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage as Storage;
use Illuminate\Http\Request;
use App\Jobs\StorePageFile;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p_img = null;
        $time = null;
        $folderName = date('Y-m-d');

        if (!empty($request->file('preview_image'))) {
            $p_img = $request->file('preview_image')->store("img/{$folderName}", 'public');
        }

        if (!empty($request->time)) {
            $time = $request->time . " " . date("H:i:s", $_SERVER['REQUEST_TIME']);
            $time = Carbon::parse($time)->format('Y-m-d H:i:s');
        }

        $page = Page::create([
            'title' => $request->title,
            'text' => $request->text,
            'p_img' => $p_img,
            'time' => $time,
        ]);
        $files = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = "pages/".time()."/{$fileName}";

                dispatch(new StorePageFile($file, $filePath));

                $tempArray = [
                    'id' => $key,
                    'path' => $filePath
                ];
                $files[] = $tempArray;
            }
        }

        $page->files = json_encode($files);
        $page->save(['page_id' => $page->id]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    public function fileDestroy($page_id, $id) {
        $page = Page::where('page_id', $page_id)->firstOrFail();
        $files = json_decode($page->files, true);
        $files = array_filter($files, function($file) use ($id) {
            return $file['id'] != $id;
        });
        $page->update(['files' => json_encode($files)]);
        $page->files = json_encode($files);
        $result = $page->save();
        if ($result) {
            return redirect()->back();
        } else {
            return abort(500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($page_id)
    {
        $page = Page::where('page_id', $page_id)->firstOrFail();
        return view('admin.pages.edit', ['page'=> $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $page_id)
    {
        $page = Page::find($page_id);
        $page->title = $request->input('title');
        $page->text = $request->input('text');
        if (!empty($page->p_img)) :
            $page->p_img = $request->file('preview_image', $page->p_img);
        endif;
        $page->time = $request->time ? Carbon::parse($request->time)->format('Y-m-d H:i:s') : null;

        $oldFiles = json_decode($page->files, true);

        $newFiles = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = "pages/".time()."/{$fileName}";

                dispatch(new StorePageFile($file, $filePath));

                $tempArray = [
                    'id' => $key,
                    'path' => $filePath
                ];
                $newFiles[] = $tempArray;
            }
        }

        $mergedFiles = array_merge($oldFiles, $newFiles);

        if (!empty($newFiles)) {
            $page->files = json_encode($mergedFiles);
        }

        $page->save();

        return redirect()->route('page', $page_id);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view(Request $request)
    {
        $query = Page::select('page_id', 'title', 'time')->orderByDesc('time');

        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        $pages = $query->paginate(20);

        if ($request->ajax()) {
            return view('admin.pages._table_rows', ['pages' => $pages]);
        }

        return view('admin.pages.view', ['pages' => $pages]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Page::where('page_id', $id)->delete()) {
            return response()->json([
                'message' => 'Сторінка успішно видалена!'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Виникла непередбачена помилка!'
            ], 200);
        }
    }
}
