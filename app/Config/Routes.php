<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

  $routes->get('/pages', 'Home::index');
  // $routes->get('/dashboard', 'Home::dashboard', ['filter' => 'auth_login']);
  // $routes->get('/pemilik', 'Home::dashboard');
  // $routes->get('/gudang', 'Home::dashboard');
  $routes->get('/pemilik', 'Home::pemilik');
  // $routes->get('/pemilik', 'Home::pemilika');
  
  $routes->get('/logout_ac', 'Home::logout_ac');
  $routes->post('val/login', 'Home::val_user');

  //---USER---
  $routes->get('/user', 'User::index');
  $routes->get('/ubah', 'User::update');

  //---PENGGAJIAN---
  $routes->get('/penggajian', 'Penggajian::index');

  //---GOLONGAN GAJI---
  $routes->get('/gol_gaji', 'Gaji::index');

  //---KARYAWAN--
  $routes->get('/karyawan', 'Karyawan::index');
  
 
