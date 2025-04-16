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
        'menu'      => 'agenda',
        'sub-menu'  => '',
        'agenda'    => $this->ModelAgenda->AllData(),
        'page'      => 'v_agenda' // <-- pastikan ini ditambahkan
    ];

    return view('v_template_admin', $data); // <-- pastikan ini sesuai nama layout
}

}
