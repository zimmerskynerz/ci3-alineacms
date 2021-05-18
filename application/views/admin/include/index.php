<!DOCTYPE html>
<html lang="en">

<!-- 
Website ini dibuat dan dikembangkan oleh awbimasakti
Nama Template : OnlineShop Non-Courir
Pencipta      : AWBimasakti and Yusuf1bimasakti
Author        : PT. Bimasakti Indera Gemilang
Creator       : https://ilmuparanormal.com 
-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SELAMAT DATANG ADMINISTRATOR</title>
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>admin/dist/img/ilmuparanormal.png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/adminlte.min.css">
    <script src="<?= base_url('assets/') ?>sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/') ?>sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/style.css">
    <!-- CRUD JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- 
    Template dibuat dan dikembangkan oleh awbimasakti
    Nama Template : OnlineShop Non-Courir
    Pencipta      : AWBimasakti and Yusuf1bimasakti
    Author        : PT. Bimasakti Indera Gemilang
    Creator       : https://awhome.net
     -->
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/include/topbar_navi') ?>
        <!-- Main Sidebar Container -->
        <?php $this->load->view('admin/include/menu_navi') ?>
        <!-- Content Wrapper. Contains page content -->
        <?php $this->load->view('admin/' . $folder . '/' . $halaman . '') ?>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0-rc
            </div>
            <strong>Copyright &copy; <?= date('Y') ?> <a href="https://ilmuparanormal.com">Ilmu Paranormal</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/admin/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script src="<?= base_url('assets/') ?>sweetalert2/notif_admin.js"></script>
</body>

</html>