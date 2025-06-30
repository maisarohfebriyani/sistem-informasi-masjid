<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    // Menyimpan agenda bulan & tahun berjalan
    public function Agenda()
    {
        return $this->db->table('tbl_agenda')
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)', date('Y'))
            ->orderBy('tanggal', 'ASC')
            ->get()->getResultArray();
    }

    // Mengambil data kelompok berdasarkan tahun berjalan
    public function AllDataKelompok()
    {
        return $this->db->table('tbl_kelompok')
            ->join('tbl_tahun', 'tbl_tahun.id_tahun = tbl_kelompok.id_tahun', 'left')
            ->where('tahun_m', date('Y'))
            ->get()->getResultArray();
    }

    // Data kas masjid bulan & tahun berjalan
    public function AllDataKasMasjid()
    {
        return $this->db->table('tbl_kas_masjid')
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)', date('Y'))
            ->get()->getResultArray();
    }

    // Data kas sosial bulan & tahun berjalan
    public function AllDataKasSosial()
    {
        return $this->db->table('tbl_kas_sosial')
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)', date('Y'))
            ->get()->getResultArray();
    }

    // Simpan data donasi ke tbl_donasi
    public function InsertDonasi($data)
    {
        return $this->db->table('tbl_donasi')->insert($data);
    }


}
