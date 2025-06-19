<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelompokQurban extends Model
{
    protected $table = 'tbl_kelompok'; // Ganti sesuai nama tabel di database
    protected $primaryKey = 'id_kelompok';     // Ganti sesuai dengan primary key tabel kamu
    protected $allowedFields = ['id_kelompok', 'id_tahun', 'nama_kelompok', ]; // Sesuaikan dengan kolom-kolom di tabel

    // Ambil semua data kelompok berdasarkan tahun tertentu
    public function AllDataKelompok($id_tahun)
    {
        return $this->where('id_tahun', $id_tahun)->findAll();
    }

    // Tambahkan fungsi lain jika perlu, seperti insert, update, delete custom
}
