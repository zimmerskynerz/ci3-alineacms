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
                    </div>
                    <div class="headding-border"></div>
                    <form method="post" action="<?= site_url() ?>tracking">
                        <div class="form-group mb-3">
                            <label for="example-email">Masukkan Kode Transaksi</label>
                            <input type="number" id="kode_transaksi" name="kode_transaksi" class="form-control" placeholder="20210202190XXX" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="cari_transaksi" name="cari_transaksi">Lihat</button>
                        <br><br>
                    </form>
                    <div class="headding-border"></div>
                    <?php if ($data_nota != 'Tidak Ada') : ?>
                        <?php if ($data_nota['status_transaksi'] == 201) : ?>
                            <center>
                                <h3>Mohon maaf, anda belum menyelesaikan pembayaran, silahkan untuk mengikuti intruksi pembayaran dibawah ini.</h3>
                            </center>
                            <center>
                                <a href="<?= $data_nota['pdf_url'] ?>" rel="noopener noreferrer" target="_blank"><img src="https://www.fastpay.co.id/blog/wp-content/uploads/2020/04/Download-Now-Button-PNG-File.png" alt="download" style="width:200px"></a>
                            </center>
                        <?php else : ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Kode Doa</th>
                                        <th style="text-align: center;">Nama Doa</th>
                                        <th style="text-align: center;">Harga Mahar</th>
                                        <th style="text-align: center; width: 15px;">Link Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data_doa as $Keranjang) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $Keranjang->id_produk ?></td>
                                            <td><?= $Keranjang->nm_produk ?></td>
                                            <td style="text-align: center;">Rp <?= $Keranjang->harga ?>,-</td>
                                            <td style="text-align: center;"><a href="<?= $Keranjang->link_produk ?>" target="_BLANK">download</a></td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                        <div class="headding-border"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>