<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

// Default route settings
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // jika ingin menggunakan auto route klasik

// Tambahkan route manual
$routes->get('/', 'Home::index');       // Akses melalui "/"
$routes->get('home', 'Home::index');    // Biar bisa akses "/home"
$routes->get('admin', 'Admin::index');  // Akses "/admin"
