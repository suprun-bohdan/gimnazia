<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageUploader;
use App\Jobs\StorePageFile;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'author'])
            ->select('id', 'title', 'category_id', 'author_id', 'created_at')
            ->latest()
            ->paginate(20);

        $categories = Category::all(['id', 'category_name']);

        return view('admin.news.list', compact('posts', 'categories'));
    }

    public function ajaxSearch(Request $request): JsonResponse
    {
        $query = $request->get('q');

        $posts = Post::with(['category', 'author'])
            ->where('title', 'like', '%' . $query . '%')
            ->latest()
            ->limit(30)
            ->get();

        $html = view('admin.news.partials.table_rows', compact('posts'))->render();

        return response()->json(['html' => $html]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $result = $request->validate([
                'title' => 'required|max:255',
                'text' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'time' => 'required',
            ]);

            $p_img = null;
            $time = null;
            $folderName = date('Y-m-d');

            if ($request->hasFile('preview_image')) {
                $tmpPath = $request->file('preview_image')->store('tmp', 'local');
                $folderName = date('Y-m-d');
                $filePath = "img/{$folderName}/" . uniqid() . '.' . $request->file('preview_image')->getClientOriginalExtension();

                StorePageFile::dispatch($tmpPath, $filePath);
                $p_img = $filePath;
            }


            if (!empty($request->time)) {
                $time = $request->time . " " . date("H:i:s", $_SERVER['REQUEST_TIME']);
                $time = Carbon::parse($time)->format('Y-m-d H:i:s');
            }

            $post = Post::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'text' => $request->text,
                'tags' => $request->tags,
                'p_img' => $p_img,
                'author_id' => Auth::id(),
                'description' => $request->description,
                'time' => $time,
            ]);

            $redis = Redis::connection();
            foreach ($redis->keys('search:*') as $key) {
                $redis->del($key);
            }

            Cache::forget('categories:all');

            return response()->json($post, 200);
        } catch (\Throwable $e) {
            Log::error('Post creation error', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json(['error' => 'Не вдалося створити пост'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return response()->json([
            'message' => 'Запис успішно видалено!'
        ], 200);
    }

}
