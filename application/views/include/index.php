<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $awconfig_header['jdl_web'] ?> - <?= $awconfig_header['desc_web'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/setting/<?= $awconfig_header['icon_web'] ?>" />

    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('themes/news_paper/') ?>css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url('themes/news_paper/') ?>css/jquery.mCustomScrollbar.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('themes/news_paper/') ?>owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('themes/news_paper/') ?>owl-carousel/owl.theme.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('themes/news_paper/') ?>owl-carousel/owl.transitions.css" />

    <link rel="stylesheet" type="text/css" href="<?= base_url('themes/news_paper/') ?>css/RYPP.css" />

    <link rel="stylesheet" href="<?= base_url('themes/news_paper/') ?>css/jquery-ui.css">

    <link rel="stylesheet" href="<?= base_url('themes/news_paper/') ?>css/animate.min.css">

    <link rel="stylesheet" href="<?= base_url('themes/news_paper/') ?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('themes/news_paper/') ?>css/Pe-icon-7-stroke.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('themes/news_paper/') ?>css/flaticon.css" />

    <link rel="stylesheet" href="<?= base_url('themes/news_paper/') ?>css/style.css">
    <s async src='/cdn-cgi/bm/cv/669835187/api.js'></s>
    <style>
        .badge-notif {
            position: relative;
        }

        .badge-notif[data-badge]:after {
            content: attr(data-badge);
            position: absolute;
            top: -10px;
            right: -10px;
            font-size: .7em;
            background: #e53935;
            color: white;
            width: 18px;
            height: 18px;
            text-align: center;
            line-height: 18px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="se-pre-con"></div>
    <header>
        <div class="mobile-menu-area navbar-fixed-top hidden-sm hidden-md hidden-lg">
            <nav class="mobile-menu" id="mobile-menu">
                <div class="sidebar-nav">
                    <ul class="nav side-menu">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category02" data-toggle="dropdown">UTAMA <span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/keselamatan">KESELAMATAN</a></li>
                                <li><a href="<?= base_url() ?>category/kanuragan">KANURAGAN</a></li>
                                <li><a href="<?= base_url() ?>category/pengobatan-fisi">PENGOBATAN FISIK</a></li>
                                <li><a href="<?= base_url() ?>category/pengasihan">PENGASIHAN</a></li>
                                <li><a href="<?= base_url() ?>category/pengobatan-jiwa">PENGOBATAN JIWA</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category03" data-toggle="dropdown">KEKAYAAN <span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/kesuksesan">KESUKSESAN</a></li>
                                <li><a href="<?= base_url() ?>category/kewibawaan">KEWIBAWAAN</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category03" data-toggle="dropdown">KARIR & JABATAN <span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/alam-ghaib">ALAM GHAIB</a></li>
                                <li><a href="<?= base_url() ?>category/kecerdasan">KECERDASAN</a></li>
                                <li><a href="<?= base_url() ?>category/pelet">PELET</a></li>
                                <li><a href="<?= base_url() ?>category/melawan-kejahatan">MELAWAN KEJAHATAN</a></li>
                                <li><a href="<?= base_url() ?>category/ragam-aktivitas">RAGAM AKTIVITAS</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category03" data-toggle="dropdown">SARANA PENGASIHAN <span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/melawan-jin-ghaib">MELAWAN JIN & GHAIB</a></li>
                                <li><a href="<?= base_url() ?>category/kebahagiaan">KEBAHAGIAAN</a></li>
                                <li><a href="<?= base_url() ?>category/anti-santet">ANTI SANTET</a></li>
                                <li><a href="<?= base_url() ?>category/anak-anak">ANAK-ANAK</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category03" data-toggle="dropdown">PENGLARISAN <span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/pengobatan-sihir">PENGOBATAN SIHIR S</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category03" data-toggle="dropdown">RUMAH TANGGA <span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/percintaan">PERCINTAAn</a></li>
                                <li><a href="<?= base_url() ?>category/ilmu-hitam">ILMU HITAM</a></li>
                                <li><a href="<?= base_url() ?>category/remaja">REMAJA</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url() ?>berita" class="category08">BERITA</a></li>
                        <li><a href="<?= base_url() ?>login" class="category08">LOGIN</a></li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="top_header_icon">
                    <span class="top_header_icon_wrap">
                        <a target="_blank" href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                    </span>
                    <span class="top_header_icon_wrap">
                        <a target="_blank" href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                    </span>
                    <span class="top_header_icon_wrap">
                        <a target="_blank" href="#" title="Google"><i class="fa fa-google-plus"></i></a>
                    </span>
                    <span class="top_header_icon_wrap">
                        <a target="_blank" href="#" title="Vimeo"><i class="fa fa-vimeo"></i></a>
                    </span>
                    <span class="top_header_icon_wrap">
                        <a target="_blank" href="#" title="Pintereset"><i class="fa fa-pinterest-p"></i></a>
                    </span>
                </div>
                <div id="showLeft" class="nav-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="top_banner_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-sm-4">
                        <div class="header-logo">
                            <a href="<?= base_url() ?>">
                                <img class="td-retina-data img-responsive" src="<?= base_url() ?>assets/setting/<?= $awconfig_header['logo_1'] ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-8 col-md-8 col-sm-8 hidden-xs">
                        <div class="header-banner">
                            <a href="https://<?= $awconfig_header['link_ads1'] ?>" target="_BLANK"><img class="td-retina img-responsive" src="<?= base_url() ?>assets/setting/<?= $awconfig_header['ads_1'] ?>" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container hidden-xs">
            <nav class="navbar">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category02" data-toggle="dropdown">UTAMA<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/keselamatan">KESELAMATAN</a></li>
                                <li><a href="<?= base_url() ?>category/kanuragan">KANURAGAN</a></li>
                                <li><a href="<?= base_url() ?>category/pengobatan-fisi">PENGOBATAN FISIK</a></li>
                                <li><a href="<?= base_url() ?>category/pengasihan">PENGASIHAN</a></li>
                                <li><a href="<?= base_url() ?>category/pengobatan-jiwa">PENGOBATAN JIWA</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category03" data-toggle="dropdown">KEKAYAAN<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/kesuksesan">KESUKSESAN</a></li>
                                <li><a href="<?= base_url() ?>category/kewibawaan">KEWIBAWAAN</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category03" data-toggle="dropdown">KARIR & JABATAN<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/alam-ghaib">ALAM GHAIB</a></li>
                                <li><a href="<?= base_url() ?>category/kecerdasan">KECERDASAN</a></li>
                                <li><a href="<?= base_url() ?>category/pelet">PELET</a></li>
                                <li><a href="<?= base_url() ?>category/melawan-kejahatan">MELAWAN KEJAHATAN</a></li>
                                <li><a href="<?= base_url() ?>category/ragam-aktivitas">RAGAM AKTIVITAS</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category03" data-toggle="dropdown">PENGASIHAN<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/melawan-jin-ghaib">MELAWAN JIN & GHAIB</a></li>
                                <li><a href="<?= base_url() ?>category/kebahagiaan">KEBAHAGIAAN</a></li>
                                <li><a href="<?= base_url() ?>category/anti-santet">ANTI SANTET</a></li>
                                <li><a href="<?= base_url() ?>category/anak-anak">ANAK-ANAK</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category03" data-toggle="dropdown">PENGLARISAN<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/pengobatan-sihir">PENGOBATAN SIHIR S</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle category03" data-toggle="dropdown">RUMAH TANGGA<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu menu-slide">
                                <li><a href="<?= base_url() ?>category/percintaan">PERCINTAAn</a></li>
                                <li><a href="<?= base_url() ?>category/ilmu-hitam">ILMU HITAM</a></li>
                                <li><a href="<?= base_url() ?>category/remaja">REMAJA</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url() ?>berita" class="category08">BLOG</a></li>
                        <li><a href="<?= base_url() ?>login" class="category08">LOGIN</a></li>
                        <li><a href="<?= base_url() ?>cart" class="category08"><i class="fa fa-cart-arrow-down badge-notif" data-badge="<?= $jml_keranjang ?>"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <?php $this->load->view($halaman) ?>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="footer-box footer-logo-address">

                        <img src="<?= base_url() ?>assets/setting/<?= $awconfig_header['logo_1'] ?>" class="img-responsive" alt="">
                        <address>
                            NUR WIJAYA | Sunggingan 2/3 No 163B, Kec Kota, Kudus, Jawa Tengah.
                            <br> WhatsApp : <a href="https://wa.me/62816577880">+62816577880</a>
                            <br> Email: <a href="mailto:cskibaguswijaya@gmail.com">cskibaguswijaya@gmail.com</a>
                        </address>
                    </div>

                </div>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="footer-box">
                                <h3 class="category-headding">Linked Me</h3>
                                <div class="headding-border bg-color-4"></div>
                                <ul>
                                    <li><i class="fa fa-dot-circle-o"></i><a href="https://kibaguswijaya.com/" target="_BLANK">Kibagus Wijaya</a></li>
                                    <li><i class="fa fa-dot-circle-o"></i><a href="https://kibaguswijaya.com/alamat-kami" target="_BLANK">Alamat & Kontak</a></li>
                                    <li><i class="fa fa-dot-circle-o"></i><a href="https://kibaguswijaya.com/kumpulan-video-ki-bagus-wijaya.html" target="_BLANK">Galery Video</a></li>
                                    <li><i class="fa fa-dot-circle-o"></i><a href="https://kibaguswijaya.com/category/blog" target="_BLANK">Berita</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="footer-box">
                                <h3 class="category-headding">KATEGORI PRODUK</h3>
                                <div class="headding-border bg-color-5"></div>
                                <ul>
                                    <?php
                                    foreach ($data_kategori as $Data_kategori) : ?>
                                        <li><i class="fa fa-dot-circle-o"></i><a href="<?= base_url() ?>category/<?= $Data_kategori->slug ?>"><?= $Data_kategori->nm_kategori ?></a></li>
                                    <?php endforeach;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-box">

                        <h3 class="category-headding ">GOOGLE MAPS</h3>
                        <div class="headding-border bg-color-2"></div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.660835667119!2d110.8309248146251!3d-6.811044895077261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70dadb05dc7d77%3A0x884d48de4cff696f!2sGetah%20Katilayu!5e0!3m2!1sid!2sid!4v1618383144707!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <div class="sub-footer">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p><a href="https://kibaguswijaya.com/" class="color-1">Copyright <?= date('Y') ?></a> Theme | All right Reserved Ki Bagus Wijaya</p>
                    <div class="social">
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa  fa-facebook"></i> </a></li>
                            <li><a href="#" class="instagram"><i class="fa  fa-instagram"></i></a></li>
                            <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>js/jquery.min.js"></script>

    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>js/metisMenu.min.js"></script>

    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>js/wow.min.js"></script>

    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>js/jquery.newsTicker.js"></script>

    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>js/classie.js"></script>

    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>owl-carousel/owl.carousel.js"></script>

    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>js/RYPP.js"></script>

    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>js/jquery-ui.js"></script>

    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>js/form-classie.js"></script>

    <script type="text/javascript" src="<?= base_url('themes/news_paper/') ?>js/custom.js"></script>
</body>

</html>