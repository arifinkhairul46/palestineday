<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\ListDonasi;
use App\Models\Nominal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $opsi_nominal = Nominal::all();

        $nama_siswa = Donatur::select('nama_anak', 'sekolah_id')->get();

        return view('index', compact('opsi_nominal', 'nama_siswa'));
    }

    public function simpan_donasi(Request $request) {
        $nama_ortu = $request->nama_ortu;
        $nama_siswa = $request->nama_siswa;
        $no_hp = $request->no_hp;
        $nominal = $request->nominal;
        $doa = $request->doa;
        $tgl_donasi = date('Y-m-d H:i:s');

        $get_lokasi = Donatur::where('nama_anak', $nama_siswa)->first();

        $store_donasi = ListDonasi::create([
            'nama_ortu' => $nama_ortu,
            'nama_siswa' => $nama_siswa,
            'no_hp' => $no_hp,
            'nominal_donasi' => $nominal,
            'doa' => $doa,
            'tgl_donasi' => $tgl_donasi,
            'status' => 1,
            'lokasi' => $get_lokasi->sekolah_id
        ]);


        $message = "Bismillah…

Terimakasih Ayah Bunda $nama_ortu sudah berkenan berdonasi untuk Palestine Day 2025 sebesar Rp. $nominal, Tinggal selangkah lagi yang perlu Ayah Bunda lakukan.🙏😊

Donasi ditransfer melalui rekening berikut :
Bank Syariah Indonesia (BSI)
7500 5000 63  
Atas Nama Sedekah Recehan
---
Semoga Allah SWT senantiasa memberikan kelancaran aktivitas untuk Ayah Bunda $nama_ortu Sekeluarga.

Aamiin Ya Allah Ya Rabbal 'Alamin🤲🤲🤲

'Palestine Day 2025'
*Menyalakan Cinta Palestina dalam Karya*";

        $send_notif = $this->send_notif($no_hp, $message);

        return redirect()->back()->with('success', 'Terimakasih telah berdonasi');

    }


    function send_notif($no_wha, $message)
    {
        $dataSending = array();
        $dataSending["api_key"] = "VDSVRW87NW812KD7";
        $dataSending["number_key"] = "VnI296DztvBrx0ze";
        $dataSending["phone_no"] = $no_wha;
        $dataSending["message"] = $message;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($dataSending),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;
    }
}
