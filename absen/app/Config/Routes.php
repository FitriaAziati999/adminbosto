<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('create-db', function(){
	$forge = \Config\Database::forge();
	if ($forge->createDatabase('ab_bosto'))
	{
        echo 'Database created!';
	}
});
$routes->get('login', 'Auth::login');

// $routes->get('/', 'Home::index');
$routes->addRedirect('/', 'home');
$routes->get('export/karyawan', 'karyawan::exportPDF');
$routes->resource('karyawan');
$routes->get('nokartu', 'nokartu::index');
$routes->resource('absensi');
// $routes->resource('absensi');
// $routes->get('export/karyawan', 'karyawan::exportPDF');
$routes->get('export/cuti', 'cuti::exportPDF');
$routes->get('cuti/get', 'cuti::index');
$routes->get('cuti/(:num)', 'Cuti::show/$1');
$routes->get('cuti/(:num)/setengah_hari', 'Cuti::setengah_hari/$1');
$routes->get('cuti/(:num)/sehari', 'Cuti::sehari/$1');
// $routes->get('karyawan/edit/(:any)', 'Karyawan::edit/$1');
// $routes->put('karyawan/(:any)', 'Karyawan::update/$1');
//$routes->get('karyawan/new', 'Karyawan::create');
//$routes->post('karyawan', 'Karyawan::store');
// $routes->get('karyawan', 'Karyawan::index');
// $routes->get('absensi', 'Absensi::index');
$routes->resource('scan');
$routes->get('scan', 'scan::index');
$routes->get('bacakartu', 'scan::bacakartu');
// $routes->get('bacakartu', 'scan::ceknomor');
$routes->get('laporan', 'Laporan::index');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
