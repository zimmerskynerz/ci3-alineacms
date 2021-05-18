<!-- Notifikasi CRUD Kategori -->
<?= $this->session->flashdata('berhasil_tambah_kategori'); ?>
<?= $this->session->flashdata('berhasil_hapus_kategori'); ?>
<?= $this->session->flashdata('berhasil_ubah_kategori'); ?>
<!-- Notifikasi CRUD Tags -->
<?= $this->session->flashdata('berhasil_tambah_tags'); ?>
<?= $this->session->flashdata('berhasil_hapus_tags'); ?>
<?= $this->session->flashdata('berhasil_ubah_tags'); ?>
<!-- Notifikasi CRUD SMTPP -->
<?= $this->session->flashdata('berhasil_update_smtp') ?>
<?= $this->session->flashdata('berhasil_update_cs') ?>
<?= $this->session->flashdata('berhasil_update_midtrans') ?>
<!-- CRUD Pengguna -->
<?= $this->session->flashdata('berhasil_simpan_administrator') ?>
<?= $this->session->flashdata('gagal_simpan_administrator_email') ?>
<?= $this->session->flashdata('gagal_simpan_administrator_username') ?>

<!-- Notifikasi Pengaturan -->
<?= $this->session->flashdata('berhasil_menu_baru'); ?>
<?= $this->session->flashdata('berhasil_sub_menu_baru'); ?>
<?= $this->session->flashdata('berhasil_merubah_topbar'); ?>
<!-- Notifikasi CRUD Produk -->
<?= $this->session->flashdata('berhasil_upload_sampul'); ?>
<?= $this->session->flashdata('gagal_upload_sampul'); ?>
<?= $this->session->flashdata('berhasil_upload_berkas'); ?>
<?= $this->session->flashdata('gagal_upload_berkas'); ?>
<?= $this->session->flashdata('berhasil_publish_produk'); ?>
<?= $this->session->flashdata('berhasil_hapus_produk'); ?>