<?php $this->load->view('admin/notif') ?>
<style>
    .max.title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk Doa</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary" style="position: absolute; right:20px; top: 5px;" href="<?= base_url('administrator/produk/tambah_produk') ?>"> tambah</a>
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
                        <div class="card-header">
                            <h3 class="card-title">Data Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Foto</th>
                                        <th style="text-align: center;">Kode</th>
                                        <th style="text-align: center;">Produk</th>
                                        <th style="text-align: center;">Harga</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Aksi</th>
                                        <th style="text-align: center;">Penjelasan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_produk as $Data_produk) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no ?></td>
                                            <td style="text-align: center;">
                                                <img src="<?= base_url() ?>assets/produk/img/<?= $Data_produk->foto ?>" style="width: 120px;">
                                            </td>
                                            <td style="text-align: center;"><?= $Data_produk->id_produk ?></td>
                                            <td style="text-align: center;">
                                                <?php
                                                if ($Data_produk->nm_produk != null) :
                                                    # code...
                                                    echo $Data_produk->nm_produk;
                                                else :
                                                    echo 'Belum Disetting';
                                                endif;
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php
                                                if ($Data_produk->harga != 0) :
                                                    # code...
                                                    echo "Rp " . $Data_produk->harga . "-,";
                                                else :
                                                    echo 'Belum Disetting';
                                                endif;
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php
                                                if ($Data_produk->status == 'DRAFT') :
                                                    echo '<span class="badge badge-warning">DRAFT</span>';
                                                elseif ($Data_produk->status == 'PUBLISH') :
                                                    echo '<span class="badge badge-success">PUBLISH</span>';
                                                else :
                                                    echo '<span class="badge badge-danger">DELETE</span>';
                                                endif;
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url() ?>administrator/produk/d_produk/<?= encrypt_url($Data_produk->id_produk) ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="max title"> <?= htmlspecialchars_decode($Data_produk->penjelasan) ?></div>
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