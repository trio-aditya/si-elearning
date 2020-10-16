<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Register | E-Learning</title>
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
                        <a href="<?php echo base_url('auth/login'); ?>" class="nav-link">
                            <span class="nav-link-inner--text">Login</span>
                        </a>
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
                <div class="col-lg-12 col-md-8">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h2>Register</h2>
                            </div>
                            <hr>
                            <?php echo form_open_multipart('auth/proses_register_pengajar'); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label><strong>NIP</strong></label>
                                    <input name="nip" type="number" placeholder="Masukkan NIP" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><strong>Nama Lengkap</strong></label>
                                    <input name="nama" type="text" placeholder="Masukkan Nama Lengkap" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><strong>Jenis Kelamin</strong></label>
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tempat Lahir</strong></label>
                                    <input name="tempat_lahir" type="text" placeholder="Masukkan Tempat Lahir" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Lahir</strong></label>
                                    <input name="tanggal_lahir" type="date" placeholder="Masukkan Tanggal Lahir" class="form-control">
                                </div>
                                <!--
                <div class="form-group">
                    <label><strong>Mata Pelajaran yang Diampu</strong></label>
                    <select class="form-control" name="matapelajaran_id" id="matapelajaran_id" required>
                        <?php foreach ($matapelajaran as $row) : ?>
                            <option value=" <?php echo $row['id_matapelajaran'] ?>"><?php echo $row['matapelajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>-->
                                <div class="form-group">
                                    <label><strong>Agama</strong></label>
                                    <select class="form-control" name="agama">
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Khonghucu">Khonghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Alamat</strong></label>
                                    <input name="alamat" type="text" placeholder="Masukkan Alamat" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><strong>Foto</strong></label>
                                    <input name="foto" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><strong>Username</strong></label>
                                    <input name="username" type="text" placeholder="Masukkan Username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>Password</strong></label>
                                    <input name="password" type="text" value="smansatarajaya" placeholder="Masukkan Password" class="form-control" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="#" class="text-light"><small>Forgot password?</small></a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#" class="text-light"><small>Login</small></a>
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
                        &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">E-Learning SMANSATARA</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">Tentang Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="<?php echo base_url("asset/vendor/jquery/dist/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("asset/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"); ?>"></script>
    <script src="<?php echo base_url("asset/vendor/js-cookie/js.cookie.js"); ?>"></script>
    <script src="<?php echo base_url("asset/vendor/jquery.scrollbar/jquery.scrollbar.min.js"); ?>"></script>
    <script src="<?php echo base_url("asset/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"); ?>"></script>
    <!-- Argon JS -->
    <script src="<?php echo base_url("asset/js/argon.js?v=1.2.0"); ?>"></script>
</body>

</html>