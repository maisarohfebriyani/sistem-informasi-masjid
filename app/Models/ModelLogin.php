<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $table = 'tbl_user';         // Tambahkan nama tabel
    protected $primaryKey = 'id';          // Sesuaikan jika ID bukan 'id'
    protected $allowedFields = ['email', 'password']; // Field yang bisa diisi

    public function cekUser($email, $password)
    {
        return $this->where('email', $email)
                    ->where('password', $password)
                    ->first();
    }
}
