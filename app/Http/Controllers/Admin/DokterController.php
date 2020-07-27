<?php

namespace App\Http\Controllers\Admin;

use App\Dokter;
use App\Http\Controllers\Controller;
use App\Poli;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $poli=Poli::where('nm_poli','NOT LIKE','ADMIN')->get();
        if ($request->ajax()) {
            $data = DB::table('dokter')
                ->join('poli','poli.id','=','dokter.id_poli')
                ->select('dokter.id','nm_poli','nm_dokter','jenkel','alamat')
                ->where('poli.nm_poli','NOT LIKE','ADMIN')
                ->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', 'Admin.dokter.aksi')
                    ->rawColumns(['aksi'])
                    ->make(true);
        }
      
        return view('Admin.dokter.index',[
            'poli'=>$poli,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|unique:users|max:50',
        ],[
            'email.unique'=>'email Sudah ada',
        ]);
        
        $dokter = new Dokter();
        $dokter->id_poli=$request->id_poli;
        $dokter->nm_dokter =$request->nm_dokter;
        $dokter->password =$request->password;
        $dokter->jenkel=$request->jenkel;
        $dokter->alamat=$request->alamat;
        $dokter->save();

        $id_dokter=Dokter::orderByDesc('id')->first();
        
        $user= User::create([
            'name' => $request->nm_dokter,
            'email' => $request->email,
            'id_dokter' => $id_dokter->id,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('Dokter');
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dokter::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =Dokter::where('id',$id)
            ->update([
                'id_poli'=>$request->id_poli,
                'nm_dokter'=>$request->nm_dokter,
                'jenkel'=>$request->jenkel,
                'alamat'=>$request->alamat,
            ]);
        
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $Dokter)
    {
        $Dokter->delete();
    }
}
