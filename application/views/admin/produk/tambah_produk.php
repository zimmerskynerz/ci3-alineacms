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
            <form role="form" method="POST" action="<?= base_url('administrator/produk/simpan') ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="card card-primary">
                            <input type="hidden" name="<?= csrf_name() ?>" value="<?= csrf_token() ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="judul">Nama Produk</label>
                                    <input type="text" class="form-control" id="nm_produk" placeholder="Nama Produk" required name="nm_produk">
                                </div>
                                <div class="form-group">
                                    <label for="isi_post">Penjelasan Produk</label>
                                    <textarea id="content" class="form-control" name="penjelasan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Harga Produk</label>
                                    <input onkeyup="toRupiah(event)" type="text" class="form-control" id="harga" placeholder="Harga Produk" required name="harga">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url('administrator/produk') ?>" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Publish</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="select2-kategori form-control" name="categories[]" multiple="multiple" required>
                                        <option value="">Pilih kategori</option>
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= $category->id_kategori ?>"><?= $category->nm_kategori ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select class="select2-tags form-control" name="tags[]" multiple="multiple">
                                        <option value="">Pilih Tags</option>
                                        <?php foreach ($tags as $tag) : ?>
                                            <option value="<?= $tag->id_tags ?>"><?= $tag->nm_tags ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h6>Gambar Sampul</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pilih Gambar</label>
                                    <input type="file" name="gambar" class="form-control border-0" onchange="preview(event, '#img-holder')">
                                    <img src="#" id="img-holder" width="200" class="img-thumbnail mt-2 mx-auto d-block" onerror="this.style.cssText = 'display:none !important'">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h6>File PDF</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pilih File PDF</label>
                                    <input type="file" name="pdf" class="form-control border-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<script src="https://cdn.tiny.cloud/1/6wl1abiyb8pin8f3dk5mnowk2kojs5qzxje6c0i2phfnhk37/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?= base_url('assets/admin/plugins/select2/js/select2.full.min.js') ?>"></script>
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

    $('.select2-kategori').select2({
        placeholder: 'Pilih kategori'
    });
    $('.select2-tags').select2({
        tags: true,
        placeholder: 'Pilih Tags'
    });
</script>