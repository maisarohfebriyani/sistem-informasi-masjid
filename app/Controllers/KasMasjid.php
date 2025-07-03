<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasMasjid;
use App\Models\ModelAdmin;

class KasMasjid extends BaseController
{
    protected $ModelKasMasjid;
    protected $ModelAdmin;

    public function __construct()
    {
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->ModelAdmin     = new ModelAdmin();
    }

    // Halaman Rekap Kas
    public function index()
    {
        $data = [
            'judul'    => 'Rekap Kas Masjid',
            'subjudul' => '',
            'menu'     => 'kas-masjid',
            'submenu'  => 'rekap-kas',
            'page'     => 'kas-masjid/v_rekap_kas_masjid',
            'kas'      => $this->ModelKasMasjid->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    // Kas Masuk
    public function KasMasuk()
    {
        $data = [
            'judul'    => 'Kas Masjid Masuk',
            'subjudul' => '',
            'menu'     => 'kas-masjid',
            'submenu'  => 'kas-masuk',
            'page'     => 'kas-masjid/v_kas_masjid_masuk',
            'kas'      => $this->ModelKasMasjid->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }

    // Kas Keluar
    public function KasKeluar()
    {
        $data = [
            'judul'    => 'Kas Masjid Keluar',
            'subjudul' => '',
            'menu'     => 'kas-masjid',
            'submenu'  => 'kas-keluar',
            'page'     => 'kas-masjid/v_kas_masjid_keluar',
            'kas'      => $this->ModelKasMasjid->AllDataKasKeluar(),
        ];
        return view('v_template_admin', $data);
    }

    // Tambah Kas Masuk
    public function InsertKasMasuk()
    {
        $data = [
            'tanggal'    => $this->request->getPost('tanggal'),
            'ket'        => $this->request->getPost('ket'),
            'kas_masuk'  => $this->request->getPost('kas_masuk'),
            'kas_keluar' => 0,
            'status'     => 'Masuk',
        ];
        $this->ModelKasMasjid->InsertKasMasuk($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url('KasMasjid/KasMasuk'));
    }

    // Tambah Kas Keluar
    public function InsertKasKeluar()
    {
        $data = [
            'tanggal'    => $this->request->getPost('tanggal'),
            'ket'        => $this->request->getPost('ket'),
            'kas_masuk'  => 0,
            'kas_keluar' => $this->request->getPost('kas_keluar'),
            'status'     => 'Keluar',
        ];
        $this->ModelKasMasjid->InsertKasKeluar($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }

    // Update Kas Masuk
    public function UpdateKasMasuk($id_kas)
    {
        $data = [
            'id_kas'     => $id_kas,
            'tanggal'    => $this->request->getPost('tanggal'),
            'ket'        => $this->request->getPost('ket'),
            'kas_masuk'  => $this->request->getPost('kas_masuk'),
            'kas_keluar' => 0,
            'status'     => 'Masuk',
        ];
        $this->ModelKasMasjid->UpdateKasMasuk($data);
        session()->setFlashdata('pesan', 'Data berhasil diupdate!');
        return redirect()->to(base_url('KasMasjid/KasMasuk'));
    }

    // Update Kas Keluar
    public function UpdateKasKeluar($id_kas)
    {
        $data = [
            'id_kas'     => $id_kas,
            'tanggal'    => $this->request->getPost('tanggal'),
            'ket'        => $this->request->getPost('ket'),
            'kas_masuk'  => 0,
            'kas_keluar' => $this->request->getPost('kas_keluar'),
            'status'     => 'Keluar',
        ];
        $this->ModelKasMasjid->UpdateKasKeluar($data);
        session()->setFlashdata('pesan', 'Data berhasil diupdate!');
        return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }

    // Hapus Kas Masuk
    public function DeleteKasMasuk($id_kas)
    {
        $this->ModelKasMasjid->DeleteKasMasuk(['id_kas' => $id_kas]);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('KasMasjid/KasMasuk'));
    }

    // Hapus Kas Keluar
    public function DeleteKasKeluar($id_kas)
    {
        $this->ModelKasMasjid->DeleteKasKeluar(['id_kas' => $id_kas]);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }

    // Halaman Laporan
    public function Laporan()
    {
        $data = [
            'judul'   => 'Laporan Kas Masjid',
            'menu'    => 'laporan-kas-masjid',
            'submenu' => 'laporan-kas-masjid',
            'page'    => 'kas-masjid/v_laporan_kas_masjid',
            'masjid'  => $this->ModelAdmin->ViewSetting(),
        ];
        return view('v_template_admin', $data);
    }

    // AJAX - Ambil Laporan Berdasarkan Bulan dan Tahun
    public function ViewLaporan()
{
    $bulan = $this->request->getPost('bulan');
    $tahun = $this->request->getPost('tahun');

    if (!$bulan || !$tahun) {
        return $this->response->setStatusCode(400)->setBody('Bulan dan Tahun wajib diisi');
    }

    $kas = $this->ModelKasMasjid->AllDataBulanan($bulan, $tahun);

    return view('kas-masjid/v_data_laporan', [
        'kas' => $kas,
        'bulan' => $bulan,
        'tahun' => $tahun,
    ]);
}

}
