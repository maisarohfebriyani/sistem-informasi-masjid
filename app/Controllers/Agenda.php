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
            
            
        ];

        return view('v_agenda', $data);
    }
}
