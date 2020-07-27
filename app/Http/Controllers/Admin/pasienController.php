<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('pasien')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', 'Admin.pasien.aksi')
                    ->rawColumns(['aksi'])
                    ->make(true);
        }
      
        return view('Admin.pasien.index');
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
        $nohp = $request->no_hp;
        $nohp = str_replace(" ","",$nohp);
        // kadang ada penulisan no hp 0811 239 345
        $nohp = str_replace("(","",$nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace(")","",$nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace(".","",$nohp);
        // kadang ada penulisan no hp 0811.239.345 
        if(!preg_match('/[^+0-9]/',trim($nohp)))
        // cek apakah no hp mengandung karakter + dan 0-9
        {
            if(substr(trim($nohp), 0, 3)=='+62')
            // cek apakah no hp karakter 1-3 adalah +62
            {
                $hp = trim($nohp);
            }
            elseif(substr(trim($nohp), 0, 1)=='0')
            // cek apakah no hp karakter 1 adalah 0
            {
                $hp = '+62'.substr(trim($nohp), 1);
            }
            // fungsi trim() untuk menghilangan
            // spasi yang ada didepan/belakang
        }
        else
        {
            $hp = 'Format no hp yang dimasukkan tidak lengkap atau salah!';
        }
        $pasien = new pasien();
        $pasien->no_pengenal=$request->no_pengenal;
        $pasien->jenis_p=$request->jenis_p;
        $pasien->nm_pasien=$request->nm_pasien;
        $pasien->jenkel=$request->jenkel;
        $pasien->gol_darah=$request->gol_darah;
        $pasien->tempat=$request->tempat;
        $pasien->tgl_lahir=$request->tgl_lahir;
        $pasien->umur=$request->umur;
        $pasien->no_hp=$hp;
        $pasien->alamat=$request->alamat;

        $pasien->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = pasien::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nohp = $request->no_hp;
        $nohp = str_replace(" ","",$nohp);
        // kadang ada penulisan no hp 0811 239 345
        $nohp = str_replace("(","",$nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace(")","",$nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace(".","",$nohp);
        // kadang ada penulisan no hp 0811.239.345 
        if(!preg_match('/[^+0-9]/',trim($nohp)))
        // cek apakah no hp mengandung karakter + dan 0-9
        {
            if(substr(trim($nohp), 0, 3)=='+62')
            // cek apakah no hp karakter 1-3 adalah +62
            {
                $hp = trim($nohp);
            }
            elseif(substr(trim($nohp), 0, 1)=='0')
            // cek apakah no hp karakter 1 adalah 0
            {
                $hp = '+62'.substr(trim($nohp), 1);
            }
            // fungsi trim() untuk menghilangan
            // spasi yang ada didepan/belakang
        }
        else
        {
            $hp = 'Format no hp yang dimasukkan tidak lengkap atau salah!';
        }

        $data =pasien::where('id',$id)
            ->update([
                'no_pengenal'=>$request->no_pengenal,
                'jenis_p'=>$request->jenis_p,
                'nm_pasien'=>$request->nm_pasien,
                'jenkel'=>$request->jenkel,
                'gol_darah'=>$request->gol_darah,
                'tempat'=>$request->tempat,
                'tgl_lahir'=>$request->tgl_lahir,
                'umur'=>$request->umur,
                'no_hp'=>$hp,
                'alamat'=>$request->alamat,
            ]);
        
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(pasien $pasien)
    {
        $pasien->delete();
    }
}
