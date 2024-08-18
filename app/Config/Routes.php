<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman utama
$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index'); // Halaman utama (alternatif)

// Routing untuk Proyek
$routes->get('/proyek', 'ProyekController::index');
$routes->get('/proyek/create', 'ProyekController::create');
$routes->post('/proyek/store', 'ProyekController::store');
$routes->get('/proyek/edit/(:num)', 'ProyekController::edit/$1');
$routes->put('/proyek/update/(:num)', 'ProyekController::update/$1');
$routes->delete('/proyek/delete/(:num)', 'ProyekController::delete/$1');

// Routing untuk Lokasi
$routes->get('/lokasi', 'LokasiController::index');
$routes->get('/lokasi/create', 'LokasiController::create');
$routes->post('/lokasi/store', 'LokasiController::store');
$routes->get('lokasi/edit/(:num)', 'LokasiController::edit/$1');
$routes->put('/lokasi/update/(:num)', 'LokasiController::update/$1');
$routes->delete('/lokasi/delete/(:num)', 'LokasiController::delete/$1');
