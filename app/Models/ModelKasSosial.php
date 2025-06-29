<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelKasSosial extends Model
{
    protected $table            = 'tbl_kas_sosial';
    protected $primaryKey       = 'id_kas_sosial';
    protected $allowedFields    = ['tanggal', 'ket', 'kas_masuk', 'kas_keluar', 'status'];

    public function AllData()
    {
        return $this->findAll();
    }

    public function AllDataKasMasuk()
    {
        return $this->where('status', 'Masuk')->findAll();
    }

    public function AllDataKasKeluar()
    {
        return $this->where('status', 'Keluar')->findAll();
    }

    public function InsertKasMasuk($data)
    {
        return $this->insert($data);
    }

    public function InsertKasKeluar($data)
    {
        return $this->insert($data);
    }

    public function UpdateKasMasuk($data)
    {
        return $this->update($data['id_kas_sosial'], $data);
    }

    public function UpdateKasKeluar($data)
    {
        return $this->update($data['id_kas_sosial'], $data);
    }

    public function DeleteKasMasuk($data)
    {
        return $this->delete($data['id_kas_sosial']);
    }

    public function DeleteKasKeluar($data)
    {
        return $this->delete($data['id_kas_sosial']);
    }
}
