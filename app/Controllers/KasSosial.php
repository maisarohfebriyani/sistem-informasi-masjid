<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModelKasSosial;

class KasSosial extends BaseController
{
    public function __construct()
    {
        $this->ModelKasSosial = new ModelKasSosial;
    }

    public function index()
    {
        $data = [
            'judul'     => 'Rekap Kas Sosial',
            'subjudul'  => '',
            'menu'      => 'kas-sosial',
            'submenu'   => 'rekap-kas-sosial',
            'page'      => 'kas-sosial/v_rekap_kas_sosial',
            'kas_sosial'       => $this->ModelKasSosial->AllData(),
        ];

        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul'     => 'Kas Sosial Masuk',
            'subjudul'  => '',
            'menu'      => 'kas-sosial',
            'submenu'   => 'kas-masuk',
            'page'      => 'kas-sosial/v_kas_sosial_masuk',
            'kas_sosial'       => $this->ModelKasSosial->AllDataKasMasuk(),
        ];

        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul'     => 'Kas Sosial Keluar',
            'subjudul'  => '',
            'menu'      => 'kas-sosial',
            'submenu'   => 'kas-keluar',
            'page'      => 'kas-sosial/v_kas_sosial_keluar',
            'kas_sosial'       => $this->ModelKasSosial->AllDataKasKeluar(),
        ];

        return view('v_template_admin', $data);
    }

    public function InsertKasMasuk()
    {
    $data = [
        'tanggal' => $this->request->getPost('tanggal'),
        'ket' => $this->request->getPost('ket'),
        'kas_masuk' => $this->request->getPost('kas_masuk'),
        'kas_keluar' => 0,
        'status' => 'Masuk',
    ];

    $this->ModelKasSosial->InsertKasMasuk($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
    return redirect()->to(base_url('KasSosial/KasMasuk'));
    }

    public function InsertKasKeluar()
    {
    $data = [
        'tanggal' => $this->request->getPost('tanggal'),
        'ket' => $this->request->getPost('ket'),
        'kas_masuk' => 0,
        'kas_keluar' => $this->request->getPost('kas_keluar'),
        'status' => 'Keluar',
    ];

    $this->ModelKasSosial->InsertKasKeluar($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
    return redirect()->to(base_url('KasSosial/KasKeluar'));
    }

    public function UpdateKasMasuk($id_kas_sosial)
    {
    $data = [
        'id_kas_sosial' => $id_kas_sosial,
        'tanggal' => $this->request->getPost('tanggal'),
        'ket' => $this->request->getPost('ket'),
        'kas_masuk' => $this->request->getPost('kas_masuk'), // jangan lupa update ini
    ];

    $this->ModelKasSosial->UpdateKasMasuk($data);
    session()->setFlashdata('pesan', 'Data Berhasil Diupdate!!');
    return redirect()->to(base_url('KasSosial/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas_sosial)
    {
    $data = [
        'id_kas_sosial' => $id_kas_sosial,
        'tanggal' => $this->request->getPost('tanggal'),
        'ket' => $this->request->getPost('ket'),
        'kas_keluar' => $this->request->getPost('kas_keluar'), // jangan lupa update ini
    ];

    $this->ModelKasSosial->UpdateKasKeluar($data);
    session()->setFlashdata('pesan', 'Data Berhasil Diupdate!!');
    return redirect()->to(base_url('KasSosial/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas_sosial)
    {
    $data = [
        'id_kas_sosial' => $id_kas_sosial,
    ];

    $this->ModelKasSosial->DeleteKasMasuk($data);
    session()->setFlashdata('pesan', 'Data Berhasil Didelete!!');
    return redirect()->to(base_url('KasSosial/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas_sosial)
    {
    $data = [
        'id_kas_sosial' => $id_kas_sosial,
    ];

    $this->ModelKasSosial->DeleteKasKeluar($data);
    session()->setFlashdata('pesan', 'Data Berhasil Didelete!!');
    return redirect()->to(base_url('KasSosial/KasKeluar'));
    }
}
