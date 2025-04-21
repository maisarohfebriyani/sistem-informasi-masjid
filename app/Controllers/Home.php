<?php

namespace App\Controllers;
use App\Models\ModelHome;
class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }

    public function index()
{
    $data = [
        'judul' => 'Agenda',
        'page' => 'v_home',
        'agenda'    => $this->ModelHome->$Data(),
    ];
       
    return view('v_tamplate', $data);
       

    public function Agenda(): string
    {
        $data = [
            'judul' => 'Agenda',
            'page' => 'front-end/v_Agenda',
            'agenda'    => $this->ModelHome->Agenda(),
        ];
        
        return view('v_tamplate', $data);
    }
}
