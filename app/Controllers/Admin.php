<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelAdmin;
use App\Models\ModelKasMasjid;
use App\Models\ModelKasSosial;

class Admin extends Controller
{
    protected $ModelAdmin;
    protected $ModelKasMasjid;
    protected $ModelKasSosial;

    public function __construct() 
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->ModelKasSosial = new ModelKasSosial();
    }

    public function index()
    {
        $data = [
            'judul'      => 'Dashboard',
            'subjudul'   => '',
            'menu'       => 'dashboard',
            'submenu'    => '',
            'page'       => 'v_dashboard',
            'kas'        => $this->ModelKasMasjid->AllData(),
            'kas_s'      => $this->ModelKasSosial->AllData(),
            'kasmasjid'  => $this->ModelAdmin->AllDataKasMasjid(),
            'kassosial'  => $this->ModelAdmin->AllDataKasSosial(),
        ];

        return view('v_template_admin', $data);
    }

    public function setting()
    {
        // Ambil daftar kota dari API
        $url = 'https://api.myquran.com/v2/sholat/kota/semua';
        $response = @file_get_contents($url);

        if ($response === false) {
            $kota = ['data' => []];
            session()->setFlashdata('error', 'Gagal mengambil daftar kota dari API.');
        } else {
            $kota = json_decode($response, true);
        }

        $data = [
            'judul'    => 'Setting',
            'subjudul'=> '',
            'menu'     => 'setting',
            'submenu'  => '',
            'page'     => 'v_setting',
            'setting'  => $this->ModelAdmin->ViewSetting(),
            'kota'     => $kota,
        ];

        return view('v_template_admin', $data);
    }

    public function UpdateSetting()
    {
        $data = [
            'id'           => 1, // Asumsinya hanya ada 1 data setting
            'nama_masjid'  => $this->request->getPost('nama_masjid'),
            'id_kota'      => $this->request->getPost('id_kota'),
            'alamat'       => $this->request->getPost('alamat'),
        ];

        $this->ModelAdmin->UpdateSetting($data);

        session()->setFlashdata('pesan', 'Setting Berhasil Diupdate!');
        return redirect()->to(base_url('Admin/Setting'));
    }

    public function DonasiMasuk()
    {
        $data = [
            'judul'     => 'Donasi Masuk',
            'menu'      => 'donasi',
            'submenu'   => '',
            'page'      => 'v_donasi_masuk',
            'donasi'    => $this->ModelAdmin->AllDonasi(),
        ];

        return view('v_template_admin', $data);
    }

}
