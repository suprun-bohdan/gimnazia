<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageUploader;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Redirect;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $p_img = null;
        $time = null;
        $folderName = date('Y-m-d');
        if (!empty($request->file('preview_image'))) :
            $p_img = $request->file('preview_image')->store("img/{$folderName}", 'public');
        endif;

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
            'time' => $time,
        ]);

        return Redirect::away(route('post', $post->id));
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
        return \redirect()->back();
    }
}
