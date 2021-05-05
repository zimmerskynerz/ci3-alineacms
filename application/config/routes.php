<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'lostpage';
$route['translate_uri_dashes'] = FALSE;

// Detail produk
$route['produk/(:any)']                             = 'Produk/detail/$1';
// Beli Langsung
$route['produk/snap/token']                         = 'Produk/token';
$route['produk/snap/bayarlangsung']                 = 'Produk/bayarlangsung';
$route['produk/tracking-transaksi/(:any)']          = 'Produk/konfirmasi/$1';
$route['notif/order']                               = 'Notification/index';
// Percobaan Midtrans