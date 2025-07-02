<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    // Ambil semua agenda bulan dan tahun berjalan
    public function Agenda()
    {
        return $this->db->table('tbl_agenda')
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)', date('Y'))
            ->orderBy('tanggal', 'ASC')
            ->get()
            ->getResultArray();
    }

    // Ambil semua data kelompok berdasarkan tahun berjalan
    public function AllDataKelompok()
    {
        return $this->db->table('tbl_kelompok')
            ->join('tbl_tahun', 'tbl_tahun.id_tahun = tbl_kelompok.id_tahun', 'left')
            ->where('tahun_m', date('Y'))
            ->get()
            ->getResultArray();
    }

    // Ambil data kas masjid bulan dan tahun berjalan
    public function AllDataKasMasjid()
    {
        return $this->db->table('tbl_kas_masjid')
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)', date('Y'))
            ->get()
            ->getResultArray();
    }

    // Ambil data kas sosial bulan dan tahun berjalan
    public function AllDataKasSosial()
    {
        return $this->db->table('tbl_kas_sosial')
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)', date('Y'))
            ->get()
            ->getResultArray();
    }

    // Simpan data donasi ke tabel tbl_donasi
    public function InsertDonasi($data)
    {
        return $this->db->table('tbl_donasi')->insert($data);
    }

    // Ambil seluruh data donasi untuk keperluan admin
    public function AllDataDonasi()
    {
        return $this->db->table('tbl_donasi')
            ->orderBy('id_donasi', 'DESC')
            ->get()
            ->getResultArray();
    }
}
