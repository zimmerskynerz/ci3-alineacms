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
        height: 186px;
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
<br>
<div class="container">
    <h3>
        <center>
            <?= $config_home['Jdl_laman'] ?>
        </center>
    </h3>
    <P>
        <center>
            Berikut ini adalah doa yang berkaitan dengan <?= $slug ?>
        </center>
    </p>
    <div class="row">
        <?php
        if ($produk_laris == null) : ?>
            <P>
                <center>
                    Mohon Maaf Doa Belum Ada Yang Cocok!
                </center>
            </p>
            <div class="headding-border"></div>
            <?php
        else :
            foreach ($produk_laris as $Produk_laris) : ?>
                <div class="col-sm-4">
                    <div class="contact-address">
                        <h3><?= $Produk_laris->nm_produk ?></h3>
                        <img src="<?= base_url() ?>assets/produk/img/<?= $Produk_laris->foto ?>" alt="Avatar" class="avatar">
                        <br>
                        <br>
                        <a class="btn btn-style" href="<?= base_url() ?>produk/<?= $Produk_laris->slug_produk ?>">Selanjutnya</a>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        <?php
        endif;
        ?>
    </div>
</div>