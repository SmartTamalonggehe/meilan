<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\kartuBerobat;
use App\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class kartuBerobatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pasien=pasien::all();
        if ($request->ajax()) {
            $data = DB::table('krt_berobat')
                ->join('pasien','pasien.id','=','krt_berobat.id_pasien')
                ->select('krt_berobat.id','nm_pasien','tgl_daftar')
                ->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', 'Admin.kartu.aksi')
                    ->rawColumns(['aksi'])
                    ->make(true);
        }
      
        return view('Admin.kartu.index',[
            'pasien'=>$pasien,
        ]);
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
        $this->validate($request,[
            'id_pasien'=>'required|unique:krt_berobat',
        ],[
            'id_pasien.unique'=>'Pasien Sudah ada',
        ]);

        $kartu = new kartuBerobat();
        $kartu->id_pasien=$request->id_pasien;
        $kartu->tgl_daftar=$request->tgl_daftar;

        $kartu->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = kartuBerobat::find($id);
        return $data;
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
        $data =kartuBerobat::where('id',$id)
            ->update([
                'id_pasien'=>$request->id_pasien,
                'tgl_daftar'=>$request->tgl_daftar,
            ]);
        
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pasien $pasien)
    {
        $pasien->delete();
    }
}
