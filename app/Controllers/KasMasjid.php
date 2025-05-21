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
            'page'      => 'kas-masjid/v_rekap_kas_masjid',
            'kas'       => $this->ModelKasMasjid->AllData(),
        ];

        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul'     => 'Kas Masjid Masuk',
            'subjudul'  => '',
            'menu'      => 'kas-masjid',
            'submenu'   => 'kas-masuk',
            'page'      => 'kas-masjid/v_kas_masjid_masuk',
            'kas'       => $this->ModelKasMasjid->AllDataKasMasuk(),
        ];

        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul'     => 'Kas Masjid Keluar',
            'subjudul'  => '',
            'menu'      => 'kas-masjid',
            'submenu'   => 'kas-keluar',
            'page'      => 'kas-masjid/v_kas_masjid_keluar',
            'kas'       => $this->ModelKasMasjid->AllDataKasKeluar(),
        ];

        return view('v_template_admin', $data);
    }
}
