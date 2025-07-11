<?php

namespace App\Controllers;

use App\Models\ModelHome;
use App\Models\ModelAdmin;
use App\Models\ModelKasMasjid;
use App\Models\ModelKasSosial;
use App\Models\ModelTahun;
use App\Models\ModelRekening;

class Home extends BaseController
{
    protected $ModelHome;
    protected $ModelAdmin;
    protected $ModelKasMasjid;
    protected $ModelKasSosial;
    protected $ModelTahun;
    protected $ModelRekening;

    public function __construct()
    {
        $this->ModelHome = new ModelHome(); 
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->ModelKasSosial = new ModelKasSosial();
        $this->ModelTahun = new ModelTahun();
        $this->ModelRekening = new ModelRekening();
    }

    public function index()
    {
        $setting = $this->ModelAdmin->ViewSetting();

        // Cegah error jika id_kota kosong atau API gagal
        $url = 'https://api.myquran.com/v2/sholat/jadwal/' . $setting['id_kota'] . '/' . date('Y') . '/' . date('m') . '/' . date('d');
        $response = @file_get_contents($url);
        $waktu = @json_decode($response, true);

        if (!isset($waktu['data'])) {
            $waktu['data'] = [
                'lokasi' => 'Data lokasi tidak tersedia',
                'jadwal' => []
            ];
        }

        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'waktu' => $waktu,
            'kas' => $this->ModelKasMasjid->AllData(),
            'kas_s' => $this->ModelKasSosial->AllData(),
        ];

        return view('v_tamplate', $data);
    }

    public function Donasi()
    {
        $data = [
            'judul' => 'Donasi',
            'page' => 'front-end/v_donasi',
            'rek' => $this->ModelRekening->AllData(),
            'validation' => \Config\Services::validation(),
        ];

        return view('v_tamplate', $data);
    }

    public function KirimDonasi()
    {
        if ($this->validate([
            'bukti' => [
                'label' => "Bukti",
                'rules' => "uploaded[bukti]|max_size[bukti,1500]|mime_in[bukti,image/png,image/jpg,image/jpeg]",
                'errors' => [
                    'uploaded' => '{field} belum dipilih!',
                    'max_size' => '{field} maksimal 1500 KB!',
                    'mime_in' => 'Format {field} harus JPG, PNG, atau JPEG!',
                ]
            ],
        ])) {
            $bukti = $this->request->getFile('bukti');
            $nama_file = $bukti->getRandomName();

            $data = [
                'id_rekening'   => $this->request->getPost('id_rekening'),
                'nama_bank'     => $this->request->getPost('nama_bank'),
                'no_rekening'   => $this->request->getPost('no_rekening'),
                'nama_pengirim' => $this->request->getPost('nama_pengirim'),
                'jumlah'        => $this->request->getPost('jumlah'),
                'jenis_donasi'  => $this->request->getPost('jenis_donasi'),
                'bukti'         => $nama_file,
                'tgl'           => date('Y-m-d'),
            ];

            $bukti->move('bukti', $nama_file);
            $this->ModelHome->InsertDonasi($data);

            session()->setFlashdata('pesan', 'Terima Kasih! Bukti Transaksi Sudah Dikirim!');
            return redirect()->to(base_url('Home/Donasi'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Home/Donasi'))->withInput();
        }
    }

    public function DonasiMasuk()
    {
        $data = [
            'judul'  => 'Donasi Masuk',
            'page'   => 'admin/v_donasi_masuk',
            'donasi' => $this->ModelHome->AllDataDonasi(),
        ];

        return view('v_tamplate', $data);
    }

public function Agenda()
    {
        $data = [
            'judul'     => 'Agenda',
            'page'      => 'front-end/v_agenda',
            'agenda'    => $this->ModelHome->Agenda(),
        ];

        return view('v_tamplate', $data);
    }

    public function PesertaQurban()
    {
        $tahun_masehi = date('Y');
        $tahun_hijriyah = $tahun_masehi - 579;

        $data = [
            'judul'     => 'Peserta Qurban ' . $tahun_hijriyah . ' H / ' . $tahun_masehi . ' M',
            'page'      => 'front-end/v_peserta_qurban',
            'kelompok'  => $this->ModelHome->AllDataKelompok(),
        ];

        return view('v_tamplate', $data);
    }

    public function RekapKasMasjid()
    {
        $data = [
            'judul'     => 'Rekap Kas Masjid',
            'page'      => 'front-end/v_rekap_kas',
            'kas'       => $this->ModelHome->AllDataKasMasjid(),
        ];

        return view('v_tamplate', $data);
    }

    public function RekapKasSosial()
    {
        $data = [
            'judul'     => 'Rekap Kas Sosial',
            'page'      => 'front-end/v_rekap_kas',
            'kas'       => $this->ModelHome->AllDataKasSosial(),
        ];

        return view('v_tamplate', $data);
    }


}
