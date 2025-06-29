<?php

namespace App\Controllers;
use App\Models\ModelRekening;

class Rekening extends BaseController
{
    protected $ModelRekening;

    public function __construct()
    {
        $this->ModelRekening = new ModelRekening();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Rekening',
            'subjudul'  => '',
            'menu'      => 'rekening',
            'submenu'   => '',
            'rek'    => $this->ModelRekening->AllData(),
            'page'      => 'v_rekening'
        ];

        return view('v_template_admin', $data);
    }

    public function insertData()
    {
        $data = [
            'nama_bank' => $this->request->getPost('nama_bank'),
            'no_rekening'       => $this->request->getPost('tanggal'),
            'atas_nama'           => $this->request->getPost('jam'),
        ];

        $this->ModelRekening->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('rekening'));
    }
public function UpdateData($id_rekening)
{
    $data = [
        'nama_bank'   => $this->request->getPost('nama_bank'),
        'no_rekening' => $this->request->getPost('no_rekening'),
        'atas_nama'   => $this->request->getPost('atas_nama'),
    ];

    $this->ModelRekening->UpdateData($id_rekening, $data); // ✅ Panggil update, bukan insert
    session()->setFlashdata('pesan', 'Data berhasil diupdate!');
    return redirect()->to(base_url('rekening'));
}

    public function DeleteData($id_rekening)
    {
        $data = [
            'id_rekening' => $id_rekening
        ];
        $this->ModelRekening->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('rekening'));
    }
}
