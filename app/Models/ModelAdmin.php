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
}
