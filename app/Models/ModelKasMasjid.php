<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelKasMasjid extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kas_masjid')
        ->get()->getResultArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table('tbl_kas_masjid')
        ->where('status', 'Masuk')
        ->get()->getResultArray();
    }

    public function AllDataKasKeluar()
    {
        return $this->db->table('tbl_kas_masjid')
        ->where('status', 'Keluar')
        ->get()->getResultArray();
    }


}
