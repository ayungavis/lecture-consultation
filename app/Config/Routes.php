<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

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
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index');
$routes->add('auth/login', 'AuthController::login');
$routes->add('auth/logout', 'AuthController::logout');
$routes->add('notifikasi/read/all', 'NotifikasiController::readAll');
$routes->add('notifikasi/(:segment)/read', 'NotifikasiController::read/$1');

// User
$routes->add('users', 'UserController::index');
$routes->add('users/store', 'UserController::store');
$routes->add('users/create', 'UserController::create');
$routes->add('users/(:segment)', 'UserController::show/$1');
$routes->add('users/(:segment)/edit', 'UserController::edit/$1');
$routes->add('users/(:segment)/update', 'UserController::update/$1');
$routes->add('users/(:segment)/delete', 'UserController::destroy/$1');

// Program studi
$routes->add('program-studi', 'ProgramStudiController::index');
$routes->add('program-studi/store', 'ProgramStudiController::store');
$routes->add('program-studi/create', 'ProgramStudiController::create');
$routes->add('program-studi/(:segment)', 'ProgramStudiController::show/$1');
$routes->add('program-studi/(:segment)/edit', 'ProgramStudiController::edit/$1');
$routes->add('program-studi/(:segment)/update', 'ProgramStudiController::update/$1');
$routes->add('program-studi/(:segment)/delete', 'ProgramStudiController::destroy/$1');

// Fakultas
$routes->add('fakultas', 'FakultasController::index');
$routes->add('fakultas/store', 'FakultasController::store');
$routes->add('fakultas/create', 'FakultasController::create');
$routes->add('fakultas/(:segment)', 'FakultasController::show/$1');
$routes->add('fakultas/(:segment)/edit', 'FakultasController::edit/$1');
$routes->add('fakultas/(:segment)/update', 'FakultasController::update/$1');
$routes->add('fakultas/(:segment)/delete', 'FakultasController::destroy/$1');

// Topik konsultasi
$routes->add('topik-konsultasi', 'TopikKonsultasiController::index');
$routes->add('topik-konsultasi/store', 'TopikKonsultasiController::store');
$routes->add('topik-konsultasi/create', 'TopikKonsultasiController::create');
$routes->add('topik-konsultasi/(:segment)', 'TopikKonsultasiController::show/$1');
$routes->add('topik-konsultasi/(:segment)/edit', 'TopikKonsultasiController::edit/$1');
$routes->add('topik-konsultasi/(:segment)/update', 'TopikKonsultasiController::update/$1');
$routes->add('topik-konsultasi/(:segment)/delete', 'TopikKonsultasiController::destroy/$1');

// Konsultasi
$routes->add('konsultasi', 'KonsultasiController::index');
$routes->add('konsultasi/store', 'KonsultasiController::store');
$routes->add('konsultasi/create', 'KonsultasiController::create');
$routes->add('konsultasi/(:segment)', 'KonsultasiController::show/$1');
$routes->add('konsultasi/(:segment)/edit', 'KonsultasiController::edit/$1');
$routes->add('konsultasi/(:segment)/update', 'KonsultasiController::update/$1');
$routes->add('konsultasi/(:segment)/delete', 'KonsultasiController::destroy/$1');

// Detail Konsultasi
$routes->add('detail-konsultasi', 'DetailKonsultasiController::index');
$routes->add('detail-konsultasi/store', 'DetailKonsultasiController::store');
$routes->add('detail-konsultasi/create', 'DetailKonsultasiController::create');
$routes->add('detail-konsultasi/(:segment)', 'DetailKonsultasiController::show/$1');
$routes->add('detail-konsultasi/(:segment)/edit', 'DetailKonsultasiController::edit/$1');
$routes->add('detail-konsultasi/(:segment)/update', 'DetailKonsultasiController::update/$1');
$routes->add('detail-konsultasi/(:segment)/delete', 'DetailKonsultasiController::destroy/$1');

// Periode
$routes->add('periode', 'PeriodeController::index');
$routes->add('periode/store', 'PeriodeController::store');
$routes->add('periode/create', 'PeriodeController::create');
$routes->add('periode/(:segment)', 'PeriodeController::show/$1');
$routes->add('periode/(:segment)/edit', 'PeriodeController::edit/$1');
$routes->add('periode/(:segment)/update', 'PeriodeController::update/$1');
$routes->add('periode/(:segment)/delete', 'PeriodeController::destroy/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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