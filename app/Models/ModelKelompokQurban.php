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

    public function insertKelompok($data)
    {
    return $this->db->table('tbl_kelompok')->insert($data);
    }

}


    // Tambahkan fungsi lain jika perlu, seperti insert, update, delete custom

