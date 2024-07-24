<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Modul Login (Tidak Perlu Filter)
$routes->get('/', 'LoginController::index');
$routes->group('login', function ($routes) {
    $routes->get('', 'LoginController::index');
    $routes->post('proses', 'LoginController::loginProses');
    $routes->get('logout', 'LoginController::logout');
});

$routes->get('unauthorized', function () {
    return view('unauthorized');
});


// Modul Halaman Admin
$routes->get('/dashboard', 'Home::index', ['filter' => 'auth:admin']);

// Modul Admin-User
$routes->group('users', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('', 'UserController::index');
    $routes->get('tambah', 'UserController::tambah');
    $routes->post('tambah-save', 'UserController::tambah_save');
    $routes->get('edit/(:num)', 'UserController::edit/$1');
    $routes->post('edit-save/(:num)', 'UserController::edit_save/$1');
    $routes->get('delete/(:num)', 'UserController::delete/$1');
});

// Modul Admin-Pegawai
$routes->group('pegawai', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('', 'PegawaiController::index');
    $routes->get('tambah', 'PegawaiController::tambah');
    $routes->post('tambah-save', 'PegawaiController::tambah_save');
    $routes->get('edit/(:num)', 'PegawaiController::edit/$1');
    $routes->post('edit-save/(:num)', 'PegawaiController::edit_save/$1');
    $routes->get('delete/(:num)', 'PegawaiController::delete/$1');
});

// Modul Admin-Supir
$routes->group('supir', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('', 'SupirController::index');
    $routes->get('tambah', 'SupirController::tambah');
    $routes->post('store', 'SupirController::store');
    $routes->get('edit/(:num)', 'SupirController::edit/$1');
    $routes->post('edit-save/(:num)', 'SupirController::edit_save/$1');
    $routes->get('delete/(:num)', 'SupirController::delete/$1');
});

// Modul Admin-Mobil
$routes->group('mobil', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('', 'MobilController::index');
    $routes->get('tambah', 'MobilController::tambah');
    $routes->post('store', 'MobilController::store');
    $routes->get('edit/(:num)', 'MobilController::edit/$1');
    $routes->post('edit-save/(:num)', 'MobilController::edit_save/$1');
    $routes->get('delete/(:num)', 'MobilController::delete/$1');
});

// Modul Halaman Peminjam
$routes->group('peminjam', ['filter' => 'auth:peminjam'], function ($routes) {
    $routes->get('', 'PeminjamController::index');
});
$routes->group('nota_peminjam', ['filter' => 'auth:peminjam'], function ($routes) {
    $routes->get('', 'PeminjamController::nota_peminjam');
    $routes->get('tambah', 'PeminjamController::tambah');
    $routes->post('tambah_save', 'PeminjamController::tambah_save');
    $routes->get('view/(:num)', 'PeminjamController::view/$1');
    $routes->get('delete/(:num)', 'PeminjamController::delete/$1');
});

// Modul Halaman Kabag
$routes->get('kabag', 'KabagController::index', ['filter' => 'auth:kabag']);
$routes->group('surat_masuk', ['filter' => 'auth:kabag'], function ($routes) {
    $routes->get('', 'KabagController::surat_masuk');
    $routes->get('view/(:num)', 'KabagController::view/$1');
    $routes->get('progress/(:num)', 'KabagController::progress/$1');
    $routes->get('cetak/(:num)', 'KabagController::generatePdf/$1');
    $routes->get('approved/(:num)', 'KabagController::approve/$1');
    $routes->get('rejected/(:num)', 'KabagController::reject/$1');
});

// Modul Halaman PJ
$routes->get('pj', 'PJController::index', ['filter' => 'auth:pj']);
$routes->group('nota_pj', ['filter' => 'auth:pj'], function ($routes) {
    $routes->get('', 'PJController::nota_pj');
    $routes->get('tambah/(:num)', 'PJController::tambah/$1');
    $routes->post('tambah_save/(:num)', 'PJController::tambah_save/$1');
    $routes->get('view/(:num)', 'PJController::view/$1');
    $routes->get('riwayat', 'PJController::history');
    $routes->get('cek-dinas/(:num)', 'PJController::dinas_selesai/$1');
});

// Modul profil
$routes->get('profil/(:num)', 'ProfilController::index/$1');
$routes->post('ubah_data/(:num)', 'ProfilController::ubahPassword/$1');
