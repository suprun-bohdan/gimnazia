<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

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
                $fileName = utf8_encode($file->getClientOriginalName());
                $filePath = $file->storeAs("pages/{$page->id}", $fileName, 'public');
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
        $page = Page::where('page_id', $page_id)->first();
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
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, Page $page)
    {
        $pages = Page::all();
        return view('admin.pages.view', ['pages'=> $pages]);
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
