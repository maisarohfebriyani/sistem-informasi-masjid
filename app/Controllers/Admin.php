<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelAdmin;

class Admin extends Controller
{
    protected $ModelAdmin;

    public function __construct() 
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Dashboard',
            'subjudul'  => '',
            'menu'      => 'dashboard',
            'sub-menu'  => '',
            'page'      => 'v_dashboard',
        ];

        return view('v_template_admin', $data);
    }

    public function setting()
    {
        // Ambil data kota dari API MyQuran
        $url  = 'https://api.myquran.com/v2/sholat/kota/semua';
        $kota = json_decode(file_get_contents($url),true); // decode agar bisa diakses sebagai array

        // Data yang dikirim ke view
       $data = [
            'judul'     => 'Setting',
            'subjudul'  => '',
            'menu'      => 'setting',
            'sub-menu'  => '',
            'page'      => 'v_setting',
            'setting'   => $this->ModelAdmin->ViewSetting(),
            'kota'      => $kota,
        ];

        return view('v_template_admin', $data);

    }

    public function UpdateSetting()
    {
        $data = [
            'id' => 1,
            'nama_masjid' => $this->request->getPost('nama_masjid'),
            'id_kota' => $this->request->getPost('id_kota'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $this->ModelAdmin->UpdateSetting($data);
        session()->setFlashdata('pesan', 'Setting Berhasil Diupdate !!');
        return redirect()->to(base_url('Admin/Setting'));
    }
}
