<?php

namespace App\Controllers;
use App\Models\ModelHome;
use App\Models\ModelAdmin;

class Home extends BaseController
{
    protected $ModelHome;

    public function __construct()
    {
        $this->ModelHome = new ModelHome(); 
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $setting = $this->ModelAdmin->ViewSetting();

        $url = 'https://api.myquran.com/v2/sholat/jadwal/'.$setting[id_kota].'/'.date('Y').'/'.date('m').'/'.date('d');

        $waktu = json_decode(file_get_contents($url), true);

        $data = [
            'judul' => 'Home',
            'page'  => 'v_home', 
            'waktu' =>  $waktu,
        ];

        return view('v_tamplate', $data); // Memanggil view template dengan data
    }

    public function Agenda()
    {
        // Ambil data agenda dari model
        $data = [
            'judul' => 'Agenda',
            'page'  => 'front-end/v_agenda', // Pastikan file view sesuai
            'agenda' => $this->ModelHome->Agenda(),
        ];

        return view('v_tamplate', $data); // Memanggil view template dengan data
    }
}
