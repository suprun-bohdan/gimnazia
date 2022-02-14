<?php

namespace App\Http\Controllers;

use App\Nav;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        $navs = Nav::all();
        return view('admin.navs.index', ['navs' => $navs, 'pages' => $pages]);
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
        Nav::create([
            'value' => htmlspecialchars($request->value),
            'uri' => htmlspecialchars($request->uri),
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('navPage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nav  $nav
     * @return \Illuminate\Http\Response
     */
    public function show(Nav $nav)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nav  $nav
     * @return \Illuminate\Http\Response
     */
    public function edit(Nav $nav)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nav  $nav
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nav $nav)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nav  $nav
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nav::where('id', $id)->delete();
        return redirect()->route('navPage');
    }
}
