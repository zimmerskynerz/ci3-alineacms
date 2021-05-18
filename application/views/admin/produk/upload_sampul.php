<div class="modal fade" id="upload_sampul" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Upload Sampul</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('administrator/produk/crudproduk'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Upload Foto</label>
                    <input type="file" id="foto" name="foto" name="example-email" class="form-control" placeholder="Masukkan Foto Sampul" required>
                    <input type="text" id="id_produk" hidden value="<?= encrypt_url($data_produk['id_produk']) ?>" name="id_produk" class="form-control" placeholder="Masukkan Email Pengguna">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="upload_sampul" name="upload_sampul">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Upload Berkas PDF -->
<div class="modal fade" id="upload_pdf" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Upload Berkas PDF</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('administrator/produk/crudproduk'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Upload Berkas</label>
                    <input type="file" id="berkas" name="berkas" name="example-email" class="form-control" placeholder="Masukkan Berkas Doa" required>
                    <input type="text" id="id_produk" hidden value="<?= encrypt_url($data_produk['id_produk']) ?>" name="id_produk" class="form-control" placeholder="Masukkan Email Pengguna">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="upload_pdf" name="upload_pdf">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>