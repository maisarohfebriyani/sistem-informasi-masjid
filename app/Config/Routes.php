<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

// Pengaturan default routing
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true); // Aktifkan agar kas-masjid -> KasMasjid

$routes->set404Override();
// AUTO ROUTER SETTINGS
$routes->setAutoRoute(true); // Tidak gunakan Auto Routing Improved

// Daftar route manual
$routes->get('/', 'Home::index');         
$routes->get('home', 'Home::index');      
$routes->get('Admin', 'Admin::index');   
$routes->get('Admin/setting', 'Admin::setting'); 
$routes->post('Admin/updatesetting', 'Admin::UpdateSetting');
$routes->get('login', 'Login::index');    
$routes->post('login/ceklogin', 'Login::ceklogin'); 
$routes->get('register', 'Register::index');
$routes->post('register/save', 'Register::save');
$routes->get('login/logout', 'Login::logout');
$routes->get('agenda', 'Agenda::index');
$routes->post('agenda/insert-data', 'Agenda::insertData');
$routes->get('agenda/hapus/(:num)', 'Agenda::hapus/$1');
$routes->get('agenda/edit/(:num)', 'Agenda::edit/$1');
$routes->post('agenda/update/(:num)', 'Agenda::updateData/$1');
$routes->get('KasMasjid', 'KasMasjid::index');  // URI huruf besar
$routes->get('KasMasjid/KasMasuk', 'KasMasjid::KasMasuk');
$routes->get('KasMasjid/KasMasuk', 'KasMasjid::KasMasuk');
$routes->get('KasMasjid/KasKeluar', 'KasMasjid::KasKeluar');
$routes->post('KasMasjid/InsertKasMasuk', 'KasMasjid::InsertKasMasuk');
$routes->post('KasMasjid/InsertKasKeluar', 'KasMasjid::InsertKasKeluar');
$routes->post('KasMasjid/UpdateKasMasuk/(:num)', 'KasMasjid::UpdateKasMasuk/$1');
$routes->post('KasMasjid/UpdateKasKeluar/(:num)', 'KasMasjid::UpdateKasKeluar/$1');
$routes->get('KasMasjid/DeleteKasMasuk/(:num)', 'KasMasjid::DeleteKasMasuk/$1');
$routes->get('KasMasjid/DeleteKasKeluar/(:num)', 'KasMasjid::DeleteKasKeluar/$1');
$routes->get('kas-sosial', 'KasSosial::index');
$routes->get('kas-sosial/tambah', 'KasSosial::tambah');
$routes->post('kas-sosial/simpan', 'KasSosial::simpan');
$routes->get('kas-sosial/edit/(:num)', 'KasSosial::edit/$1');
$routes->post('kas-sosial/update/(:num)', 'KasSosial::update/$1');
$routes->get('kas-sosial/hapus/(:num)', 'KasSosial::hapus/$1');
$routes->get('qurban/tahun', 'Qurban::Tahun/$1');
$routes->post('tahun/insert-data', 'Tahun::insert_data');
$routes->post('Tahun/Update-data/(:num)', 'Tahun::Update-data/$1');
$routes->get('tahun/hapus/(:num)', 'Tahun::hapus/$1');
$routes->get('/PesertaQurban', 'PesertaQurban::index');
$routes->get('/peserta-qurban/kelompok/(:num)', 'PesertaQurban::KelompokQurban/$1');
$routes->get('PesertaQurban/DeleteKelompok/(:num)/(:num)', 'PesertaQurban::DeleteKelompok/$1/$2');
$routes->post('PesertaQurban/insertKelompok', 'PesertaQurban::insertKelompok');













