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
            'submenu'   => '',
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
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('agenda'));
    }

    public function edit($id)
    {
        $agenda = $this->ModelAgenda->getDataById($id);

        if (!$agenda) {
            return redirect()->to(base_url('agenda'));
        }

        $data = [
            'judul'     => 'Edit Agenda',
            'agenda'    => $agenda,
            'menu'      => 'agenda',
            'page'      => 'v_edit_agenda'
        ];

        return view('v_template_admin', $data);
    }

    public function updateData($id)
    {
        $data = [
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'tanggal'       => $this->request->getPost('tanggal'),
            'jam'           => $this->request->getPost('jam'),
        ];

        $this->ModelAgenda->updateData($id, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to(base_url('agenda'));
    }

    public function hapus($id)
    {
        $this->ModelAgenda->deleteData($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('agenda'));
    }
}
