<?php $this->load->view('admin/notif') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengguna Administrator</h1>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" style="position: absolute; right:20px; top: 5px;" data-target="#tambah_administrator">
                        Tambah
                    </button>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width: 15px;">No</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Username</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Gabung</th>
                                        <th style="text-align: center; width: 15px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_administrator as $Data_administrator) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no; ?></td>
                                            <td><?= $Data_administrator->nm_pengguna ?></td>
                                            <td><?= $Data_administrator->username ?></td>
                                            <td><?= $Data_administrator->email ?></td>
                                            <td><?= date('d F Y', strtotime($Data_administrator->tgl_gabung)) ?></td>
                                            <td style="text-align: center;">
                                                <a id="administrator_detail" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_administrator" 
                                                data-nm_pengguna="<?= $Data_administrator->nm_pengguna ?>" 
                                                data-username="<?= $Data_administrator->username ?>" 
                                                data-email="<?= $Data_administrator->email ?>" 
                                                data-id_login="<?= $Data_administrator->id_login ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php $this->load->view('admin/pengguna/administrator/tambah_data') ?>
<?php $this->load->view('admin/pengguna/administrator/detail_data') ?>