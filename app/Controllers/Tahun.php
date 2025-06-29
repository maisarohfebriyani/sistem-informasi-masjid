<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTahun;

class Tahun extends BaseController
{
    protected $ModelTahun; // Tambahkan deklarasi properti di sini

    public function __construct()
    {
        $this->ModelTahun = new ModelTahun;
    }

    public function index()
    {
        $data = [
            'judul'     => 'Tahun Qurban',
            'menu'      => 'qurban',
            'submenu'   => 'tahun-qurban',
            'tahun'     => $this->ModelTahun->AllData(),
            'page'      => 'qurban/v_tahun'
        ];

        return view('v_template_admin', $data);
    }

    public function insert_data()
    {
        $data = [
            'tahun_h' => $this->request->getPost('tahun_h'),
            'tahun_m' => $this->request->getPost('tahun_m')
        ];

        $this->ModelTahun->insertData($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('tahun'));
    }

    public function UpdateData($id_tahun)
    {
        $data = [
            'tahun_h' => $this->request->getPost('tahun_h'),
            'tahun_m' => $this->request->getPost('tahun_m'),
        ];

        $this->ModelTahun->UpdateData($id_tahun, $data);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to(base_url('tahun'));
    }

    public function DeleteData($id_tahun)
    {
        $this->ModelTahun->DeleteData($id_tahun);
        session()->setFlashdata('pesan', 'Data berhasil didelete');
        return redirect()->to(base_url('tahun'));
    }
}
