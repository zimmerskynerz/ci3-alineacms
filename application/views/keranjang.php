<style>
    .avatar {
        vertical-align: middle;
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }

    .post {
        vertical-align: middle;
        width: 314px;
        height: 100%;
    }

    .post2 {
        width: 314px;
        height: 186px;
    }

    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
<script type="text/javascript" src="<?= $config_midtrans['snap_js'] ?>" data-client-key="<?= $config_midtrans['client_key'] ?>"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<br>
<br>
<section class="article-post-inner">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="articale-list">
                    <div class="card-header">
                        <h3 class="category-headding ">Total Mahar : Rp <?= $hrg_ttl['jml_harga'] ?>,-</h3>
                    </div>
                    <div class="headding-border"></div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Kode Doa</th>
                                <th style="text-align: center;">Nama Doa</th>
                                <th style="text-align: center;">Harga Mahar</th>
                                <th style="text-align: center; width: 15px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($keranjang as $Keranjang) : ?>
                                <tr>
                                    <td style="text-align: center;"><?= $Keranjang->id_produk ?></td>
                                    <td><?= $Keranjang->nm_produk ?></td>
                                    <td style="text-align: center;">Rp <?= $Keranjang->harga ?>,-</td>
                                    <td style="text-align: center;">
                                        <a id="keranjang_detail" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_keranjang" data-ip_pelanggan="<?= $Keranjang->ip_pelanggan ?>" data-browser="<?= $Keranjang->browser ?>" data-osos="<?= $Keranjang->OS ?>" data-id_produk="<?= $Keranjang->id_produk ?>" data-nm_produk="<?= $Keranjang->nm_produk ?>" data-harga="<?= $Keranjang->harga ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    <?php if ($jml_keranjang > 0) : ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayar_keranjang">
                            Bayar
                        </button><br><br>
                    <?php endif; ?>
                    <div class="headding-border"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="bayar_keranjang" tabindex="-1" role="dialog" aria-labelledby="bayar_keranjangTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Bayar Semua Doa?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="payment-form" method="post" action="<?= site_url() ?>produk/snap/bayarkeranjang">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="example-email">Nama Depan</label>
                        <input type="text" id="ip_address" name="ip_address" value="<?= $ip_address ?>" class="form-control" placeholder="Masukkan Nama Lengkap" style="display: none;">
                        <input type="text" id="browser" name="browser" value="<?= $browser ?>" class="form-control" placeholder="Masukkan Nama Lengkap" style="display: none;">
                        <input type="text" id="os" name="os" value="<?= $os ?>" class="form-control" placeholder="Masukkan Nama Lengkap" style="display: none;">
                        <input type="text" id="nm_pelanggan" name="nm_pelanggan" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="example-email">Email Aktif</label>
                        <input type="email" id="email_aktif" name="email_aktif" class="form-control" placeholder="Masukkan Email Aktif" required>
                        <input type="text" name="result_type" id="result-type" style="display: none;">
                        <input type="text" name="result_data" id="result-data" style="display: none;">
                    </div>
                    <div class="form-group mb-3">
                        <label for="example-email">No Handphone/WhatsApp</label>
                        <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Masukkan Nomor Handphone/WhatApps" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="pay-button" data-amount="<?= $hrg_ttl['jml_harga'] ?>" name="minta_ijin">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Detail Kategori -->
<div class="modal fade" id="detail_keranjang" tabindex="-1" role="dialog" aria-labelledby="detail_keranjangTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail_keranjangTitle">
                    Detail Doa!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('produk/snap/hapuskeranjang'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Kode Produk</label>
                    <input type="text" id="id_produk" readonly name="id_produk" name="example-email" class="form-control" placeholder="Masukkan Email Pengguna" required>
                    <input type="text" id="ip_pelanggan" style="display: none;" name="ip_pelanggan" name="example-email" class="form-control" placeholder="Masukkan Email Pengguna" required>
                    <input type="text" id="browser" style="display: none;" name="browser" name="example-email" class="form-control" placeholder="Masukkan Email Pengguna" required>
                    <input type="text" id="osos" style="display: none;" name="osos" name="example-email" class="form-control" placeholder="Masukkan Email Pengguna" required>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Nama Produk</label>
                    <input type="text" id="nm_produk" readonly name="nm_produk" name="example-email" class="form-control" placeholder="Masukkan Username Pengguna" required>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Harga Produk</label>
                    <input type="text" id="harga" name="harga" readonly name="example-email" class="form-control" placeholder="Masukkan Nama Pengguna" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="hapus_keranjang" name="hapus_keranjang" class="btn btn-danger">Hapus</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Form Ajax Kategori Juri -->
<script type="text/javascript">
    $(document).on("click", "#keranjang_detail", function() {
        var id_produk = $(this).data('id_produk');
        var nm_produk = $(this).data('nm_produk');
        var harga = $(this).data('harga');
        var ip_pelanggan = $(this).data('ip_pelanggan');
        var browser = $(this).data('browser');
        var osos = $(this).data('osos');
        $(".modal-body#detail_body #id_produk").val(id_produk);
        $(".modal-body#detail_body #nm_produk").val(nm_produk);
        $(".modal-body#detail_body #harga").val(harga);
        $(".modal-body#detail_body #ip_pelanggan").val(ip_pelanggan);
        $(".modal-body#detail_body #browser").val(browser);
        $(".modal-body#detail_body #osos").val(osos);
    })
</script>
<script src="<?= base_url('assets/admin/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script type="text/javascript">
    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            if (regexp && regexp.constructor != RegExp) {
                regexp = new RegExp(regexp);
            } else if (regexp.global) regexp.lastIndex = 0;
            return this.optional(element) || regexp.test(value);
        }
    );

    $.validator.setDefaults({
        submitHandler: function() {
            var ip_address = $("#ip_address").val();
            var browser = $("#browser").val();
            var os = $("#os").val();
            var nm_pelanggan = $("#nm_pelanggan").val();
            var email_aktif = $("#email_aktif").val();
            var no_hp = $("#no_hp").val();
            var amount = $(this).data('amount');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>produk/snap/tokenkeranjang',
                data: {
                    ip_address: ip_address,
                    browser: browser,
                    os: os,
                    nm_pelanggan: nm_pelanggan,
                    email_aktif: email_aktif,
                    no_hp: no_hp,
                    hrg_ttl: amount
                },
                cache: false,
                success: function(data) {
                    $('#bayar_keranjang').modal('hide');

                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                    }

                    snap.pay(data, {
                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                            $('.se-pre-con').show();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                            $('.se-pre-con').show();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                            $('.se-pre-con').show();
                        }
                    });
                }
            });
        }
    })

    $('#payment-form').validate({
        rules: {
            email_aktif: {
                required: true,
                email: true,
                regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
            },
            no_hp: {
                required: true,
                number: true
            },
            nm_pelanggan: {
                required: true
            }
        },
        messages: {
            email_aktif: {
                required: "Email wajib diisi.",
                email: "Mohon isi email dengan benar.",
                regex: "Mohon isi email dengan benar."
            },
            no_hp: {
                required: "No HP wajib diisi.",
                number: "No HP hanya diisi angka."
            },
            nm_pelanggan: "Nama wajib diisi."
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback text-danger');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid text-danger');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid text-danger');
        }
    });
</script>