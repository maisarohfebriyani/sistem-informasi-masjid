<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Login',
            'validation' => \Config\Services::validation(),
        ];
        return view('v_login', $data);
    }

    public function ceklogin()
    {
        $validation = \Config\Services::validation();

        // Validasi input
        if ($this->validate([
            'email' => [
                'label' => "E-mail",
                'rules' => "required|valid_email",
                'errors' => [
                    'required' => 'Field {field} masih kosong',
                    'valid_email' => 'Format {field} tidak valid'
                ]
            ],
            'password' => [
                'label' => "Password",
                'rules' => "required",
                'errors' => [
                    'required' => 'Field {field} masih kosong'
                ]
            ]
        ])) {
            $model = new ModelLogin();
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $model->where('email', $email)->first();

            // Memeriksa apakah user ditemukan dan password cocok
            if ($user && password_verify($password, $user['password'])) {
                // Login berhasil
                session()->set('logged_in', true);
                session()->set('user_data', $user);

                // Redirect ke halaman template admin setelah login berhasil
                return redirect()->to('/admin');
            } else {
                // Jika email atau password salah
                return redirect()->back()->with('gagal', 'Email atau password salah')->withInput();
            }
        } else {
            // Jika validasi gagal
            return redirect()->back()
                ->withInput()
                ->with('validation', $validation);
        }
    }
}
