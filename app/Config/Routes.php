<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->post('/cek_login', 'AuthController::cek_login');
$routes->get('/register', 'AuthController::register');
$routes->post('/tambah_user', 'AuthController::tambah_user');
$routes->get('/logout', 'AuthController::logout');


$routes->get('/home', 'HomeController::index', ['filter' => 'authFilter']);

//USER
$routes->get('user', 'UserController::index', ['filter' => 'authFilter']);
$routes->add('user/store', 'UserController::store', ['filter' => 'authFilter']);
$routes->post('user/(:segment)/edit', 'UserController::edit/$1', ['filter' => 'authFilter']);
$routes->get('user/(:segment)/destroy', 'UserController::destroy/$1', ['filter' => 'authFilter']);

//OBAT
$routes->get('obat', 'ObatController::index', ['filter' => 'authFilter']);
$routes->add('obat/store', 'ObatController::store', ['filter' => 'authFilter']);
$routes->post('obat/(:segment)/edit', 'ObatController::edit/$1', ['filter' => 'authFilter']);
$routes->get('obat/(:segment)/destroy', 'ObatController::destroy/$1', ['filter' => 'authFilter']);

//CUSTOMER
$routes->get('customer', 'UserController::customer', ['filter' => 'authFilter']);

//PENDAFTARAN Customer
$routes->get('pendaftaran', 'PendaftaranController::index', ['filter' => 'authFilter']);
$routes->get('pendaftaran/add', 'PendaftaranController::add', ['filter' => 'authFilter']);
$routes->add('pendaftaran/store', 'PendaftaranController::store', ['filter' => 'authFilter']);


//PENDAFTARAN KASIR
$routes->get('pendaftaran/kasir', 'PendaftaranController::kasir', ['filter' => 'authFilter']);
$routes->add('pendaftaran/(:segment)/proses', 'PendaftaranController::proses/$1', ['filter' => 'authFilter']);
$routes->add('pendaftaran/(:segment)/tolak', 'PendaftaranController::tolak/$1', ['filter' => 'authFilter']);


//PENDAFTARAN TRANSAKSI (DOKTER)
$routes->get('transaksi', 'TransaksiController::index', ['filter' => 'authFilter']);
$routes->add('transaksi/add', 'TransaksiController::add', ['filter' => 'authFilter']);
