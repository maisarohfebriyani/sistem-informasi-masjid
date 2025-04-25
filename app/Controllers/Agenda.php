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
            'menu'      => 'agenda',  // Set menu untuk agenda
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
        return redirect()->to(base_url('agenda'));
    }

    public function edit($id)
    {
        // Ambil data agenda berdasarkan ID
        $agenda = $this->ModelAgenda->getDataById($id);

        // Jika data tidak ditemukan, redirect ke halaman agenda
        if (!$agenda) {
            return redirect()->to(base_url('agenda'));
        }

        // Kirim data agenda ke view
        $data = [
            'judul'     => 'Edit Agenda',
            'agenda'    => $agenda,
            'menu'      => 'agenda',  // Pastikan menu set pada saat edit
            'page'      => 'v_edit_agenda'  // Ganti dengan nama file view edit
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
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!!');
        return redirect()->to(base_url('agenda'));
    }

    public function hapus($id)
    {
        $this->ModelAgenda->deleteData($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('agenda'));
    }
}
