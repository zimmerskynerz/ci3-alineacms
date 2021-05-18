<?php $this->load->view('admin/notif') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Setting Identitas Website</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
                        <li class="breadcrumb-item active">identitas</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- /.card -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Setting Icon & Ads</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open_multipart('administrator/pengaturan/crudtopbar'); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul Website</label>
                                <input type="text" class="form-control" value="<?= $data_topbar['jdl_web'] ?>" id="jdl_web" name="jdl_web" placeholder="Masukkan Judul Website">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Desc Website</label>
                                <input type="text" class="form-control" value="<?= $data_topbar['desc_web'] ?>" id="desc_web" name="desc_web" placeholder="Masukkan Desc Website">
                            </div>
                            <!-- Input Icon -->
                            <div class="form-group">
                                <label for="exampleInputFile">Icon Grup</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="icon" name="icon">
                                        <label class="custom-file-label" for="exampleInputFile">Cari Gambar</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control" value="<?= $data_topbar['icon_web'] ?>" id="icon_lama" hidden name="icon_lama" placeholder="Masukkan Desc Website">
                            </div>
                            <!-- View Gambar Icon -->
                            <div>
                                <div class="position-relative">
                                    <img src="<?= base_url('assets') ?>/setting/<?= $data_topbar['icon_web'] ?>" alt="Photo 1" class="img-fluid">
                                </div>
                            </div>
                            <!-- Input Gambar Logo 1 -->
                            <div class="form-group">
                                <label for="exampleInputFile">Logo Grup 1</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo_1" name="logo_1">
                                        <label class="custom-file-label" for="exampleInputFile">Cari Gambar</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control" value="<?= $data_topbar['logo_1'] ?>" id="logo_1_lama" hidden name="logo_1_lama" placeholder="Masukkan Desc Website">
                            </div>
                            <!-- View Gambar Logo 1 -->
                            <div>
                                <div class="position-relative">
                                    <img src="<?= base_url('assets') ?>/setting/<?= $data_topbar['logo_1'] ?>" alt="Photo 1" class="img-fluid">
                                </div>
                            </div>
                            <!-- Input Gambar Logo 2 -->
                            <div class="form-group">
                                <label for="exampleInputFile">Logo Grup 2</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo_2" name="logo_2">
                                        <label class="custom-file-label" for="exampleInputFile">Cari Gambar</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control" value="<?= $data_topbar['logo_2'] ?>" id="logo_2_lama" hidden name="logo_2_lama" placeholder="Masukkan Desc Website">
                            </div>
                            <!-- View Gambar Logo 2 -->
                            <div>
                                <div class="position-relative">
                                    <img src="<?= base_url('assets') ?>/setting/<?= $data_topbar['logo_2'] ?>" alt="Photo 1" class="img-fluid">
                                </div>
                            </div>
                            <!-- Input Gambar Ads 1 -->
                            <div class="form-group">
                                <label for="exampleInputFile">Ads Opt 1</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ads_1" name="ads_1">
                                        <label class="custom-file-label" for="exampleInputFile">Cari Gambar</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control" value="<?= $data_topbar['ads_1'] ?>" id="ads_1_lama" hidden name="ads_1_lama" placeholder="Masukkan Desc Website">
                            </div>
                            <!-- View Gambar Ads 1 -->
                            <div>
                                <div class="position-relative">
                                    <img src="<?= base_url('assets') ?>/setting/<?= $data_topbar['ads_1'] ?>" alt="Photo 1" class="img-fluid">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link Ads 1</label>
                                <input type="text" class="form-control" value="<?= $data_topbar['link_ads1'] ?>" id="link_ads1" name="link_ads1" placeholder="Masukkan Link Ads 1">
                            </div>
                            <!-- Input Gambar Ads 2 -->
                            <div class="form-group">
                                <label for="exampleInputFile">Ads Opt 2</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ads_2" name="ads_2">
                                        <label class="custom-file-label" for="exampleInputFile">Cari Gambar</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control" value="<?= $data_topbar['ads_2'] ?>" id="ads_2_lama" hidden name="ads_2_lama" placeholder="Masukkan Desc Website">
                            </div>
                            <!-- View Gambar Ads 2 -->
                            <div>
                                <div class="position-relative">
                                    <img src="<?= base_url('assets') ?>/setting/<?= $data_topbar['ads_2'] ?>" alt="Photo 1" class="img-fluid">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link Ads 2</label>
                                <input type="text" class="form-control" value="<?= $data_topbar['link_ads2'] ?>" id="link_ads2" name="link_ads2" placeholder="Masukkan Link Ads 2">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- Menu -->
                <div class="col-md-6">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Navigation Menu</h3>
                            <button type="button" class="btn btn-primary" style="position: absolute; right:12px; top: 5px;" data-toggle="modal" data-target="#tambah_menu">Tambah</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Menu</th>
                                        <th style="text-align: center;">Keterangan</th>
                                        <th style="text-align: center;">Link</th>
                                        <th style="text-align: center;">Urutan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_menu as $Data_menu) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no ?></td>
                                            <td><?= $Data_menu->nm_menu ?></td>
                                            <td>
                                                <?php if ($Data_menu->ket_menu == 'MAIN') :
                                                    echo 'Menu Utama';
                                                else :
                                                    $data_id = $Data_menu->id_menu_sub;
                                                    foreach ($menu_utama as $Cek_menu) :
                                                        if ($Data_menu->id_menu_sub == $Cek_menu->id_menu) :
                                                            echo 'Sub Menu Dari ' . $Cek_menu->nm_menu;
                                                        endif;
                                                    endforeach;
                                                endif;
                                                ?>
                                            </td>
                                            <td><?= $Data_menu->link_menu ?></td>
                                            <td style="text-align: center;"><?= $Data_menu->urut ?></td>
                                        </tr>
                                    <?php $no++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Menu</th>
                                        <th style="text-align: center;">Keterangan</th>
                                        <th style="text-align: center;">Link</th>
                                        <th style="text-align: center;">Urutan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_menu as $Data_menu) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no ?></td>
                                            <td><?= $Data_menu->nm_menu ?></td>
                                            <td>
                                                <?php if ($Data_menu->ket_menu == 'MAIN') :
                                                    echo 'Menu Utama';
                                                else :
                                                    $data_id = $Data_menu->id_menu_sub;
                                                    foreach ($menu_utama as $Cek_menu) :
                                                        if ($Data_menu->id_menu_sub == $Cek_menu->id_menu) :
                                                            echo 'Sub Menu Dari ' . $Cek_menu->nm_menu;
                                                        endif;
                                                    endforeach;
                                                endif;
                                                ?>
                                            </td>
                                            <td><?= $Data_menu->link_menu ?></td>
                                            <td style="text-align: center;"><?= $Data_menu->urut ?></td>
                                        </tr>
                                    <?php $no++;
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
<div class="modal fade" id="tambah_menu" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Tambah Menu Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('administrator/pengaturan/crudnavigation'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="alamat">Nama</label>
                    <input type="text" id="nm_menu" name="nm_menu" name="example-email" class="form-control" placeholder="Nama Menu" required>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Urutan Menu</label>
                    <input type="number" id="urut" name="urut" name="example-email" class="form-control" placeholder="Urutan Menu Dashboard" required>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Keterangan Menu</label>
                    <select name="ket" id="ket" class="form-control" required onchange="showDiv(this)">
                        <option>Jenis Menu</option>
                        <option value="MENU">Menu Utama</option>
                        <option value="SUB">Menu Sub</option>
                    </select>
                </div>
                <div class="form-group mb-3" id="select_menu_utama" style="display:none">
                    <label for="alamat">Menu Utama</label>
                    <select name="id_menu_sub" id="id_menu_sub" class="form-control">
                        <option>Pilih Menu Utama</option>
                        <?php foreach ($menu_utama as $Menu_utama) : ?>
                            <option value="<?= $Menu_utama->id_menu ?>"><?= $Menu_utama->nm_menu ?></option>
                        <?php endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Link</label>
                    <input type="text" id="link_menu" name="link_menu" name="example-email" class="form-control" placeholder="Masukkan Link Menu">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="menu_baru" name="menu_baru">Simpan</button>
                <button type="submit" class="btn btn-primary" id="sub_menu_baru" style="display: none;" name="sub_menu_baru">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script>

</script>
<!-- Modal Detail PEngurus -->
<div class="modal fade" id="detail_kegiatan" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Detail Pengurus</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/kegiatan/crudkegiatan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="alamat">Nama Kegiatan</label>
                    <input type="text" id="nm_kegiatan" name="nm_kegiatan" name="example-email" class="form-control" placeholder="Nama Kegiatan">
                    <input type="text" id="id_kegiatan" hidden name="id_kegiatan" name="example-email" class="form-control" placeholder="Nama Kegiatan">
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Keterangan Kegiatan</label>
                    <textarea class="form-control" id="ket_kegiatan" name="ket_kegiatan" placeholder="Keterangan Kegiatan" rows="2"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Tanggal Acara</label>
                    <input type="date" id="tgl_kegiatan" min=<?php $tgl_ini = date('Y-m-d');
                                                                echo $tgl_ini; ?> name="tgl_kegiatan" name="example-email" class="form-control" placeholder="Masukkan Tanggal Mulai Acara">
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Penanggung Jawab</label>
                    <select name="id_pengurus" id="id_pengurus" class="form-control">
                        <?php foreach ($data_pengurus as $Data_pengurus) : ?>
                            <option value="<?= $Data_pengurus->id_pengurus ?>"><?= $Data_pengurus->nm_pengurus ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="hapus_kegiatan" name="hapus_kegiatan" class="btn btn-danger">Hapus</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    function showDiv(select) {
        if (select.value == 'SUB') {
            $("#select_menu_utama").show();
            $("#sub_menu_baru").show();
            $("#menu_baru").hide();
        } else {
            $("#select_menu_utama").hide();
            $("#sub_menu_baru").hide();
            $("#menu_baru").show();
        }
    }
    $(document).on("click", "#kegiatan_detail", function() {
        var id_kegiatan = $(this).data('id_kegiatan');
        var nm_kegiatan = $(this).data('nm_kegiatan');
        var ket_kegiatan = $(this).data('ket_kegiatan');
        var tgl_kegiatan = $(this).data('tgl_kegiatan');
        var id_pengurus = $(this).data('id_pengurus');
        $(".modal-body#detail_body #id_kegiatan").val(id_kegiatan);
        $(".modal-body#detail_body #nm_kegiatan").val(nm_kegiatan);
        $(".modal-body#detail_body #ket_kegiatan").val(ket_kegiatan);
        $(".modal-body#detail_body #tgl_kegiatan").val(tgl_kegiatan);
        $(".modal-body#detail_body #id_pengurus").val(id_pengurus);
    })
</script>
<script>
    setTimeout(function() {
        $('#pesan_berhasil').hide()
    }, 3000);
    setTimeout(function() {
        $('#pesan_gagal').hide()
    }, 3000);
</script>