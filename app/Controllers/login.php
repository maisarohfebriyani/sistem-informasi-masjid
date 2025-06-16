<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class Login extends BaseController
{
    public function index()
    {
        // Menampilkan halaman login
        return view('v_login');
    }

    public function save()
    {
        // Validasi input untuk registrasi
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

            if ($model->save($data)) {
                return redirect()->to('/login')->with('pesan', 'Registrasi berhasil, silakan login.');
            } else {
                return redirect()->back()->with('gagal', 'Terjadi kesalahan, silakan coba lagi.')->withInput();
            }
        } else {
            return redirect()->back()->with('validation', \Config\Services::validation())->withInput();
        }
    }

    public function ceklogin()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'email' => [
                'label' => "E-mail",
                'rules' => "required|valid_email",
                'errors' => [
                    'required'    => 'Field {field} masih kosong',
                    'valid_email' => 'Format {field} tidak valid',
                ],
            ],
            'password' => [
                'label' => "Password",
                'rules' => "required",
                'errors' => [
                    'required' => 'Field {field} masih kosong',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/login')
                ->withInput()
                ->with('validation', $validation);
        }

        // Ambil data
        $model    = new ModelLogin();
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Simpan ke session
            session()->set([
                'id_user' => $user['id_user'],
                'email'   => $user['email'],
                'logged_in' => true,
            ]);

            // Redirect ke menu admin
            return redirect()->to('/Admin')->with('pesan', 'Login berhasil. Selamat datang!');
        }

        return redirect()->to('/login')
            ->with('gagal', 'Email atau password salah.')
            ->withInput();
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('pesan', 'Anda telah logout.');
    }
}
