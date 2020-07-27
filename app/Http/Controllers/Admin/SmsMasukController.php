<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SmsMasuk;
use Illuminate\Http\Request;

class SmsMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.smsMasuk.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SmsMasuk  $smsMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(SmsMasuk $smsMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SmsMasuk  $smsMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(SmsMasuk $smsMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SmsMasuk  $smsMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmsMasuk $smsMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SmsMasuk  $smsMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmsMasuk $smsMasuk)
    {
        //
    }
}
