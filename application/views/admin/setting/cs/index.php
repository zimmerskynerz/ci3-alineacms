<?php $this->load->view('admin/notif') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customers Service</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Customer Service</h3>
                    </div>
                    <?php echo form_open_multipart('administrator/pengaturan/crudcs'); ?>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nomor WA</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name="no_wa" value="<?= $data_config['no_wa'] ?>" placeholder="Masukkan Nomor WA" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Link Instagram</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="link_ig" value="<?= $data_config['link_ig'] ?>" placeholder="Masukkan Link Instagram" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Link Youtube</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="link_yt" value="<?= $data_config['link_yt'] ?>" placeholder="Masukkan Link Youtube" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="ubah_cs" name="ubah_cs">Simpan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>