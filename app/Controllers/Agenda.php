<?php

namespace App\Controllers;
use App\Models\ModelAgenda;

class Agenda extends BaseController
{
    protected $ModelAgenda;

    public function __construct()
    {
        $this->ModelAgenda = new ModelAgenda();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Agenda',
            'subjudul'  => '',
            'menu'      => 'agenda',
            'sub_menu'  => '',
            'agenda'    => $this->ModelAgenda->AllData(),
            'page'      => 'v_agenda'
        ];

        return view('v_template_admin', $data);
    }

    public function insertData()
    {
        $data = [
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'tanggal'       => $this->request->getPost('tanggal'),
            'jam'           => $this->request->getPost('jam'),
        ];

        $this->ModelAgenda->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');

        // ✅ Redirect pakai huruf kecil
        return redirect()->to(base_url('agenda'));
    }
}
