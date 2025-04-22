<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        // Cek jika pengguna sudah login
        if (!session()->get('logged_in')) {
            // Jika belum login, arahkan ke halaman login
            return redirect()->to('/login')->with('gagal', 'Anda harus login terlebih dahulu.');
        }

        // Data untuk tampilan dashboard
        $data = [
            'judul'     => 'Dashboard',
            'subjudul'  => '',
            'menu'      => 'dashboard',
            'sub-menu'  => '',
            'page'      => 'v_Dashboard',
        ];

        return view('v_template_admin', $data);
    }
}

}
