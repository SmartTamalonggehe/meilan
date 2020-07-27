<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poli=DB::table('poli')->where('nm_poli','NOT LIKE','ADMIN')->get();
        return view('Admin.poli.index');
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
        $poli = new Poli();
        $poli->nm_poli=$request->nm_poli;

        $poli->save();
        return $poli;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Poli::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =Poli::where('id',$id)
            ->update([
                'nm_poli'=>$request->nm_poli,
            ]);
        
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poli $Poli)
    {
        $Poli->delete();
    }
}
