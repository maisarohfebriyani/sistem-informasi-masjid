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
$routes->setAutoRoute(false); // Tidak gunakan Auto Routing Improved

// Daftar route manual
$routes->get('/', 'Home::index');         
$routes->get('home', 'Home::index');      
$routes->get('admin', 'Admin::index');    
$routes->get('admin/setting', 'Admin::setting'); 
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


