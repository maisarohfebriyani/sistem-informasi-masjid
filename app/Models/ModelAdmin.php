<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function ViewSetting()
    {
        return $this->db->table('tbl_setting')
            ->where('id', 1)
            ->get()
            ->getRowArray();
    }

    public function AllDataKasMasjid()
    {
        return $this->db->table('tbl_kas_masjid')
            ->where('month(tanggal)', date('m'))
            ->where('year(tanggal)', date('Y'))
            ->get()
            ->getResultArray();
    }

    public function AllDataKasSosial()
    {
        return $this->db->table('tbl_kas_sosial')
            ->where('month(tanggal)', date('m'))
            ->where('year(tanggal)', date('Y'))
            ->get()
            ->getResultArray();
    }

    public function AllDonasi()
    {
    return $this->db->table('tbl_donasi')
        ->join('tbl_rekening', 'tbl_rekening.id_rekening = tbl_donasi.id_rekening', 'left')
        ->select("
            tbl_donasi.nama_bank AS nama_bank_pengirim,
            tbl_donasi.no_rekening AS no_rekening_pengirim,
            tbl_donasi.nama_pengirim,
            tbl_donasi.jumlah,
            tbl_donasi.tgl,
            tbl_donasi.jenis_donasi,
            tbl_donasi.bukti,
            tbl_rekening.nama_bank AS nama_bank_tujuan,
            tbl_rekening.no_rekening AS no_rekening_tujuan,
            tbl_rekening.atas_nama
        ")
        ->orderBy('id_donasi', 'DESC')
        ->get()
        ->getResultArray();
    }


}
