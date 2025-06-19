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

    public function DetailData($id_tahun)
    {
        return $this->db->table($this->table)
        ->where('id_tahun', $id_tahun)
        ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function DeleteData($id)
    {
        return $this->db->table($this->table)->where($this->primaryKey, $id)->Delete();
    }

    public function getDataById($id)
    {
        return $this->db->table($this->table)->where($this->primaryKey, $id)->get()->getRowArray();
    }

    public function UpdateData($id, $data)
    {
        return $this->db->table($this->table)->where($this->primaryKey, $id)->Update($data);
    }
}
