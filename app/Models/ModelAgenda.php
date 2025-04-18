<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAgenda extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_agenda')->get()->getResultArray();
    }
}
