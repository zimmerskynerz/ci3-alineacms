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
            <div class="col-sm-8">
                <div class="articale-list">
                    <h3 class="category-headding ">Kode Ilmu : <?= $detail_produk['id_produk'] ?></h3>
                    <div class="headding-border"></div>
                    <div class="post-style2 wow fadeIn" data-wow-duration="1s">
                        <img src="<?= base_url() ?>assets/produk/img/<?= $detail_produk['foto'] ?>" alt="" class="post">
                        <br>
                        <button type="button" class="btn btn-style" data-toggle="modal" data-target="#keranjang">Keranjang </button>
                        <a href=""> </a>
                        <button type="button" class="btn btn-style" data-toggle="modal" data-target="#beli_langsung"> Beli Langsung</button>
                        <div class="post-style2-detail">
                            <h3><?= $detail_produk['nm_produk'] ?></h3>
                            <div class="date">
                                <ul>
                                    <li><a title="" href="https://kibaguswijaya.com/"><span>Ki Bagus Wijaya</span></a> --</li>
                                    <li><a title="">Oct 12, 2020</a> --</li>
                                    <li><a title=""><span>275 Pelanggan</span></a></li>
                                </ul>
                            </div>
                            <p>
                                <?= htmlspecialchars_decode($detail_produk['penjelasan']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 left-padding">
                <div class="banner-add">
                    <span class="add-title">- Advertisement -</span>
                    <a href="https://<?= $awconfig_header['link_ads2'] ?>" target="_BLANK"><img src="<?= base_url() ?>assets/setting/<?= $awconfig_header['ads_2'] ?>" class="img-responsive center-block" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="keranjang" tabindex="-1" role="dialog" aria-labelledby="beli_langsungTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Tambah Ke Keranjang?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= site_url() ?>produk/snap/tambahkeranjang">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="example-email">Kode Doa</label>
                        <input type="text" id="id_produk" name="id_produk" value="<?= $detail_produk['id_produk'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap" readonly>
                        <input type="text" id="slug" name="slug" value="<?= $detail_produk['slug_produk'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap" style="display: none;">
                        <input type="text" id="ip_address" name="ip_address" value="<?= $ip_address ?>" class="form-control" placeholder="Masukkan Nama Lengkap" style="display: none;">
                        <input type="text" id="os" name="os" value="<?= $os ?>" class="form-control" placeholder="Masukkan Nama Lengkap" style="display: none;">
                        <input type="text" id="browser" name="browser" value="<?= $browser ?>" class="form-control" placeholder="Masukkan Nama Lengkap" style="display: none;">
                    </div>
                    <div class="form-group mb-3">
                        <label for="example-email">Nama Doa</label>
                        <input type="text" id="nm_produk" name="nm_produk" value="<?= $detail_produk['nm_produk'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="example-email">Harga Mahar Doa</label>
                        <input type="text" id="harga" name="harga" value="<?= $detail_produk['harga'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="tambah_keranjang" name="tambah_keranjang">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="beli_langsung" tabindex="-1" role="dialog" aria-labelledby="beli_langsungTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Beli Doa Sekarang?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="payment-form" method="post" action="<?= site_url() ?>produk/snap/bayarlangsung">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="example-email">Nama Depan</label>
                        <input type="text" id="id_produk" name="id_produk" value="<?= $detail_produk['id_produk'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap" style="display: none;">
                        <input type="text" id="nm_produk" name="nm_produk" value="<?= $detail_produk['nm_produk'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap" style="display: none;">
                        <input type="text" id="harga" name="harga" value="<?= $detail_produk['harga'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap" style="display: none;">
                        <input type="text" id="ip_address" name="ip_address" value="<?= $ip_address ?>" class="form-control" placeholder="Masukkan Nama Lengkap" style="display: none;">
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
                    <button type="submit" class="btn btn-primary" id="pay-button" name="minta_ijin">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
            var id_produk = $("#id_produk").val();
            var nm_produk = $("#nm_produk").val();
            var harga = $("#harga").val();
            var nm_pelanggan = $("#nm_pelanggan").val();
            var email_aktif = $("#email_aktif").val();
            var no_hp = $("#no_hp").val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>produk/snap/token',
                data: {
                    id_produk: id_produk,
                    nm_produk: nm_produk,
                    harga: harga,
                    nm_pelanggan: nm_pelanggan,
                    email_aktif: email_aktif,
                    no_hp: no_hp
                },
                cache: false,
                success: function(data) {
                    $("#beli_langsung .close").click()

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
    });
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