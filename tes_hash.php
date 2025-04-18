<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class Register extends BaseController
{
    public function index()
    {
        return view('v_register');
    }

    public function save()
    {
        // Validasi data input dari form
        if (!$this->validate([
            'email' => 'required|valid_email|is_unique[tbl_user.email]',
            'password' => 'required|min_length[6]',
        ])) {
            // Jika validasi gagal, tampilkan error
            return redirect()->back()->withInput()->with('validation', \Config\Services::validation());
        }

        // Ambil data dari form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Hash password sebelum disimpan ke database
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Menyimpan data ke database
        $model = new ModelLogin();
        $data = [
            'email' => $email,
            'password' => $password_hash,
        ];
        $model->insert($data);

        // Redirect ke halaman login setelah registrasi berhasil
        return redirect()->to('/login');
    }
}
