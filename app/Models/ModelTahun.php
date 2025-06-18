<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelTahun extends Model
{
    protected $table      = 'tbl_tahun';
    protected $primaryKey = 'id_tahun';

    public function AllData()
    {
        return $this->db->table($this->table)->get()->getResultArray();
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
