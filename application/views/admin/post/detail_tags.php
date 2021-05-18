<div class="modal fade" id="tambah_tags" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Tambah Tags Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('administrator/post/crudtags'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Nama Tags</label>
                    <input type="text" id="nm_tags" name="nm_tags" name="example-email" class="form-control" placeholder="Masukkan Nama Tags" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="simpan_tags" name="simpan_tags">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Detail Kategori -->
<div class="modal fade" id="detail_tags" tabindex="-1" role="dialog" aria-labelledby="detail_tagsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail_tagsTitle">
                    Detail Data Tags!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('administrator/post/crudtags'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Nama Tags</label>
                    <input type="text" id="nm_tags" name="nm_tags" name="example-email" class="form-control" placeholder="Masukkan Nama Tags" required>
                    <input type="number" hidden id="id_tags" name="id_tags" name="example-email" class="form-control" placeholder="Masukkan Nama Katgori" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="hapus_tags" name="hapus_tags" class="btn btn-danger">Hapus</button>
                <button type="submit" id="ubah_tags" name="ubah_tags" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Form Ajax Kategori Juri -->
<script type="text/javascript">
    $(document).on("click", "#tags_detail", function() {
        var id_tags = $(this).data('id_tags');
        var nm_tags = $(this).data('nm_tags');
        $(".modal-body#detail_body #id_tags").val(id_tags);
        $(".modal-body#detail_body #nm_tags").val(nm_tags);
    })
</script>