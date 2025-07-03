<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['email', 'password'];

    public function getAllUser()
    {
        return $this->orderBy('id_user', 'DESC')->findAll();
    }

    public function tambah($data)
    {
        return $this->insert($data);
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function hapus($id)
    {
        return $this->delete($id);
    }
}
