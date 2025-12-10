<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman User (Bebas Akses)
$routes->get('/', 'Home::index');
$routes->post('/pesan', 'Home::pesan');

// Login & Logout
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');

// Halaman Admin (DIPROTEKSI Filter 'auth')
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin::index');           // Dashboard
    $routes->get('stok', 'Admin::stok');         // Kelola Stok
    $routes->post('update-stok', 'Admin::update_stok');
    $routes->get('transaksi', 'Admin::transaksi'); // Riwayat
});