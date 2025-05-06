<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModelKasMasjid;

class KasMasjid extends BaseController
{
    public function __construct()
    {
        $this->ModelKasMasjid = new ModelKasMasjid;
    }

    public function index()
    {
        $data = [
            'judul'     => 'Rekap Kas Masjid',
            'subjudul'  => '',
            'menu'      => 'kas-masjid',
            'submenu'   => 'rekap-kas',
            'page'      => 'v_rekap_kas_masjid',
            'kas'       => $this->ModelKasMasjid->AllData(),
        ];

        return view('v_template_admin', $data);
    }
}
