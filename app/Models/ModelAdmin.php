<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function ViewSetting()
    {
        return $this->db->table('tbl_setting')
                        ->where('id', 1)
                        ->get()
                        ->getRowArray();
    }

        public function AllDataKasMasjid()
    {
        return $this->db->table('tbl_kas_masjid')
        ->where('month(tanggal)', date('m'))
        ->where('year(tanggal)', date('Y'))
        ->get()->getResultArray();
    }

        public function AllDataKasSosial()
    {
        return $this->db->table('tbl_kas_sosial')
        ->where('month(tanggal)', date('m'))
        ->where('year(tanggal)', date('Y'))
        ->get()->getResultArray();
    }
}
