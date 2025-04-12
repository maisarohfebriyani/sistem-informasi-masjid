<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => '',
            'menu' => 'dashboard',
            'sub-menu' => '',
            'page' => 'v_Dashboard',
        ];
        
        return view('v_template_admin', $data);
    }
}
