<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/registrasi/checkout', 'Registrasi::checkout');
$routes->match(['GET', 'POST'], '/', 'Home::index');
$routes->match(['GET', 'POST'], '/registrasi', 'Registrasi::peserta');
// $routes->match(['GET', 'POST'], '/', 'Registrasi::peserta');
$routes->match(['GET', 'POST'], '/registrasi', 'Registrasi::peserta');
$routes->match(['GET', 'POST'], '/registrasi/peserta/(:segment)', 'Registrasi::peserta/$1');

$routes->group('admin', static function($routes) {
	$routes->get('/', 'Admin\Home::index');
	$routes->get('home', 'Admin\Home::index');
	$routes->get('event/exportDataPeserta', 'Admin\Event::exportDataPeserta');
	$routes->get('peserta/(:segment)', 'Admin\Peserta::$1');
	$routes->match(['GET', 'POST'], 'peserta/edit/(:num)', 'Admin\Peserta::edit/$1');
	$routes->match(['GET', 'POST'], 'peserta/hapus/(:num)', 'Admin\Peserta::hapus/$1');
	$routes->get('peserta/(:segment)/(:segment)', 'Admin\Peserta::$1/$2');
	$routes->post('event/registrasi', 'Admin\Event::registrasi');
	$routes->match(['GET', 'POST'], 'dpd/update', 'Admin\Dpd::update');
	$routes->match(['GET', 'POST'], 'event/dataRegistrasi', 'Admin\Event::dataRegistrasi');
	$routes->match(['GET', 'POST'], 'peserta/registrasiOnSpot', 'Admin\Peserta::registrasiOnSpot');
	$routes->match(['GET', 'POST'], 'peserta/hapus', 'Admin\Peserta::hapus');
	$routes->match(['GET', 'POST'], 'peserta/dataVoucher/(:num)', 'Admin\Peserta::dataVoucher/$1');

	$routes->get('validasi/kirimEtiket/(:num)', 'Admin\Validasi::kirimEtiket/$1');

	$routes->match(['GET', 'POST'], 'event/update', 'Admin\Event::update');
	$routes->match(['GET', 'POST'], 'event/update/(:num)', 'Admin\Event::update/$1');
	$routes->match(['GET', 'POST'], 'event/sesi/(:num)', 'Admin\Event::sesi/$1');
	$routes->match(['GET', 'POST'], 'validasi/dataPeserta/(:num)', 'Admin\Validasi::dataPeserta/$1');
	$routes->post('validasi/peserta/(:num)', 'Admin\Validasi::peserta/$1');
});

service('auth')->routes($routes);