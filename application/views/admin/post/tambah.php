<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Post</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card card-primary">
                        <form role="form" method="POST" action="<?= base_url('administrator/berita/store') ?>">
                            <input type="hidden" name="<?= csrf_name() ?>" value="<?= csrf_token() ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="judul">Judul Post</label>
                                    <input type="text" class="form-control" id="judul" placeholder="Judul" required name="judul">
                                    <div class="permalink-group d-none mb-3 mt-2">
                                        <span>Permalink: </span>
                                        <span id="baseurl" class="d-none"></span>
                                        <span id="thisPermalink"></span>
                                        <input type="text" name="slug" class="form-permalink d-none" id="permalink" required autocomplete="off">
                                        <span id="sunting" class="badge badge-success sunting">sunting</span>
                                        <span id="sunting_ok" class="badge badge-success d-none sunting">Ok</span>
                                        <span id="sunting_batal" class="badge badge-danger d-none sunting">Batal</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea id="content" class="form-control" name="isi_post"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card card-primary">
                        <form role="form">
                            <div class="card-header">
                                <h6>Kategori</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1">
                                        <label class="form-check-label">Radio</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1" checked="">
                                        <label class="form-check-label" for="radio">Radio checked</label>
                                    </div>
                                </div>
                                <div class="add-btn">
                                    <span class="badge badge-primary">+ Tambah Kategori</span>
                                </div>
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

    $(document).ready(function() {
        $('#judul').on('keyup', function() {
            var link = $(this).val();
            var permalink = "";
            link = link.replace(/&/g, ' dan ');
            link = link.replace(/\//g, ' atau ');
            link = link.replace(/\W+(?!$)/g, '-').toLowerCase();
            link = link.replace(/\W$/, '').toLowerCase();
            permalink = link;
            link = link.length > 20 ? link.substring(0, 25) + '...' + link.substring(link.length, link.length - 10) : link;
            link = baseUrl + link;
            $('#sunting_ok').on('click', function() {
                $('#judul').off('keyup');
            });
            if ($(this).val().length > 0) {
                $('.permalink-group').removeClass('d-none');
                $('#thisPermalink').html(link);
                $('#permalink').val(permalink);
            } else {
                $('.permalink-group').addClass('d-none');
            }

        });
        $('#sunting_batal').on('click', function() {
            $('#thisPermalink').html(baseUrl + $('#thisPermalink').text().split('/').slice(-1)[0]);
            $('#permalink').val($('#thisPermalink').text().split('/').slice(-1)[0]);
            $('#thisPermalink, #sunting').removeClass('d-none');
            $('#baseurl, #permalink, #sunting_ok, #sunting_batal').addClass('d-none');
        });
        $('#sunting').on('click', function() {
            $('#thisPermalink, #sunting').addClass('d-none');
            $('#baseurl, #permalink, #sunting_ok, #sunting_batal').removeClass('d-none');
            $('#baseurl').html(baseUrl);
        });
        $('#permalink').on('keyup', function() {
            var link = $(this).val();
            link = link.replace(/&/g, 'dan');
            link = link.replace(/\//g, 'atau');
            link = link.replace(/\W+/g, '-');
            link = link.replace(/\W+(?!$)/g, '-').toLowerCase();
            $(this).val(link);
        });
        $('#sunting_ok').on('click', function() {
            if ($('#permalink').val().length > 0) {
                $('#thisPermalink, #sunting').removeClass('d-none');
                $('#baseurl, #permalink, #sunting_ok, #sunting_batal').addClass('d-none');
                $('#thisPermalink').html(baseUrl + $('#permalink').val());
            } else {
                return false;
            }
        });
    });
</script>