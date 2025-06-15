<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModelKasMasjid;

class KasMasjid extends BaseController
{
    public function __construct()
    {
        $this->ModelKasMasjid = new ModelKasMasjid;
    }

    public function index()
    {
        $data = [
            'judul'     => 'Rekap Kas Masjid',
            'subjudul'  => '',
            'menu'      => 'kas-masjid',
            'submenu'   => 'rekap-kas',
            'page'      => 'kas-masjid/v_rekap_kas_masjid',
            'kas'       => $this->ModelKasMasjid->AllData(),
        ];

        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul'     => 'Kas Masjid Masuk',
            'subjudul'  => '',
            'menu'      => 'kas-masjid',
            'submenu'   => 'kas-masuk',
            'page'      => 'kas-masjid/v_kas_masjid_masuk',
            'kas'       => $this->ModelKasMasjid->AllDataKasMasuk(),
        ];

        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul'     => 'Kas Masjid Keluar',
            'subjudul'  => '',
            'menu'      => 'kas-masjid',
            'submenu'   => 'kas-keluar',
            'page'      => 'kas-masjid/v_kas_masjid_keluar',
            'kas'       => $this->ModelKasMasjid->AllDataKasKeluar(),
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

    $this->ModelKasMasjid->InsertKasMasuk($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
    return redirect()->to(base_url('KasMasjid/KasMasuk'));
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

    $this->ModelKasMasjid->InsertKasKeluar($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
    return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }

    public function UpdateKasMasuk($id_kas)
    {
    $data = [
        'id_kas' => $id_kas,
        'tanggal' => $this->request->getPost('tanggal'),
        'ket' => $this->request->getPost('ket'),
        'kas_masuk' => $this->request->getPost('kas_masuk'), // jangan lupa update ini
    ];

    $this->ModelKasMasjid->UpdateKasMasuk($data);
    session()->setFlashdata('pesan', 'Data Berhasil Diupdate!!');
    return redirect()->to(base_url('KasMasjid/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas)
    {
    $data = [
        'id_kas' => $id_kas,
        'tanggal' => $this->request->getPost('tanggal'),
        'ket' => $this->request->getPost('ket'),
        'kas_keluar' => $this->request->getPost('kas_keluar'), // jangan lupa update ini
    ];

    $this->ModelKasMasjid->UpdateKasKeluar($data);
    session()->setFlashdata('pesan', 'Data Berhasil Diupdate!!');
    return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas)
    {
    $data = [
        'id_kas' => $id_kas,
    ];

    $this->ModelKasMasjid->DeleteKasMasuk($data);
    session()->setFlashdata('pesan', 'Data Berhasil Didelete!!');
    return redirect()->to(base_url('KasMasjid/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas)
    {
    $data = [
        'id_kas' => $id_kas,
    ];

    $this->ModelKasMasjid->DeleteKasKeluar($data);
    session()->setFlashdata('pesan', 'Data Berhasil Didelete!!');
    return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }
}
