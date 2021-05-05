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
            <?= $config_home['Desc_1'] ?>
        </center>
    </p>
    <p>
        <center>
            <?= $config_home['Desc_2'] ?>
        </center>
    </p>
    <div class="row">
        <?php
        foreach ($produk_laris as $Produk_laris) : ?>
            <div class="col-sm-4">
                <div class="contact-address">
                    <h3><?= $Produk_laris->nm_produk ?></h3>
                    <img src="<?= base_url() ?>cms/assets/produk/img/<?= $Produk_laris->foto ?>" alt="Avatar" class="avatar">
                    <br>
                    <br>
                    <a class="btn btn-style" href="<?= base_url() ?>produk/<?= $Produk_laris->slug_produk ?>">Selanjutnya</a>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
<section class="headding-news">
    <div class="container">
        <div class="video-container">
            <iframe width="560" height="315" src="<?= $data_depan['yt_depan'] ?>" allow='autoplay' title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</section>
<!-- Produk Terbaru -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <section class="politics_wrapper">
                <h3 class="category-headding ">ILMU TERBARU</h3>
                <div class="headding-border"></div>
                <div class="row">
                    <div id="content-slide-2" class="owl-carousel">
                        <div class="item">
                            <div class="row">
                                <!-- Produk Pertama -->
                                <div class="col-sm-6 col-md-6">
                                    <div class="home2-post">
                                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                            <div class="post-thumb">
                                                <a href="<?= base_url() ?>produk/<?= $produk_pertama['slug_produk'] ?>">
                                                    <img src="<?= base_url() ?>cms/assets/produk/img/<?= $produk_pertama['foto'] ?>" alt="" class="post">
                                                </a>
                                            </div>
                                            <h3>
                                                <a href="<?= base_url() ?>produk/<?= $produk_pertama['slug_produk'] ?>"><?= $produk_pertama['nm_produk'] ?></a>
                                            </h3>
                                        </div>
                                        <div class="post-title-author-details">
                                            <p>
                                                <?php
                                                $text = htmlspecialchars_decode($produk_pertama['penjelasan']);
                                                echo character_limiter($text, 200);
                                                ?>
                                            </p>
                                            <a class="btn btn-style" href="<?= base_url() ?>produk/<?= $produk_pertama['slug_produk'] ?>">Selanjutnya</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Produk Kedua -->
                                <div class="col-sm-6 col-md-6">
                                    <div class="row rn_block">
                                        <?php
                                        foreach ($data_produk_limit as $Data_produk_limit) : ?>
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <div class="home2-post">
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                        <a href="<?= base_url() ?>produk/<?= $Data_produk_limit->slug_produk ?>">
                                                            <img src="<?= base_url() ?>cms/assets/produk/img/<?= $Data_produk_limit->foto ?>" alt="" class="img-responsive">
                                                        </a>
                                                    </div>
                                                    <div class="post-title-author-details">
                                                        <h5><a href="<?= base_url() ?>produk/<?= $Data_produk_limit->slug_produk ?>" title=""><?= $Data_produk_limit->nm_produk ?></a></h5>
                                                        <a href="<?= base_url() ?>produk/<?= $Data_produk_limit->slug_produk ?>">Selanjutnya...</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="recent_news_inner">
                <h3 class="category-headding ">Ilmu Rekomendasi</h3>
                <div class="headding-border"></div>
                <div class="row">
                    <div id="content-slide" class="owl-carousel">
                        <?php
                        foreach ($data_random as $Data_random) : ?>
                            <div class="item home2-post">
                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                    <div class="post-thumb">
                                        <a href="<?= base_url() ?>produk/<?= $Data_random->slug_produk ?>">
                                            <img src="<?= base_url() ?>cms/assets/produk/img/<?= $Data_random->foto ?>" alt="" class="post2">
                                        </a>
                                    </div>
                                    <div class="post-info meta-info-rn">
                                        <div class="slide">
                                        </div>
                                    </div>
                                </div>
                                <h3>
                                    <a href="<?= base_url() ?>produk/<?= $Data_random->slug_produk ?>" title=""><?= $Data_random->nm_produk ?></a>
                                </h3>
                                <div class="post-title-author-details">
                                    <p>
                                        <?php
                                        $text = htmlspecialchars_decode($Data_random->penjelasan);
                                        echo character_limiter($text, 100);
                                        ?>
                                    </p>
                                    <a class="btn btn-style" href="<?= base_url() ?>produk/<?= $Data_random->slug_produk ?>">Selanjutnya</a>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </section>
            <div class="ads">
                <a href="https://<?= $awconfig_header['link_ads1'] ?>" target="_BLANK"><img src="<?= base_url() ?>cms/assets/setting/<?= $awconfig_header['ads_1'] ?>" class="img-responsive center-block" alt=""></a>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 left-padding">
            <div class="banner-add">
                <span class="add-title">- Advertisement -</span>
                <a href="https://<?= $awconfig_header['link_ads2'] ?>" target="_BLANK"><img src="<?= base_url() ?>cms/assets/setting/<?= $awconfig_header['ads_2'] ?>" class="img-responsive center-block" alt=""></a>
            </div>
            <div class="tab-inner">
                <ul class="tabs">
                    <li><a href="#">POPULAR</a></li>
                    <li><a href="#">REKOMENDASI</a></li>
                </ul>
                <hr>
                <div class="tab_content">
                    <div class="tab-item-inner">
                        <!-- iSI DATA pOST -->
                        <?php
                        foreach ($data_random as $Data_random) : ?>
                            <div class="box-item wow fadeIn" data-wow-duration="1s">
                                <div class="img-thumb">
                                    <a href="<?= base_url() ?>produk/<?= $Data_random->slug_produk ?>" rel="bookmark"><img class="entry-thumb" src="<?= base_url() ?>cms/assets/produk/img/<?= $Data_random->foto ?>" alt="" height="80" width="90"></a>
                                </div>
                                <div class="item-details">
                                    <h6 class="sub-category-title bg-color-2">
                                        <a>POPULER</a>
                                    </h6>
                                    <h3 class="td-module-title">
                                        <a href="<?= base_url() ?>produk/<?= $Data_random->slug_produk ?>" title=""><?= $Data_random->nm_produk ?></a>
                                        <br>
                                        <a>Rp <?= $Data_random->harga ?>,-</a>
                                    </h3>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <!-- DATA POPULER -->
                    <div class="tab-item-inner">
                        <?php
                        foreach ($data_produk_limit as $Data_random) : ?>
                            <div class="box-item wow fadeIn" data-wow-duration="1s">
                                <div class="img-thumb">
                                    <a href="<?= base_url() ?>produk/<?= $Data_random->slug_produk ?>" rel="bookmark"><img class="entry-thumb" src="<?= base_url() ?>cms/assets/produk/img/<?= $Data_random->foto ?>" alt="" height="80" width="90"></a>
                                </div>
                                <div class="item-details">
                                    <h6 class="sub-category-title bg-color-4">
                                        <a>REKOMENDASI</a>
                                    </h6>
                                    <h3 class="td-module-title">
                                        <a href="<?= base_url() ?>produk/<?= $Data_random->slug_produk ?>" title=""><?= $Data_random->nm_produk ?></a>
                                        <br>
                                        <a>Rp <?= $Data_random->harga ?>,-</a>
                                    </h3>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>