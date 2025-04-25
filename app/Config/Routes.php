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
$routes->setTranslateURIDashes(false);

$routes->set404Override();
// AUTO ROUTER SETTINGS
$routes->setAutoRoute(false); // matikan improved

// Daftar route manual
$routes->get('/', 'Home::index');         // Akses "/"
$routes->get('home', 'Home::index');      // Akses "/home"
$routes->get('admin', 'Admin::index');    // Akses "/admin"
$routes->get('admin/setting', 'Admin::setting'); // Pastikan menggunakan huruf kecil untuk admin/setting
$routes->get('login', 'Login::index');    // Akses "/login"
$routes->post('login/ceklogin', 'Login::ceklogin'); // Pastikan konsisten nama method
$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');
$routes->get('/login/logout', 'Login::logout');
$routes->get('/agenda', 'Agenda::index');
$routes->post('agenda/insert-data', 'Agenda::insertData');
$routes->get('agenda/hapus/(:num)', 'Agenda::hapus/$1');
$routes->get('agenda/edit/(:num)', 'Agenda::edit/$1');
$routes->post('agenda/update/(:num)', 'Agenda::updateData/$1');
$routes->get('admin', 'Admin::index'); // Rute untuk Dashboard
$routes->get('admin/setting', 'Admin::setting'); // Rute untuk Setting

