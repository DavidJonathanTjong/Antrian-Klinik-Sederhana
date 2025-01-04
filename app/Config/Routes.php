<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// tampilan awal akses web DONE
$routes->get('/', 'Home::index');

//pendaftaran calon pasien DONE
$routes->get('/regis-online/old', 'RegistrasiOnline::tampilanPasienLamaStep1'); // secara default pasien lama
$routes->post('/cekpasien', 'RegistrasiOnline::cekPasienLama'); //parse data ke step 2

$routes->get('/regis-online/new', 'RegistrasiOnline::tampilanPasienBaruStep1'); // ini ketika mendaftar pasien baru
$routes->post('/tambah-pasienbaru', 'RegistrasiOnline::simpanDataPasienBaru'); //parse data ke step 2

$routes->get('get-lokasi', 'RegistrasiOnline::getLokasi');
$routes->post('get-poli', 'RegistrasiOnline::getPoliByLokasi');
$routes->post('get-dokter', 'RegistrasiOnline::getDokterByTanggalPoli');

$routes->get('/regis-online/step2', 'RegistrasiOnline::tampilanStep2');
$routes->post('/parseAllData', 'RegistrasiOnline::submitPadaStep2');

$routes->get('/regis-online/step3', 'RegistrasiOnline::tampilanStep3');
$routes->post('/konfirmasiregis', 'RegistrasiOnline::registerPasienOnline');

//Tampilan cek jadwal
$routes->post('/cekjadwalpasien', 'Home::getKunjunganPasien');



//login ke dashboard DONE
$routes->post('login', 'Login::auth');

// sistem informasi untuk manajemen antrian dan entity SELESAI
$routes->group('sirs', function ($routes){
    $routes->get('logout', 'Login::logout'); 
    $routes->get('dashboard', 'Login::index', ['filter' => 'role:hrd,admin']); 
    
    $routes->group('pegawai', ['filter' => 'role:hrd'], function ($routes){
        $routes->get('/', 'Pegawai::index');
        $routes->get('add', 'Pegawai::tambahform');
        $routes->post('submit', 'Pegawai::submit');
        $routes->get('edit/(:segment)', 'Pegawai::edit/$1');
        $routes->post('update', 'Pegawai::update');
        $routes->get('delete/(:segment)', 'Pegawai::delete/$1');
    });

    $routes->group('users', ['filter' => 'role:hrd'], function ($routes){
        $routes->get('/', 'User::index');
        $routes->get('add', 'User::tambahform');
        $routes->post('submit', 'User::submit');
        $routes->get('edit/(:num)', 'User::edit/$1');
        $routes->post('update', 'User::update');
        $routes->get('delete/(:num)', 'User::delete/$1');
    });

    $routes->group('poli', ['filter' => 'role:admin'], function ($routes){
        $routes->get('/', 'Poli::index');
        $routes->get('add', 'Poli::tambahform');
        $routes->post('submit', 'Poli::submit');
        $routes->get('edit/(:num)', 'Poli::edit/$1');
        $routes->post('update', 'Poli::update');
        $routes->get('delete/(:num)', 'Poli::delete/$1');
    });

    $routes->group('ruangan', ['filter' => 'role:admin'], function ($routes){
        $routes->get('/', 'Ruangan::index');
        $routes->get('add', 'Ruangan::tambahform');
        $routes->post('submit', 'Ruangan::submit');
        $routes->get('edit/(:num)', 'Ruangan::edit/$1');
        $routes->post('update', 'Ruangan::update');
        $routes->get('delete/(:num)', 'Ruangan::delete/$1');
    });

    $routes->group('dokter', ['filter' => 'role:admin,hrd'], function ($routes){
        $routes->get('/', 'Dokter::index');
        $routes->get('add', 'Dokter::tambahform');
        $routes->post('submit', 'Dokter::submit');
        $routes->get('edit/(:num)', 'Dokter::edit/$1');
        $routes->post('update', 'Dokter::update');
        $routes->get('delete/(:num)', 'Dokter::delete/$1');
    });

    $routes->group('pasien', ['filter' => 'role:admin'], function ($routes){
        $routes->get('/', 'Pasien::index');
        $routes->get('add', 'Pasien::tambahform');
        $routes->post('submit', 'Pasien::submit');
        $routes->get('edit/(:num)', 'Pasien::edit/$1');
        $routes->post('update', 'Pasien::update');
        $routes->get('delete/(:num)', 'Pasien::delete/$1');
    });

    $routes->group('jadwaldokter', ['filter' => 'role:admin'], function ($routes){
        $routes->get('/', 'JadwalDokter::index');
        $routes->get('add', 'JadwalDokter::tambahform');
        $routes->post('submit', 'JadwalDokter::submit');
        $routes->get('edit/(:num)', 'JadwalDokter::edit/$1');
        $routes->post('update', 'JadwalDokter::update');
        $routes->get('delete/(:num)', 'JadwalDokter::delete/$1');
    });

    $routes->group('antrian', ['filter' => 'role:admin'], function ($routes){
        $routes->get('/', 'Antrian::index');
        $routes->get('add', 'Antrian::tambahform');
        $routes->post('submit', 'Antrian::submit');
        $routes->get('delete/(:num)', 'Antrian::delete/$1');
    });
    
    $routes->group('penjadwalan', ['filter' => 'role:admin'], function ($routes){
        $routes->get('/', 'Penjadwalan::index');
        $routes->get('add', 'Penjadwalan::tambahform');
        $routes->post('submit', 'Penjadwalan::submit');
        $routes->get('update/(:num)', 'Penjadwalan::updateStatus/$1');
        $routes->get('delete/(:num)', 'Penjadwalan::delete/$1');
    });


});