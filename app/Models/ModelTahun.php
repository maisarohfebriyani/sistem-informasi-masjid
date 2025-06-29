<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelTahun extends Model
{
    protected $table            = 'tbl_tahun';
    protected $primaryKey       = 'id_tahun';
    protected $allowedFields    = ['tahun_h', 'tahun_m'];

    public function AllData()
    {
        return $this->findAll(); // Gantikan semua db->table
    }

    public function DetailData($id_tahun)
    {
        return $this->find($id_tahun);
    }

    public function InsertData($data)
    {
        return $this->insert($data);
    }

    public function DeleteData($id)
    {
        return $this->delete($id);
    }

    public function getDataById($id)
    {
        return $this->find($id);
    }

    public function UpdateData($id, $data)
    {
        return $this->update($id, $data);
    }
}
