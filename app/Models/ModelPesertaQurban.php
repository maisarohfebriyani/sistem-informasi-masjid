<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPesertaQurban extends Model
{
     protected $table = 'tbl_tahun'; // ✅ Nama tabel database
    protected $primaryKey = 'id_tahun';
    protected $allowedFields = ['tahun_h', 'tahun_m'];
    
    public function AllDataKelompok($id_tahun)
    {
        return $this->db->table('tbl_kelompok')
        ->where('id_tahun', $id_tahun)
        ->get()->getResultArray();
    }

    public function DetailKelompok($id_kelompok)
{
    return $this->db->table('tbl_kelompok')
        ->where('id_kelompok', $id_kelompok)
        ->get()->getRowArray();
}

public function DeleteKelompok($id_kelompok)
{
    return $this->db->table('tbl_kelompok')
        ->where('id_kelompok', $id_kelompok)
        ->delete();
}


}
