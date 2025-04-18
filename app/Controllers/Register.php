<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class Register extends BaseController
{
    public function index()
    {
        return view('v_register'); // Menampilkan halaman registrasi
    }

    public function save()
    {
        // Validasi input
        if ($this->validate([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ])) {
            $model = new ModelLogin();
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            // Simpan data pengguna ke database
            if ($model->save($data)) {
                return redirect()->to('/login')->with('pesan', 'Registrasi berhasil, silakan login.');
            } else {
                return redirect()->back()->with('gagal', 'Terjadi kesalahan, silakan coba lagi.')->withInput();
            }
        } else {
            // Jika validasi gagal
            return redirect()->back()->with('validation', \Config\Services::validation())->withInput();
        }
    }
}
