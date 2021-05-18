<div class="modal fade" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Tambah Kategori</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('administrator/post/crudkategori'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Nama Kategori</label>
                    <input type="text" id="nm_kategori" name="nm_kategori" name="example-email" class="form-control" placeholder="Masukkan Nama Katgori" required>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Keterangan Kategori</label>
                    <textarea type="text" id="ket_kategori" name="ket_kategori" name="example-email" class="form-control" placeholder="Masukkan Keterangan Katgori"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="simpan_kategori" name="simpan_kategori">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Detail Kategori -->
<div class="modal fade" id="detail_kategori" tabindex="-1" role="dialog" aria-labelledby="detail_kategoriTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail_kategoriTitle">
                    Detail Data Kategori!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('administrator/post/crudkategori'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Nama Kategori</label>
                    <input type="text" id="nm_kategori" name="nm_kategori" name="example-email" class="form-control" placeholder="Masukkan Nama Katgori" required>
                    <input type="text" id="id_kategori" hidden name="id_kategori" name="example-email" class="form-control" placeholder="Masukkan Nama Katgori" required>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Keterangan Kategori</label>
                    <textarea type="text" id="ket_kategori" name="ket_kategori" name="example-email" class="form-control" placeholder="Masukkan Keterangan Katgori"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="hapus_kategori" name="hapus_kategori" class="btn btn-danger">Hapus</button>
                <button type="submit" id="ubah_kategori" name="ubah_kategori" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Form Ajax Kategori Juri -->
<script type="text/javascript">
    $(document).on("click", "#kategori_detail", function() {
        var id_kategori = $(this).data('id_kategori');
        var nm_kategori = $(this).data('nm_kategori');
        var ket_kategori = $(this).data('ket_kategori');
        $(".modal-body#detail_body #id_kategori").val(id_kategori);
        $(".modal-body#detail_body #nm_kategori").val(nm_kategori);
        $(".modal-body#detail_body #ket_kategori").val(ket_kategori);
    })
</script>