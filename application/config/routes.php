<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'lostpage';
$route['translate_uri_dashes'] = FALSE;

// Menu Akses Pelanggan
// Detail produk
$route['produk/(:any)']                             = 'Produk/detail/$1';
// Beli Langsung
$route['produk/snap/token']                         = 'Produk/token';
$route['produk/snap/bayarlangsung']                 = 'Produk/bayarlangsung';
$route['produk/tracking-transaksi/(:any)']          = 'Produk/konfirmasi/$1';
$route['notif/order']                               = 'Produk/NotifLangsung';
// $route['produk/snap/ordernotif']                    = 'Produk/NotifLangsung';
// Tambah Keranjang
$route['cart']                                      = 'Keranjang/index';
$route['produk/snap/tambahkeranjang']               = 'Produk/crudtransaksi';
$route['produk/snap/tokenkeranjang']                = 'Keranjang/token';
$route['produk/snap/bayarkeranjang']                = 'Produk/bayarkeranjang';

// Akses Menu Administrator
// Menu Utama Administrator
$route['login']                                     = 'Login';
$route['login/cek_login']                           = 'Login/cek_login';
$route['login/logout']                              = 'Login/logout';
$route['wp-admin']                                  = 'Login'; 
// Register
$route['administrator']                             = 'admin/ControllerAdminBeranda/index';
$route['administrator/pengguna']                    = 'admin/ControllerAdminBeranda/pengguna';
// Menu Pot, Kategori, Tags
// Menu Kategori
$route['administrator/post/kategori']               = 'admin/ControllerAdminBerita/kategori';
$route['administrator/post/crudkategori']           = 'admin/ControllerAdminBerita/crudkategori';
// Menu Tags
$route['administrator/post/tags']                   = 'admin/ControllerAdminBerita/tags';
$route['administrator/post/crudtags']               = 'admin/ControllerAdminBerita/crudtags';
// $route['administrator/post/coba_slug']  = 'admin/ControllerAdminBerita/coba_slug';
// Menu Berita Administrator
$route['administrator/berita']                     = 'admin/ControllerAdminBerita/index';
$route['administrator/berita/all']                 = 'admin/ControllerAdminBerita/index';
$route['administrator/berita/tambah']              = 'admin/ControllerAdminBerita/tambah';
$route['administrator/berita/store']               = 'admin/ControllerAdminBerita/storePost';
$route['administrator/berita/upload_img']          = 'admin/ControllerAdminBerita/uploadImage';
$route['administrator/berita/edit/(:any)']         = 'admin/ControllerAdminBerita/edit/$1';
$route['administrator/berita/crudberita']          = 'admin/ControllerAdminBerita/crudberita';

// Menu Produk
$route['administrator/produk']                     = 'admin/ControllerProduk/index';

// Menu Pengguna
// Menu Pengguna->Administrator
$route['administrator/pengguna']                   = 'admin/ControllerPengguna/administrator';
$route['administrator/pengguna/administrator']     = 'admin/ControllerPengguna/administrator';
$route['administrator/pengguna/crudadmin']         = 'admin/ControllerPengguna/crudadmin';
// Menu Pengguna->Pelanggan
$route['administrator/pengguna/pelanggan']         = 'admin/ControllerPengguna/pelanggan';
$route['administrator/pengguna/crudpelanggan']     = 'admin/ControllerPengguna/crudpelanggan';

// Menu Produk
$route['administrator/produk/index']               = 'admin/ControllerProduk/index';
$route['administrator/produk/tambah_produk']       = 'admin/ControllerProduk/tambah_produk';
$route['administrator/produk/d_produk/(:any)']     = 'admin/ControllerProduk/d_produk/$1';
$route['administrator/produk/simpan']              = 'admin/ControllerProduk/simpan';
$route['administrator/produk/crudproduk']          = 'admin/ControllerProduk/crudproduk';
$route['administrator/produk/hapus']               = 'admin/ControllerProduk/hapus';

// Menu Pengaturan
// Menu Foto Top Bar
$route['administrator/pengaturan/identitas']       = 'admin/ControllerPengaturan/topbar';
$route['administrator/pengaturan/crudtopbar']      = 'admin/ControllerPengaturan/crudtopbar';
// Menu Navigation
$route['administrator/pengaturan/navigation']      = 'admin/ControllerPengaturan/navigation';
$route['administrator/pengaturan/crudnavigation']  = 'admin/ControllerPengaturan/crudnavigation';
// Menu SMTP
$route['administrator/pengaturan/smtp']            = 'admin/ControllerPengaturanSMTP/index';
$route['administrator/pengaturan/crudsmtp']        = 'admin/ControllerPengaturanSMTP/crudsmtp';
$route['administrator/pengaturan/ceksmtp']         = 'admin/ControllerPengaturanSMTP/ceksmtp';
// Midtrans
$route['administrator/pengaturan/midtrans']        = 'admin/ControllerPengaturanMidtrans/index';
$route['administrator/pengaturan/crudmidtrans']    = 'admin/ControllerPengaturanMidtrans/crudmidtrans';
// Menu Customer Service
$route['administrator/pengaturan/cs']              = 'admin/ControllerPengaturanCS/index';
$route['administrator/pengaturan/crudcs']          = 'admin/ControllerPengaturanCS/crudcs';
