<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Login | E-Learning</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/logo/logo.png"); ?>">
    <!-- Fonts -->
    <link rel=" stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/vendor/nucleo/css/nucleo.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"); ?>">
    <!-- Argon CSS -->
    <link rel=" stylesheet" type="text/css" href="<?php echo base_url("assets/css/argon.css?v=1.2.0"); ?>">
</head>

<body class=" bg-default">
    <!-- Navbar -->
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url('assets/'); ?>img/logo/logo.png">
                <span class="nav-link-inner--text">SMA NEGERI 1 TANJUNG RAYA</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="dashboard.html" class="nav-link">
                            <span class="nav-link-inner--text">Beranda</span>
                        </a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a href="dashboard.html" class="nav-link">
                            <span class="nav-link-inner--text">Informasi</span>
                        </a>
                    </li>
                   
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kategori
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">IPA</a>
                            <a class="dropdown-item" href="#">IPS</a>
                        </div>
                    </li>
                    -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Panduan Penggunaan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Panduan Pengajar</a>
                            <a class="dropdown-item" href="#">Panduan Siswa</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Register
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url('auth/register_pengajar'); ?>">Pengajar</a>
                            <a class="dropdown-item" href="<?php echo base_url('auth/register_siswa'); ?>">Siswa</a>
                        </div>
                    </li>
                </ul>
                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="Like us on Facebook">
                            <i class="fab fa-facebook-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
                            <i class="fab fa-instagram"></i>
                            <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Twitter">
                            <i class="fab fa-twitter-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Twitter</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Selamat Datang!</h1>
                            <p class="text-lead text-white">Sistem Informasi E-Learning SMA Negeri 1 Tanjung Raya</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h2>Login</h2>
                            </div>
                            <form raction="<?php echo base_url('auth/login'); ?>" method="post" role="login" class="needs-validation" novalidate="">
                                <div id="myalert">
                                    <?php echo $this->session->flashdata('pesan') ?>
                                    <?php echo $this->session->flashdata('alert', true) ?>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" name="username" placeholder="Masukkan Username" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" name="password" placeholder="Password" type="password">
                                    </div>
                                </div>
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                    <label class="custom-control-label" for=" customCheckLogin">
                                        <span class="text-muted">Remember me</span>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button name="submit" type="submit" value="login" class="btn btn-primary my-4">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="#" class="text-light"><small>Forgot password?</small></a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#" class="text-light"><small>Create new account</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">E-Learning SMANSATARA</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">Tentang Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="<?php echo base_url("assets/vendor/jquery/dist/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendor/js-cookie/js.cookie.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"); ?>"></script>
    <!-- Argon JS -->
    <script src="<?php echo base_url("assets/js/argon.js?v=1.2.0"); ?>"></script>
</body>

</html>