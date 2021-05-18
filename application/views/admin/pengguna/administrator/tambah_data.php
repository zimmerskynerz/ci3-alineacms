<div class="modal fade" id="tambah_administrator" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Tambah Administrator</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('administrator/pengguna/crudadmin'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Email</label>
                    <input type="email" id="email" name="email" name="example-email" class="form-control" placeholder="Masukkan Email Pengguna" required>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Username</label>
                    <input type="text" id="username" name="username" name="example-email" class="form-control" placeholder="Masukkan Username Pengguna" required>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Nama Lengkap</label>
                    <input type="text" id="nm_pengguna" name="nm_pengguna" name="example-email" class="form-control" placeholder="Masukkan Nama Pengguna" required>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Password</label>
                    <input type="password" id="password" name="password" name="example-email" class="form-control" placeholder="Masukkan Password Pengguna" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="simpan_administrator" name="simpan_administrator">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>