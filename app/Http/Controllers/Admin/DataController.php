<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DataController extends Controller
{
    // Data Poli
    public function Poli()
    {
        $poli = DB::table('poli')->where('nm_poli','NOT LIKE','ADMIN')->get();
        return DataTables::of($poli) 
                            ->addColumn('aksi', 'Admin.poli.aksi')
                            ->addIndexColumn()
                            ->rawColumns(['aksi'])
                            ->toJson();
    }
    // Data Dokter
    public function Dokter()
    {
        $dokter = DB::table('dokter')
                    ->join('poli','dokter.id_poli','=','poli.id')
                    ->select('dokter.id','id_poli','nm_poli','nm_dokter','jenkel','alamat')
                    ->orderBy('nm_poli')
                    ->get();
        return DataTables::of($dokter) 
                            ->addColumn('aksi', 'Admin.dokter.aksi')
                            ->addIndexColumn()
                            ->rawColumns(['aksi'])
                            ->toJson();
    }
}
