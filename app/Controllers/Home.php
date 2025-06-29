<?php

namespace App\Controllers;

use App\Models\ModelHome;
use App\Models\ModelAdmin;
use App\Models\ModelKasMasjid;
use App\Models\ModelKasSosial;
use App\Models\ModelTahun;

class Home extends BaseController
{
    protected $ModelHome;
    protected $ModelAdmin;
    protected $ModelKasMasjid;
    protected $ModelKasSosial;
    protected $ModelTahun;

    public function __construct()
    {
        $this->ModelHome = new ModelHome(); 
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->ModelKasSosial = new ModelKasSosial();
        $this->ModelTahun = new ModelTahun();
    }

    public function index()
    {
        $setting = $this->ModelAdmin->ViewSetting();

        // Mengambil data jadwal sholat dari API
        $url = 'https://api.myquran.com/v2/sholat/jadwal/' . $setting['id_kota'] . '/' . date('Y') . '/' . date('m') . '/' . date('d');
        $waktu = json_decode(file_get_contents($url), true);

        $data = [
            'judul'     => 'Home',
            'page'      => 'v_home', 
            'waktu'     => $waktu,
            'kas'       => $this->ModelKasMasjid->AllData(),
            'kas_s'     => $this->ModelKasSosial->AllData(),
        ];

        return view('v_tamplate', $data);
    }

    public function Agenda()
    {
        $data = [
            'judul'     => 'Agenda',
            'page'      => 'front-end/v_agenda',
            'agenda'    => $this->ModelHome->Agenda(),
        ];

        return view('v_tamplate', $data);
    }

    public function PesertaQurban()
    {
        $tahun_masehi = date('Y');
        $tahun_hijriyah = $tahun_masehi - 579;

        $data = [
            'judul'     => 'Peserta Qurban ' . $tahun_hijriyah . ' H / ' . $tahun_masehi . ' M',
            'page'      => 'front-end/v_peserta_qurban',
            'kelompok'  => $this->ModelHome->AllDataKelompok(),
        ];

        return view('v_tamplate', $data);
    }

    public function RekapKasMasjid()
    {
        $data = [
            'judul'     => 'Rekap Kas Masjid',
            'page'      => 'front-end/v_rekap_kas',
            'kas'       => $this->ModelHome->AllDataKasMasjid(),
        ];

        return view('v_tamplate', $data);
    }

    public function RekapKasSosial()
    {
        $data = [
            'judul'     => 'Rekap Kas Sosial',
            'page'      => 'front-end/v_rekap_kas',
            'kas'       => $this->ModelHome->AllDataKasSosial(),
        ];

        return view('v_tamplate', $data);
    }
}
