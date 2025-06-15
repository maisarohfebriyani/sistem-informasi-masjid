<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelKasMasjid extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kas_masjid')
        ->get()->getResultArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table('tbl_kas_masjid')
        ->where('status', 'Masuk')
        ->get()->getResultArray();
    }

    public function AllDataKasKeluar()
    {
        return $this->db->table('tbl_kas_masjid')
        ->where('status', 'Keluar')
        ->get()->getResultArray();
    }

    public function InsertKasMasuk($data)
    {
        $this->db->table('tbl_kas_masjid')->insert($data);
    }

    public function InsertKasKeluar($data)
    {
        $this->db->table('tbl_kas_masjid')->insert($data);
    }

    public function UpdateKasMasuk($data)
    {
        $this->db->table('tbl_kas_masjid')
            ->where('id_kas', $data['id_kas'])
            ->update($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_kas_masjid')
            ->where('id_kas', $data['id_kas'])
            ->update($data);
    }

    public function DeleteKasMasuk($data)
{
    return $this->db->table('tbl_kas_masjid')->delete(['id_kas' => $data['id_kas']]);
}

public function DeleteKasKeluar($data)
{
    return $this->db->table('tbl_kas_masjid')->delete(['id_kas' => $data['id_kas']]);
}



}
