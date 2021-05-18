<?php $this->load->view('admin/notif') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Konfigurasi MIDTRANS</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DATA SERVER MIDTRANS</h3>
                    </div>
                    <?php echo form_open_multipart('administrator/pengaturan/crudmidtrans'); ?>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">ID Marchan</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="id_merchan" value="<?= $data_config['id_merchan'] ?>" placeholder="Masukkan SMTP Server" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Client Key</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="client_key" value="<?= $data_config['client_key'] ?>" placeholder="Masukkan Username Email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Server Key</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="server_key" value="<?= $data_config['server_key'] ?>" placeholder="Masukkan Password Email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Snap.js</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="snap_js" value="<?= $data_config['snap_js'] ?>" placeholder="Masukkan Port SMTP Email" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="ubah_midtrans" name="ubah_midtrans">Simpan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>