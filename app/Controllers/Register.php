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
        $validation = \Config\Services::validation();

        // Validasi input
        if (!$this->validate([
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required|valid_email|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => '{field} tidak valid',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 5 karakter'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $model = new ModelLogin();

        $data = [
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $model->insert($data);

        return redirect()->to('/login')->with('sukses', 'Registrasi berhasil. Silakan login!');
    }
}
