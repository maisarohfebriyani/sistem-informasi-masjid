<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelKasMasjid extends Model
{
    protected $table = 'tbl_kas_masjid'; // Tambahkan agar bisa dipakai otomatis
    protected $primaryKey = 'id_kas';
    protected $allowedFields = ['tanggal', 'ket', 'kas_masuk', 'kas_keluar', 'status'];

    public function AllData()
    {
        return $this->db->table($this->table)
                        ->orderBy('id_kas', 'DESC')
                        ->get()
                        ->getResultArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table($this->table)
                        ->where('status', 'Masuk')
                        ->orderBy('id_kas', 'DESC')
                        ->get()
                        ->getResultArray();
    }

    public function AllDataKasKeluar()
    {
        return $this->db->table($this->table)
                        ->where('status', 'Keluar')
                        ->orderBy('id_kas', 'DESC')
                        ->get()
                        ->getResultArray();
    }

    public function InsertKasMasuk($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function InsertKasKeluar($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function UpdateKasMasuk($data)
    {
        return $this->db->table($this->table)
                        ->where('id_kas', $data['id_kas'])
                        ->update($data);
    }

    public function UpdateKasKeluar($data)
    {
        return $this->db->table($this->table)
                        ->where('id_kas', $data['id_kas'])
                        ->update($data);
    }

    public function DeleteKasMasuk($data)
    {
        return $this->db->table($this->table)
                        ->delete(['id_kas' => $data['id_kas']]);
    }

    public function DeleteKasKeluar($data)
    {
        return $this->db->table($this->table)
                        ->delete(['id_kas' => $data['id_kas']]);
    }

        public function AllDataBulanan($bulan, $tahun)
    {
        return $this->db->table('tbl_kas_masjid')
                        ->where('month(tanggal)', $bulan)
                        ->where('year(tanggal)', $tahun)
                        ->get()->getResultArray();
    }
}
