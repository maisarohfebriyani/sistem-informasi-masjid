<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPesertaQurban;
use App\Models\ModelTahun;
use App\Models\ModelKelompokQurban; // Tambahkan ini

class PesertaQurban extends BaseController
{
    public function __construct()
    {
        $this->ModelPesertaQurban = new ModelPesertaQurban;
        $this->ModelTahun = new ModelTahun;
        $this->KelompokQurban = new ModelKelompokQurban; // Inisialisasi
    }

    public function index()
    {
        $data = [
            'judul'     => 'Peserta Qurban',
            'menu'      => 'qurban',
            'submenu'   => 'peserta-qurban',
            'page'      => 'qurban/v_tahun_qurban',
            'tahun'     => $this->ModelTahun->AllData(),
            'peserta'   => $this->ModelPesertaQurban->findAll(),
        ];
        return view('v_template_admin', $data);
    }

    public function KelompokQurban($id_tahun)
    {
        $tahun = $this->ModelTahun->DetailData($id_tahun);
        $data = [
            'judul'     => 'Peserta Qurban Tahun ' . $tahun['tahun_h'] . ' H ' . $tahun['tahun_m'] . ' M',
            'menu'      => 'qurban',
            'submenu'   => 'peserta-qurban',
            'page'      => 'qurban/v_kelompok_qurban',
            'tahun'     => $tahun,
            'kelompok'  => $this->KelompokQurban->AllDataKelompok($id_tahun),
        ];
        return view('v_template_admin', $data);
    }

    public function DeleteKelompok($id_kelompok)
    {
    // Ambil data kelompok dari model yang benar
    $data = $this->KelompokQurban->DetailKelompok($id_kelompok);

    if (!$data) {
        session()->setFlashdata('error', 'Data kelompok tidak ditemukan');
        return redirect()->back();
    }

    $id_tahun = $data['id_tahun'];

    // Hapus data kelompok
    $this->KelompokQurban->DeleteKelompok($id_kelompok);

    session()->setFlashdata('pesan', 'Kelompok berhasil dihapus');
    return redirect()->to(base_url('PesertaQurban/KelompokQurban/' . $id_tahun));
    }

    public function insertKelompok()
    {
    $data = [
        'id_tahun'      => $this->request->getPost('id_tahun'),
        'nama_kelompok' => $this->request->getPost('nama_kelompok'),
    ];
    $this->KelompokQurban->insertKelompok($data);
    return redirect()->to(base_url('PesertaQurban/KelompokQurban/' . $data['id_tahun']));
    }


}
