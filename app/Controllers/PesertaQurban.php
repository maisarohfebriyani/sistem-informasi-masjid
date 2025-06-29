<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPesertaQurban;
use App\Models\ModelTahun;
use App\Models\ModelKelompokQurban;

class PesertaQurban extends BaseController
{
    protected $ModelPesertaQurban;
    protected $ModelTahun;
    protected $KelompokQurban;

    public function __construct()
    {
        $this->ModelPesertaQurban = new ModelPesertaQurban;
        $this->ModelTahun = new ModelTahun;
        $this->KelompokQurban = new ModelKelompokQurban;
    }

    public function index()
    {
        $data = [
            'judul'     => 'Peserta Qurban',
            'menu'      => 'qurban',
            'submenu'   => 'peserta-qurban',
            'page'      => 'qurban/v_tahun_qurban',
            'tahun'     => $this->ModelTahun->AllData(),
            'peserta'   => $this->ModelPesertaQurban->findAll(),
        ];
        return view('v_template_admin', $data);
    }

    public function KelompokQurban($id_tahun)
    {
        $tahun = $this->ModelTahun->DetailData($id_tahun);

        if (!$tahun) {
            session()->setFlashdata('error', 'Data tahun tidak ditemukan.');
            return redirect()->to(base_url('PesertaQurban'));
        }

        $kelompok = $this->KelompokQurban->AllDataKelompok($id_tahun);

        if (empty($kelompok)) {
            session()->setFlashdata('info', 'Belum ada kelompok untuk tahun ini.');
        }

        $data = [
            'judul'     => 'Peserta Qurban Tahun ' . $tahun['tahun_h'] . ' H / ' . $tahun['tahun_m'] . ' M',
            'menu'      => 'qurban',
            'submenu'   => 'peserta-qurban',
            'page'      => 'qurban/v_kelompok_qurban',
            'tahun'     => $tahun,
            'kelompok'  => $kelompok,
        ];

        return view('v_template_admin', $data);
    }

    public function insertKelompok()
    {
        $id_tahun = $this->request->getPost('id_tahun');
        $nama_kelompok = $this->request->getPost('nama_kelompok');

        if (!$id_tahun || !$nama_kelompok) {
            session()->setFlashdata('error', 'Data tidak lengkap.');
            return redirect()->back();
        }

        $data = [
            'id_tahun'      => $id_tahun,
            'nama_kelompok' => $nama_kelompok,
        ];

        $this->KelompokQurban->insertKelompok($data);
        session()->setFlashdata('pesan', 'Kelompok berhasil ditambahkan.');
        return redirect()->to(base_url('PesertaQurban/KelompokQurban/' . $id_tahun));
    }

    public function DeleteKelompok($id_kelompok)
    {
        $data = $this->KelompokQurban->DetailKelompok($id_kelompok);

        if (!$data) {
            session()->setFlashdata('error', 'Data kelompok tidak ditemukan.');
            return redirect()->back();
        }

        $id_tahun = $data['id_tahun'];
        $this->KelompokQurban->DeleteKelompok($id_kelompok);

        session()->setFlashdata('pesan', 'Kelompok berhasil dihapus.');
        return redirect()->to(base_url('PesertaQurban/KelompokQurban/' . $id_tahun));
    }

    public function tambahAnggota($id_kelompok)
    {
        $nama = $this->request->getPost('nama_peserta');
        $biaya = $this->request->getPost('biaya');

        $data_kelompok = $this->KelompokQurban->DetailKelompok($id_kelompok);

        if (!$data_kelompok) {
            session()->setFlashdata('error', 'Kelompok tidak ditemukan.');
            return redirect()->back();
        }

        $db = \Config\Database::connect();
        $builder = $db->table('tbl_anggota_kelompok');

        $builder->insert([
            'id_kelompok' => $id_kelompok,
            'nama_peserta' => $nama,
            'biaya' => $biaya
        ]);

        session()->setFlashdata('pesan', 'Anggota berhasil ditambahkan.');
        return redirect()->to(base_url('PesertaQurban/KelompokQurban/' . $data_kelompok['id_tahun']));
    }

public function deletePeserta($id_anggota)
{
    $db = \Config\Database::connect();
    $db->table('tbl_anggota_kelompok')->where('id_anggota', $id_anggota)->delete();

    return redirect()->back()->with('success', 'Peserta berhasil dihapus.');
}


}
