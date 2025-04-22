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

    // Method ini akan dipanggil ketika mengakses /Home atau /Home/index
    public function index()
    {
        $data = [
            'judul' => 'Agenda',
            'page'  => 'front-end/v_Agenda',  // Pastikan file view sesuai
            'agenda' => $this->ModelHome->Agenda(), // Ambil data agenda dari model
        ];

        // Menampilkan halaman dengan data yang sudah dipersiapkan
        return view('v_tamplate', $data);
    }
}
