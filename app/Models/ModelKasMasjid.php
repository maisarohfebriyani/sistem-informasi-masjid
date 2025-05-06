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


}
