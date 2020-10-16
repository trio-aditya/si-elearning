<!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
        </div>

        <!-- Start Beranda Admin -->
        <!-- Content Row -->
        <div class="row">
            <?php if ($this->session->userdata('role_id') == '1') { ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">User</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengajar</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pengajar ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Siswa</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $siswa ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Kelas</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kelas ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-university fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Matapelajaran</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $matapelajaran ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <?php } ?>
    </div>
    <!-- End Beranda Admin -->

    <!-- Start Beranda Pengajar -->
    <!-- Content Row -->
    <?php if ($this->session->userdata('role_id') == '2') { ?>
        <div class="row">
            <!-- Border Left Utilities -->
            <div class="col-md-12">
                <div class="card mb-4 py-3 border-left-primary">
                    <div class="card-body">
                        Selamat Datang di E-Learning SMA Negeri 1 Tanjung Raya
                    </div>
                </div>
            </div>
            <?php foreach ($pengumuman as $value) : ?>
                <div class="col-lg-12">
                    <!-- Dropdown Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"><strong><?= $value['judul']; ?> | Dibuat Oleh:<strong> <?= $value['username']; ?></strong></strong></h6>

                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Aksi :</div>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>sa/pengumuman/detail/<?php echo $value['id_pengumuman']; ?>">Lihat Pengumumuman</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <?= substr($value['konten'], 0, 250) . '...'; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php } ?>
    <!-- End Beranda Pengajar-->

    <!-- Start Beranda Siswa -->
    <!-- Content Row -->
    <?php if ($this->session->userdata('role_id') == '3') { ?>
        <div class="row">
            <!-- Border Left Utilities -->
            <div class="col-md-12">
                <div class="card mb-4 py-3 border-left-primary">
                    <div class="card-body">
                        Selamat Datang di E-Learning SMA Negeri 1 Tanjung Raya
                    </div>
                </div>
            </div>
            <?php foreach ($pengumuman as $value) : ?>
                <div class="col-lg-12">
                    <!-- Dropdown Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"><strong><?= $value['judul']; ?> | Dibuat Oleh:<strong> <?= $value['username']; ?></strong></strong></h6>

                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Aksi :</div>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>sa/pengumuman/detail/<?php echo $value['id_pengumuman']; ?>">Lihat Pengumumuman</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <?= substr($value['konten'], 0, 250) . '...'; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php } ?>
    <!-- End Beranda Siswa-->

</div>
<!-- End of Main Content -->