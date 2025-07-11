<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasSosial;
use App\Models\ModelAdmin;

class KasSosial extends BaseController
{
    protected $modelKasSosial;
    protected $modelAdmin;

    public function __construct()
    {
        $this->modelKasSosial = new ModelKasSosial();
        $this->modelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'judul'      => 'Rekap Kas Sosial',
            'subjudul'   => '',
            'menu'       => 'kas-sosial',
            'submenu'    => 'rekap-kas-sosial',
            'page'       => 'kas-sosial/v_rekap_kas_sosial',
            'kas_sosial' => $this->modelKasSosial->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul'      => 'Kas Sosial Masuk',
            'subjudul'   => '',
            'menu'       => 'kas-sosial',
            'submenu'    => 'kas-masuk',
            'page'       => 'kas-sosial/v_kas_sosial_masuk',
            'kas_sosial' => $this->modelKasSosial->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul'      => 'Kas Sosial Keluar',
            'subjudul'   => '',
            'menu'       => 'kas-sosial',
            'submenu'    => 'kas-keluar',
            'page'       => 'kas-sosial/v_kas_sosial_keluar',
            'kas_sosial' => $this->modelKasSosial->AllDataKasKeluar(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertKasMasuk()
    {
        $data = [
            'tanggal'    => $this->request->getPost('tanggal'),
            'ket'        => $this->request->getPost('ket'),
            'kas_masuk'  => $this->request->getPost('kas_masuk'),
            'kas_keluar' => 0,
            'status'     => 'Masuk',
        ];

        $this->modelKasSosial->InsertKasMasuk($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url('KasSosial/KasMasuk'));
    }

    public function InsertKasKeluar()
    {
        $data = [
            'tanggal'    => $this->request->getPost('tanggal'),
            'ket'        => $this->request->getPost('ket'),
            'kas_masuk'  => 0,
            'kas_keluar' => $this->request->getPost('kas_keluar'),
            'status'     => 'Keluar',
        ];

        $this->modelKasSosial->InsertKasKeluar($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url('KasSosial/KasKeluar'));
    }

    public function UpdateKasMasuk($id_kas_sosial)
    {
        $data = [
            'id_kas_sosial' => $id_kas_sosial,
            'tanggal'       => $this->request->getPost('tanggal'),
            'ket'           => $this->request->getPost('ket'),
            'kas_masuk'     => $this->request->getPost('kas_masuk'),
        ];

        $this->modelKasSosial->UpdateKasMasuk($data);
        session()->setFlashdata('pesan', 'Data berhasil diupdate!');
        return redirect()->to(base_url('KasSosial/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas_sosial)
    {
        $data = [
            'id_kas_sosial' => $id_kas_sosial,
            'tanggal'       => $this->request->getPost('tanggal'),
            'ket'           => $this->request->getPost('ket'),
            'kas_keluar'    => $this->request->getPost('kas_keluar'),
        ];

        $this->modelKasSosial->UpdateKasKeluar($data);
        session()->setFlashdata('pesan', 'Data berhasil diupdate!');
        return redirect()->to(base_url('KasSosial/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas_sosial)
    {
        $this->modelKasSosial->DeleteKasMasuk(['id_kas_sosial' => $id_kas_sosial]);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('KasSosial/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas_sosial)
    {
        $this->modelKasSosial->DeleteKasKeluar(['id_kas_sosial' => $id_kas_sosial]);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('KasSosial/KasKeluar'));
    }

    public function Laporan()
    {
        $data = [
            'judul'   => 'Laporan Kas Sosial',
            'menu'    => 'laporan-kas-sosial',
            'submenu' => 'laporan-kas-sosial',
            'page'    => 'kas-sosial/v_laporan_kas_sosial',
            'masjid'  => $this->modelAdmin->ViewSetting(),
        ];
        return view('v_template_admin', $data);
    }

    public function ViewLaporan()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');

        if (!$bulan || !$tahun) {
            return $this->response->setStatusCode(400)->setBody('Bulan dan Tahun wajib diisi');
        }

        $kas = $this->modelKasSosial->AllDataBulanan($bulan, $tahun);

        return view('kas-sosial/v_data_laporan', [
            'kas'   => $kas,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
    }
}
