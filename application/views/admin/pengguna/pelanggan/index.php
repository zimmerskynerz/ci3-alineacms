<?php $this->load->view('admin/notif') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pelanggan</h1>
                </div>
                <div class="col-sm-6">
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
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">No HP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_pelanggan as $Data_pelanggan) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no; ?></td>
                                            <td><?= $Data_pelanggan->nm_pengguna ?></td>
                                            <td><?= $Data_pelanggan->email ?></td>
                                            <td><?= $Data_pelanggan->no_hp ?></td>
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