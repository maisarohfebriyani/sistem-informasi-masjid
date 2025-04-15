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
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(true); // Aktifkan jika ingin menggunakan auto route klasik (CI3 style)

// Daftar route manual
$routes->get('/', 'Home::index');         // Akses "/"
$routes->get('home', 'Home::index');      // Akses "/home"
$routes->get('admin', 'Admin::index');    // Akses "/admin"
$routes->get('login', 'Login::index');    // Akses "/login"
$routes->post('login/ceklogin', 'Login::ceklogin'); // Pastikan konsisten nama method
$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');
$routes->get('/login/logout', 'Login::logout');





