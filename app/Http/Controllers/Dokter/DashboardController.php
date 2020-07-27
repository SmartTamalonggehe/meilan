<?php

namespace App\Http\Controllers\Dokter;

use App\Antrian;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{  
    
    public function index ()
    {
        return view('Dokter.dashboard.index'); 
    }
    // Tampilkan No urut 
    public function showNoUrut()
    {
        $sekarang=Carbon::now();
        $tgl=$sekarang->isoFormat('Y-MM-DD');

        $id_dokter= Auth::user()->dokter->id;

        $noUrutSekarang=Antrian::orderBy('no_antri')
            ->where('status','tunggu')
            ->where('tgl_antri',$tgl)
            ->where('id_dokter','LIKE',"%$id_dokter")
            ->first();
        
        if (!$noUrutSekarang) {
            return view('Dokter.dashboard.noUrut',[
                'noUrutSekarang'=>$noUrutSekarang,
            ]);
        }

        $noUrutSebelumnya=Antrian::orderBy('no_antri')
            ->where('tgl_antri',$tgl)
            ->where('id_dokter','LIKE',"%$id_dokter")
            ->where('no_antri',$noUrutSekarang->no_antri-1)
            ->first();

        $noUrutSelanjutnya=Antrian::orderBy('no_antri')
            ->where('tgl_antri',$tgl)
            ->where('id_dokter','LIKE',"%$id_dokter")
            ->where('no_antri',$noUrutSekarang->no_antri+1)
            ->first();
        

       
        return view('Dokter.dashboard.noUrut',[
            'noUrutSekarang'=>$noUrutSekarang,
            'noUrutSebelumnya'=>$noUrutSebelumnya,
            'noUrutSelanjutnya'=>$noUrutSelanjutnya,
        ]);
    }

    // Menambahkan No Urut
    public function selanjutnya ()
    {
        $sekarang=Carbon::now();
        $tgl=$sekarang->isoFormat('Y-MM-DD');

        $id_dokter= Auth::user()->dokter->id;

        $noUrutSekarang=Antrian::orderBy('no_antri')
            ->where('status','tunggu')
            ->where('tgl_antri',$tgl)
            ->where('id_dokter','LIKE',"%$id_dokter")
            ->first();
        
        $data =Antrian::where('id',$noUrutSekarang->id)
            ->update([
                'status'=>'selesai',
            ]);
    }


    // Mengurangi No Urut
    public function sebelumnya (Request $request)
    {
        $sekarang=Carbon::now();
        $tgl=$sekarang->isoFormat('Y-MM-DD');

        $id_dokter= Auth::user()->dokter->id;

        $noUrutSekarang=Antrian::orderBy('no_antri')
            ->where('status','tunggu')
            ->where('tgl_antri',$tgl)
            ->where('id_dokter','LIKE',"%$id_dokter")
            ->first();
        
        $data =Antrian::where('no_antri',$noUrutSekarang->no_antri-1)
            ->update([
                'status'=>'tunggu',
            ]);
    }



}
