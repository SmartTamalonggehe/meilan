<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Antrian;
use App\Dokter;
use App\pasien;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter=Dokter::orderBy('nm_dokter')->where('id_poli','NOT LIKE',1)->get();
        $pasien=pasien::orderBy('nm_pasien')->get();
        return view('admin.antrian.index',[
            'dokter'=>$dokter,
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
        $sekarang=Carbon::now();
        $tgl=$sekarang->isoFormat('Y-MM-DD');

        $antrian=Antrian::orderByDesc('no_antri')->where('tgl_antri',$tgl)->get();
        return view('admin.antrian.data',[
            'antrian'=>$antrian,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sekarang=Carbon::now();
        $tgl=$sekarang->isoFormat('Y-MM-DD');

        $antrian=Antrian::where('tgl_antri',$tgl)->where('id_dokter',$request->id_dokter)->first();
        
        if (!$antrian) {
            $no_antrian=1;
        }else{
            $no_antrian=$antrian->no_antri+1;
        }
        
        
        $data = Antrian::create([
            'id_dokter'=>$request->id_dokter,
            'id_pasien'=>$request->id_pasien,
            'tgl_antri'=>$tgl,
            'status'=>'tunggu',
            'no_antri'=>$no_antrian,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function show(Antrian $antrian)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Antrian::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sekarang=Carbon::now();
        $tgl=$sekarang->isoFormat('Y-MM-DD');

        $data =Antrian::where('id',$id)
            ->update([
                'id_kelurahan'=>$request->id_kelurahan,
                'id_jasa'=>$request->id_jasa,
                'hari'=>$request->hari,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Antrian $antrian)
    {
        $antrian->delete();
    }
}
