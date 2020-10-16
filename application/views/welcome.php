<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI | E-Learning SMANSATARA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/welcome/vendor/nucleo/css/nucleo.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/welcome/css/animate.css"); ?>">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?php echo base_url("assets/welcome/css/icomoon.css"); ?>">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="<?php echo base_url("assets/welcome/css/bootstrap.css"); ?>">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url("assets/welcome/css/magnific-popup.css "); ?>">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="<?php echo base_url("assets/welcome/css/flexslider.css "); ?>">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url("assets/welcome/css/owl.carousel.min.css "); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/welcome/css/owl.theme.default.min.css"); ?>">

    <!-- Flaticons  -->
    <link rel="stylesheet" href="<?php echo base_url("assets/welcome/fonts/flaticon/font/flaticon.css"); ?>">

    <!-- Theme style  -->
    <link rel="stylesheet" href="<?php echo base_url("assets/welcome/css/style.css"); ?>">

    <!-- Modernizr JS -->
    <script src="<?php echo base_url("assets/welcome/js/modernizr-2.6.2.min.js"); ?>"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="upper-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5">
                            <p>Selamat Datang di Sistem Informasi E-Learning SMA Negeri 1 Tanjung Raya</p>
                        </div>
                        <div class="col-xs-6 col-md-push-2 text-right">
                            <p>
                                <ul class="colorlib-social-icons">
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                    <li><a href="#"><i class="icon-youtube"></i></a></li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/'); ?>img/logo/logo.png" width="30px">
                            <span class="nav-link-inner--text">SMA NEGERI 1 TANJUNG RAYA</span>
                        </div>
                        <div class="col-md-8 text-right menu-1">
                            <ul>
                                <li class="active"><a href="#">Beranda</a></li>
                                <li class="has-dropdown">
                                    <a href="#">Panduan Penggunaan</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Panduan Pengajar</a></li>
                                        <li><a href="#">Panduan Siswa</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://smansatara-mesuji.mysch.id/">Tentang Kami</a></li>
                                <li class="has-dropdown">
                                    <a href="#"><span>Register</span></a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo base_url('auth/register_pengajar'); ?>">Pengajar</a></li>
                                        <li><a href="<?php echo base_url('auth/register_siswa'); ?>">Siswa</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div id="myalert">
            <?php echo $this->session->flashdata('pesan') ?>
        </div>
        <aside id="colorlib-hero">
            <div class="flexslider">
                <ul class="slides">
                    <li style="background-image: url(<?= base_url('assets/welcome/'); ?>images/slide-1.jpg);">
                        <div class="overlay"></div>
                    </li>
                    <li style="background-image: url(<?= base_url('assets/welcome/'); ?>images/slide-2.jpg);">
                        <div class="overlay"></div>
                    </li>
                    <li style="background-image: url(<?= base_url('assets/welcome/'); ?>images/slide-3.jpg);">
                        <div class="overlay"></div>
                    </li>
                </ul>
            </div>
        </aside>

        <div id="colorlib-intro">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 intro-wrap">
                        <div class="intro-flex">
                            <div class="one-third color-3 animate-box">
                                <img src="<?= base_url('assets/'); ?>img/logo/logo.png" width="50px">
                                <div class="desc">
                                    <h3>Login SI E-Learning</h3>
                                    <hr>
                                    <form raction="<?php echo base_url('auth/login'); ?>" method="post" role="login" class="needs-validation" novalidate="">
                                        <div id="myalert">
                                            <strong><?php echo $this->session->flashdata('pesan') ?></strong>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        </div>
                                        <button name="submit" type="submit" value="login" class="btn btn-success">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="about-desc animate-box">
                            <h2>Selamat Datang di E-Learning SMANSATARA</h2>
                            <p align="justify">Sebagai lembaga pendidikan, SMA Negeri 1 Tanjung Raya tanggap dengan perkembangan teknologi. Dengan dukungan SDM yang di miliki sekolah ini siap untuk berkompetisi dengan sekolah lain dalam pelayanan informasi publik. Teknologi Informasi Web khususnya, menjadi sarana bagi SMA Negeri 1 Tanjung Raya untuk memberi pelayanan informasi secara cepat, jelas, dan akuntable. Dari layanan ini pula, sekolah siap menerima saran dari semua pihak yang akhirnya dapat menjawab Kebutuhan masyarakat.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="colorlib-services">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center animate-box">
                            <div class="services">
                                <span class="icon">
                                    <i class="flaticon-book"></i>
                                </span>
                                <div class="desc">
                                    <h3><u>VISI SMANSATARA</u></h3>
                                    <p>"Berprestasi dan Unggul dalam Ilmu Pengetahuan dan Teknologi, Kreatif, Inovatif, dan Berahklak Mulia yang didasari Iman dan Taqwa"</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center animate-box">
                            <div class="services">
                                <span class="icon">
                                    <i class="flaticon-diploma"></i>
                                </span>
                                <div class="desc">
                                    <h3><u>MISI SMANSATARA</u></h3>
                                    <p align="left">1. &nbsp;Menghasilkan lulusan yang CANTIK (Cerdas, Ahlakul Karimah, Nasional, Taqwa, Iman, Inovatif, dan Kreatif). </p>
                                    <hr>
                                    <p align="left">2. &nbsp;Mewujudkan SMAN 1 Tanjung Raya yang BERSAHABAT (Bersih, Elok, Rindang, Sehat, Aman, Hebat (unggul berprestasi), Amanah, Berkarakter, dan Berwawasan Lingkungan, Akuntable dan Tertib. </p>
                                    <hr>
                                    <p align="left">3. &nbsp;Meningkatkan Kualitas Profesionalisme, Kinerja Guru, dan Staf Tata Usaha. </p>
                                    <hr>
                                    <p align="left">4. &nbsp;Meningkatkan Prestasi Siswa dibidang Kulikuler maupun Ekstrakulikuler. </p>
                                    <hr>
                                    <p align="left">5. &nbsp;Meningkatkan dan Memberikan Pelayanan Pendidikan yang Aktif, Efektif, dan Berkualitas.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer id="colorlib-footer">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>
                            <small class="block">&copy;
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> SI | E-Learning SMANSATARA
                            </small><br>
                        </p>
                    </div>
                </div>
            </footer>
        </div>

        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url("assets/welcome/js/modernizr-2.6.2.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/welcome/js/jquery.min.js"); ?>"></script>
        <!-- jQuery Easing -->
        <script src="<?php echo base_url("assets/welcome/js/jquery.easing.1.3.js"); ?>"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url("assets/welcome/js/bootstrap.min.js"); ?>"></script>
        <!-- Waypoints -->
        <script src="<?php echo base_url("assets/welcome/js/jquery.waypoints.min.js"); ?>"></script>
        <!-- Stellar Parallax -->
        <script src="<?php echo base_url("assets/welcome/js/jquery.stellar.min.js"); ?>"></script>
        <!-- Flexslider -->
        <script src="<?php echo base_url("assets/welcome/js/jquery.flexslider-min.js"); ?>"></script>
        <!-- Owl carousel -->
        <script src="<?php echo base_url("assets/welcome/js/owl.carousel.min.js"); ?>"></script>
        <!-- Magnific Popup -->
        <script src="<?php echo base_url("assets/welcome/js/jquery.magnific-popup.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/welcome/js/magnific-popup-options.js"); ?>"></script>
        <!-- Counters -->
        <script src="<?php echo base_url("assets/welcome/js/jquery.countTo.js"); ?>"></script>
        <!-- Main -->
        <script src="<?php echo base_url("assets/welcome/js/main.js"); ?>"></script>

</body>

</html>