<?php $this->load->view('admin/notif') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Konfigurasi SMTP</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DATA SERVER SMTP</h3>
                    </div>
                    <?php echo form_open_multipart('administrator/pengaturan/crudsmtp'); ?>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">SMTP Server</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="host" value="<?= $data_config['host'] ?>" placeholder="Masukkan SMTP Server" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username Email</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" name="username" value="<?= $data_config['username'] ?>" placeholder="Masukkan Username Email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password Email</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?= $data_config['password'] ?>" placeholder="Masukkan Password Email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Port SMTP</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name="port" value="<?= $data_config['port'] ?>" placeholder="Masukkan Port SMTP Email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Set From Email</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" name="setFrom" value="<?= $data_config['setFrom'] ?>" placeholder="Masukkan Set From Email" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="ubah_smtp" name="ubah_smtp">Simpan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>