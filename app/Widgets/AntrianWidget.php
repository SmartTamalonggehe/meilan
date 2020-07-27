<?php

namespace App\Widgets;

use App\Antrian;
use App\Dokter;
use App\pasien;
use App\Poli;
use App\smsKeluar;
use App\SmsMasuk;
use Carbon\CarbonImmutable;
use Arrilot\Widgets\AbstractWidget;

class AntrianWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    public $reloadTimeout = 10;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $smsMasuk=SmsMasuk::where('Processed','false')->first();
        if (!$smsMasuk) {
            return 0;
        }

        $sekarang=CarbonImmutable::now();
        $tgl=$sekarang->isoFormat('Y-MM-d');
        $pesan= $smsMasuk->TextDecoded;
        $hurufKecil=strtolower($pesan);

        $kunciPoli=substr($hurufKecil,6);
        $kunciAntri=substr($hurufKecil,0,6);
        // Periksa Kata Kunci
        if ($kunciAntri=='antri ') {
            $pasien=pasien::where('no_hp',$smsMasuk->SenderNumber)->first();
            // Periksa Jika No sms terdaftar
            if ($pasien) {
                $kd_poli=Poli::where('nm_poli', 'like', '%'.$kunciPoli. '%')->first();
                // Periksa Poli Tujuan
                if ($kd_poli) {
                    $statusAntri= Antrian::orderByDesc('no_antri')->where('id_pasien',$pasien->id)->where('tgl_antri',$tgl)->where('status','tunggu')->first();
                    $cekDokter= Dokter::with('poli')->where('id',$statusAntri->id_dokter)->first();
                    
                    if (!$statusAntri) {
                        $ket = Dokter::where('id_poli',$kd_poli->id)->first();
                        $antrian = Antrian::where('tgl_antri',$tgl)->where('id_dokter',$ket->id)->count();
                        $noAntri=$antrian+1;
                        // Simpan No Antrian
                        $simpan = Antrian::create([
                            'id_dokter'=>$ket->id,
                            'id_pasien'=>$pasien->id,
                            'tgl_antri'=>$tgl,
                            'status'=>'tunggu',
                            'no_antri'=>$noAntri,
                        ]);
                        $balasan="Poli $kd_poli->nm_poli. Dokter $ket->nm_dokter. No Antrian: $noAntri";
                    }else{
                        $balasan="Anda sedang dalam antrian pada ".$cekDokter->poli->nm_poli. ". No Antrian: $statusAntri->no_antri";
                    }
                }else {
                    $balasan="Maaf Poli yang anda maksud tidak ada.";
                }

            }else{
                $balasan="Maaf No Anda Belum Terdaftar.";
            }

        }else{
            $balasan='Maaf Format Salah. Ketik ANTRI<spasi>Nama Poli. Contoh ANTRI JANTUNG.';
        }

        $tambah = smsKeluar::create([
            'DestinationNumber'=>$smsMasuk->SenderNumber,
            'TextDecoded'=>$balasan,
            'CreatorID'=>'1',
        ]);

        $ubah =SmsMasuk::where('UpdatedInDB',$smsMasuk->UpdatedInDB)
        ->update([
            'Processed'=>'true',
        ]);
    return 0;
    }
}
