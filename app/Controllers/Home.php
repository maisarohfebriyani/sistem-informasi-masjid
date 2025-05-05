<?php

namespace App\Controllers;
use App\Models\ModelHome;

class Home extends BaseController
{
    protected $ModelHome;

    public function __construct()
    {
        $this->ModelHome = new ModelHome(); // inisialisasi ModelHome
    }

    public function index()
    {
       
        $data = [
            'judul' => 'Home',
            'page'  => 'v_home', 
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
