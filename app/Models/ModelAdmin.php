<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    protected $table = 'tbl_setting';

    /**
     * Mengambil data setting masjid (id = 1)
     */
    public function ViewSetting()
    {
        return $this->db->table('tbl_setting')
            ->where('id', 1)
            ->get()
            ->getRowArray();
    }

    /**
     * Update data setting berdasarkan id
     */
    public function UpdateSetting($data)
    {
        return $this->db->table('tbl_setting')
            ->where('id', $data['id'])
            ->update($data);
    }

    /**
     * Mengambil data kas masjid untuk bulan dan tahun berjalan
     */
    public function AllDataKasMasjid()
    {
        return $this->db->table('tbl_kas_masjid')
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)', date('Y'))
            ->get()
            ->getResultArray();
    }

    /**
     * Mengambil data kas sosial untuk bulan dan tahun berjalan
     */
    public function AllDataKasSosial()
    {
        return $this->db->table('tbl_kas_sosial')
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)', date('Y'))
            ->get()
            ->getResultArray();
    }

    /**
     * Mengambil seluruh data donasi masuk beserta info rekening
     */
    public function AllDonasi()
    {
        return $this->db->table('tbl_donasi')
            ->join('tbl_rekening', 'tbl_rekening.id_rekening = tbl_donasi.id_rekening', 'left')
            ->select([
                'tbl_donasi.nama_bank AS nama_bank_pengirim',
                'tbl_donasi.no_rekening AS no_rekening_pengirim',
                'tbl_donasi.nama_pengirim',
                'tbl_donasi.jumlah',
                'tbl_donasi.tgl',
                'tbl_donasi.jenis_donasi',
                'tbl_donasi.bukti',
                'tbl_rekening.nama_bank AS nama_bank_tujuan',
                'tbl_rekening.no_rekening AS no_rekening_tujuan',
                'tbl_rekening.atas_nama',
            ])
            ->orderBy('tbl_donasi.id_donasi', 'DESC')
            ->get()
            ->getResultArray();
    }
}
