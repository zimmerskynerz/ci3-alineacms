<?php $this->load->view('admin/notif') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tags Berita</h1>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" style="position: absolute; right:20px; top: 5px;" data-target="#tambah_tags">
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
                                        <th style="text-align: center; width: 15px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_tags as $Data_tags) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no; ?></td>
                                            <td><?= $Data_tags->nm_tags ?></td>
                                            <td style="text-align: center;">
                                                <a id="tags_detail" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_tags" data-id_tags="<?= $Data_tags->id_tags ?>" data-nm_tags="<?= $Data_tags->nm_tags ?>">
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
<?php $this->load->view('admin/post/detail_tags') ?>