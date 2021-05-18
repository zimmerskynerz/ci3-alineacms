<?php $this->load->view('admin/notif') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Produk Baru</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card card-primary">
                        <!-- Simpan Semua -->
                        <form role="form" method="POST" action="<?= base_url('administrator/produk/simpan') ?>">
                            <input type="hidden" name="<?= csrf_name() ?>" value="<?= csrf_token() ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="judul">Nama Produk</label>
                                    <input type="text" class="form-control" value="<?= $data_produk['id_produk'] ?>" id="id_produk" hidden name="id_produk">
                                    <?php
                                    if ($data_produk['nm_produk'] != null) : ?>
                                        <input type="text" class="form-control" value="<?= $data_produk['nm_produk'] ?>" id="nm_produk" placeholder="Nama Produk" required name="nm_produk">
                                    <?php else : ?>
                                        <input type="text" class="form-control" id="nm_produk" placeholder="Nama Produk" required name="nm_produk">
                                    <?php endif;
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="isi_post">Penjelasan Produk</label>
                                    <?php
                                    if ($data_produk['penjelasan'] != null) : ?>
                                        <textarea id="content" class="form-control" name="penjelasan"><?= $data_produk['penjelasan'] ?></textarea>
                                    <?php else : ?>
                                        <textarea id="content" class="form-control" name="penjelasan"></textarea>
                                    <?php endif;
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Harga Produk</label>
                                    <?php
                                    if ($data_produk['penjelasan'] != null) : ?>
                                        <input type="number" class="form-control" id="harga" placeholder="Harga Produk" required name="harga" value="<?= $data_produk['harga'] ?>">
                                    <?php else : ?>
                                        <input type="number" class="form-control" id="harga" placeholder="Harga Produk" required name="harga">
                                    <?php endif;
                                    ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="hapus_produk" name="hapus_produk" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                <button type="submit" id="simpan_produk" name="simpan_produk" class="btn btn-primary"><i class="fas fa-save"></i> Publish</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card card-primary">
                        <!-- Simpan Foto Sampul -->
                        <form role="form">
                            <div class="card-header">
                                <h6>Gambar Sampul</h6>
                            </div>
                            <div class="card-body">
                                <?php if ($data_produk['foto'] != null) : ?>
                                    <div class="form-group">
                                        <img src="<?= base_url() ?>assets/produk/img/<?= $data_produk['foto'] ?>" style="max-width: 100%; height: auto;">
                                    </div>
                                    <div class="add-btn">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload_sampul">
                                            Update
                                        </button>
                                    </div>
                                <?php else : ?>
                                    <div class="add-btn">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload_sampul">
                                            Tambah
                                        </button>
                                    </div>
                                <?php endif;
                                ?>
                            </div>
                        </form>
                    </div>
                    <div class="card card-primary">
                        <form role="form">
                            <div class="card-header">
                                <h6>File PDF</h6>
                            </div>
                            <div class="card-body">
                                <?php if ($data_produk['link_produk'] != null) : ?>
                                    <div class="form-group">
                                        <a href="<?= $data_produk['link_produk'] ?>"><i class="far fa-file-pdf"></i> Link Produk</a>
                                    </div>
                                    <div class="add-btn">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload_pdf">
                                            Update
                                        </button>
                                    </div>
                                <?php else : ?>
                                    <div class="add-btn">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload_pdf">
                                            Tambah
                                        </button>
                                    </div>
                                <?php endif;
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.tiny.cloud/1/6wl1abiyb8pin8f3dk5mnowk2kojs5qzxje6c0i2phfnhk37/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    var baseUrl = "<?= base_url() ?>";
    tinymce.init({
        selector: '#content',
        relative_urls: false,
        remove_script_host: false,
        document_base_url: "<?= base_url() ?>",
        height: 600,
        plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste imagetools"],
        toolbar: ["styleselect | bold italic alignleft aligncenter alignright alignjustify bullist numlist outdent indent link image", "fontsizeselect | strikethrough forecolor backcolor removeformat pagebreak table | undo redo | fullscreen code"],
        menubar: false,
        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '<?= base_url('administrator/berita/upload_img') ?>');
            xhr.setRequestHeader("<?= csrf_name() ?>", "<?= csrf_token() ?>");
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);
                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        }
    });
</script>
<?php $this->load->view('admin/produk/upload_sampul') ?>