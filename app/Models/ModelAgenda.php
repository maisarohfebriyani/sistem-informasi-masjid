<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelAgenda extends Model
{
    protected $table      = 'tbl_agenda';
    protected $primaryKey = 'id_agenda';

    public function AllData()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function InsertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function deleteData($id)
    {
        return $this->db->table($this->table)->where($this->primaryKey, $id)->delete();
    }

    public function getDataById($id)
    {
        return $this->db->table($this->table)->where($this->primaryKey, $id)->get()->getRowArray();
    }

    public function updateData($id, $data)
    {
        return $this->db->table($this->table)->where($this->primaryKey, $id)->update($data);
    }
}
