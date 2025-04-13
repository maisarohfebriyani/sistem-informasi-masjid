<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class login extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Login',
        ];
        return view('v_login', $data);
    }
}