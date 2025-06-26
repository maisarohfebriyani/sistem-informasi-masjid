<?php

namespace App\Controllers;
use App\Models\ModelHome;
use App\Models\ModelAdmin;
use App\Models\ModelKasMasjid;
use App\Models\ModelKasSosial;

class Home extends BaseController
{
    protected $ModelHome;
    protected $ModelAdmin;
    protected $ModelKasMasjid;
    protected $ModelKasSosial;

    public function __construct()
    {
        $this->ModelHome = new ModelHome(); 
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->ModelKasSosial = new ModelKasSosial();
    }

    public function index()
    {
        $setting = $this->ModelAdmin->ViewSetting();
        $url = 'https://api.myquran.com/v2/sholat/jadwal/' . $setting['id_kota'] . '/' . date('Y') . '/' . date('m') . '/' . date('d');

        // Gunakan CURL untuk menghindari error SSL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // HATI-HATI: Jangan gunakan ini di production kecuali sertifikat sudah valid
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

        $response = curl_exec($ch);
        curl_close($ch);

        $waktu = json_decode($response, true);

        $data = [
            'judul'    => 'Home',
            'page'     => 'v_home', 
            'waktu'    => $waktu,
            'kas'      => $this->ModelKasMasjid->AllData(),
            'kas_s'    => $this->ModelKasSosial->AllData(),
        ];

        return view('v_tamplate', $data);
    }

    public function Agenda()
    {
        $data = [
            'judul'  => 'Agenda',
            'page'   => 'front-end/v_agenda',
            'agenda' => $this->ModelHome->Agenda(),
        ];

        return view('v_tamplate', $data);
    }
}
