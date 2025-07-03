<?php

namespace App\Controllers;

use App\Models\ModelUser;

class User extends BaseController
{
    protected $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    // Menampilkan halaman data user
    public function index()
    {
        $data = [
            'judul' => 'User',
            'menu' => 'user',
            'user' => $this->ModelUser->getAllUser(),
            'page' => 'user/v_user'
        ];
        return view('v_template_admin', $data);
    }

    // Simpan user baru
    public function simpan()
    {
        $data = [
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
        $this->ModelUser->tambah($data);
        session()->setFlashdata('pesan', 'User berhasil ditambahkan!');
        return redirect()->to(base_url('user'));
    }

    // Update user
    public function update($id)
    {
        $data = [
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
        $this->ModelUser->updateUser($id, $data);
        session()->setFlashdata('pesan', 'User berhasil diupdate!');
        return redirect()->to(base_url('user'));
    }

    // Hapus user
    public function hapus($id)
    {
        $this->ModelUser->hapus($id);
        session()->setFlashdata('pesan', 'User berhasil dihapus!');
        return redirect()->to(base_url('user'));
    }
}
