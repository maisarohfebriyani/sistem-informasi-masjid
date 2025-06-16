<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelKasSosial extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kas_sosial')
        ->get()->getResultArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table('tbl_kas_sosial')
        ->where('status', 'Masuk')
        ->get()->getResultArray();
    }

    public function AllDataKasKeluar()
    {
        return $this->db->table('tbl_kas_sosial')
        ->where('status', 'Keluar')
        ->get()->getResultArray();
    }

    public function InsertKasMasuk($data)
    {
        $this->db->table('tbl_kas_sosial')->insert($data);
    }

    public function InsertKasKeluar($data)
    {
        $this->db->table('tbl_kas_sosial')->insert($data);
    }

    public function UpdateKasMasuk($data)
{
    $this->db->table('tbl_kas_sosial')
             ->where('id_kas_sosial', $data['id_kas_sosial']) // ✅ Pastikan ini cocok dengan nama kolom database
             ->update($data);
}


    public function UpdateData($data)
    {
        $this->db->table('tbl_kas_sosial')
            ->where('id_kas', $data['id_kas'])
            ->update($data);
    }

    public function DeleteKasMasuk($data)
{
    return $this->db->table('tbl_kas_sosial')->delete(['id_kas_sosial' => $data['id_kas_sosial']]);
}

public function DeleteKasKeluar($data)
{
    return $this->db->table('tbl_kas_sosial')->delete(['id_kas_sosial' => $data['id_kas_sosial']]);
}



}
