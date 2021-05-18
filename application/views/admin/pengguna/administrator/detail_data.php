<!-- Detail Kategori -->
<div class="modal fade" id="detail_administrator" tabindex="-1" role="dialog" aria-labelledby="detail_administratorTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail_administratorTitle">
                    Detail Data Administrator!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('administrator/pengguna/crudadmin'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Email</label>
                    <input type="email" id="email" readonly name="email" name="example-email" class="form-control" placeholder="Masukkan Email Pengguna" required>
                    <input type="text" id="id_login" hidden name="id_login" name="example-email" class="form-control" placeholder="Masukkan Email Pengguna" required>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Username</label>
                    <input type="text" id="username" readonly name="username" name="example-email" class="form-control" placeholder="Masukkan Username Pengguna" required>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Nama Lengkap</label>
                    <input type="text" id="nm_pengguna" name="nm_pengguna" name="example-email" class="form-control" placeholder="Masukkan Nama Pengguna" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="reset_administrator" name="reset_administrator" class="btn btn-warning">Reset</button>
                <button type="submit" id="hapus_administrator" name="hapus_administrator" class="btn btn-danger">Hapus</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Form Ajax Kategori Juri -->
<script type="text/javascript">
    $(document).on("click", "#administrator_detail", function() {
        var email = $(this).data('email');
        var id_login = $(this).data('id_login');
        var username = $(this).data('username');
        var nm_pengguna = $(this).data('nm_pengguna');
        $(".modal-body#detail_body #email").val(email);
        $(".modal-body#detail_body #id_login").val(id_login);
        $(".modal-body#detail_body #username").val(username);
        $(".modal-body#detail_body #nm_pengguna").val(nm_pengguna);
    })
</script>