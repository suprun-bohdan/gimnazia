<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
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
    public function create()
    {
        return view('admin.settings.create');
    }

    public function createField(Request $request)
    {
        $p_img = null;
        $time = null;
        $folderName = date('Y-m-d');
        if (!empty($request->file('data'))) :
            $p_img = $request->file('data')->store("img/{$folderName}", 'public');
        endif;
        if ($p_img !== null) {
            Setting::create([
                'value' => $request->value,
                'data' => $p_img,
            ]);
        } else {
            Setting::create([
                'value' => $request->value,
                'data' => $request->data,
            ]);
        }
        return redirect()->route('showSettings');
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
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        $settings = Setting::all();

        return view('admin.settings.show', ['settings' => $settings]);
    }

    public function edit(Request $request)
    {
        $setting = Setting::find($request->id);
        $setting->value = $request->value;
        $setting->data = $request->data;
        $setting->save();
        return redirect()->route('showSettings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function editField($id)
    {
        $setting = Setting::where('id', $id)->first();

        return view('admin.settings.edit', ['setting' => $setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setting::destroy($id);
        return redirect()->route('showSettings');
    }
}
