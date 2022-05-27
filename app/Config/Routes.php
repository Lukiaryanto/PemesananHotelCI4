<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

// untuk menampilkan halaman depan 
###########################################################
# Route untuk pengunjung web site                         #\
###########################################################






// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::index');
$routes->get('/User/tipe-kamar', 'User::tampilTipeKamar');
$routes->get('/User/daftar', 'User::daftar');
$routes->post('/User/daftar', 'User::simpanDaftar');
$routes->get('/User/cetak/(:num)', 'User::cetakDaftar/$1');


$routes->get('/petugas', 'Petugascontroller::index');
$routes->post('/petugas/login', 'Petugascontroller::login');
$routes->get('/petugas/logout', 'Petugascontroller::logout');
$routes->get('/petugas/dashboard', 'Dashboardpetugas::index', ['filter' => 'otentifikasi']);


// routes kamar
$routes->get('/kamar/tampil', 'PetugasController::tampilKamar');
$routes->get('/kamar/tambah', 'PetugasController::tambahKamar');
$routes->post('/kamar/simpan', 'PetugasController::simpanKamar');
$routes->get('/kamar/edit/(:num)', 'PetugasController::editKamar/$1');
$routes->post('/kamar/update/(:num)', 'PetugasController::updateKamar/$1');
$routes->get('/kamar/hapus/(:num)', 'PetugasController::hapusKamar/$1');

// routes fasilitas kamar
$routes->get('/fasilitaskamar', 'Fasilitaskamar::index', ['filter' => 'otentifikasi']);
$routes->get('/fasilitaskamar/tambah', 'Fasilitaskamar::tambahFasilitaskamar', ['filter' => 'otentifikasi']);
$routes->post('/fasilitaskamar/simpan', 'Fasilitaskamar::simpanFasilitaskamar', ['filter' => 'otentifikasi']);
$routes->get('/fasilitaskamar/edit/(:num)', 'Fasilitaskamar::EditFasilitaskamar/$1', ['filter' => 'otentifikasi']);
$routes->post('/fasilitaskamar/update/(:num)', 'Fasilitaskamar::updateFasilitaskamar/$1', ['filter' => 'otentifikasi']);
$routes->get('/fasilitaskamar/hapus/(:num)', 'Fasilitaskamar::hapusFasilitaskamar/$1', ['filter' => 'otentifikasi']);

// routes fasilitas hotel
$routes->get('/fasilitashotel', 'Fasilitashotel::index', ['filter' => 'otentifikasi']);
$routes->get('/fasilitashotel/tambah', 'Fasilitashotel::tambahFasilitashotel', ['filter' => 'otentifikasi']);
$routes->post('/fasilitashotel/simpan', 'Fasilitashotel::simpanFasilitashotel', ['filter' => 'otentifikasi']);
$routes->get('/fasilitashotel/edit/(:num)', 'Fasilitashotel::EditFasilitashotel/$1', ['filter' => 'otentifikasi']);
$routes->post('/fasilitashotel/update/(:num)', 'Fasilitashotel::updateFasilitashotel/$1', ['filter' => 'otentifikasi']);
$routes->get('/fasilitashotel/hapus/(:num)', 'Fasilitashotel::hapusFasilitashotel/$1', ['filter' => 'otentifikasi']);




// routes reservasi
$routes->get('/resevasi/tampil', 'PetugasController::tampilReservasi');
$routes->get('/reservasi/tambah', 'PetugasController::tambahDaftar');
$routes->post('/reservasi/simpan', 'PetugasController::simpanDaftar');
$routes->get('/kamar/edit/(:num)', 'PetugasController::editKamar/$1');
$routes->post('/kamar/update', 'PetugasController::updateKamar');
$routes->get('/kamar/hapus/(:num)', 'PetugasController::hapusKamar/$1');
$routes->get('/Reservasi/edit/(:num)', 'Reservasi::editKamar/$1');
$routes->post('/Reservasi/status/(:num)', 'Reservasi::statusKamar/$1');
$routes->get('/Reservasi/cetak-bukti/(:num)', 'Reservasi::CetakBukti/$1');
$routes->get('/Reservasi/hapus/(:num)', 'Reservasi::hapusBukti/$1');



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
