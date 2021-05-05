<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ILMU PARANORMAL 404 PAGE</title>
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>admin/dist/img/ilmuparanormal.png" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('cms/assets/admin/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('cms/assets/admin/') ?>dist/css/adminlte.min.css">
    <style>
        @media (min-width: 768px) {

            body:not(.sidebar-mini-md) .content-wrapper,
            body:not(.sidebar-mini-md) .main-footer,
            body:not(.sidebar-mini-md) .main-header {
                transition: margin-left 0.3s ease-in-out;
                margin-left: 0px;
            }
        }
    </style>
</head>

<body class="sidebar-mini">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Hilang 404</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('administrator') ?>">Home</a></li>
                            <li class="breadcrumb-item active">404 Halaman Hilang</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-warning"> 404</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Halaman Tidak Tersedia.</h3>

                    <p>
                        Anda Berhasil Menemukan Halaman Kosong Kami.
                        Silahkan, Kembali <a href="<?= base_url('cms/assets/admin/') ?>index.html">kejalan yang benar</a> atau hubungi web developer.
                    </p>

                    <form class="search-form">
                        <div class="input-group">
                            <h1>Terima Kasih!</h1>
                        </div>
                        <!-- /.input-group -->
                    </form>
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.1.0-rc
        </div>
        <strong>Copyright &copy; <?= date('Y') ?> <a href="https://ilmuparanormal.com">Ilmu Paranormal</a>.</strong> All rights reserved.
    </footer>

    <!-- jQuery -->
    <script src="<?= base_url('cms/assets/admin/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('cms/assets/admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('cms/assets/admin/') ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('cms/assets/admin/') ?>dist/js/demo.js"></script>
</body>

</html>