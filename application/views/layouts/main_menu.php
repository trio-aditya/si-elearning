<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img class="navbar-brand-img" height="40px" width="40px" alt="..." src="<?php echo base_url("assets/img/logo/logo.png"); ?>">
        </div>
        <div class="sidebar-brand-text mx-3">SMANSATARA</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php if ($this->session->userdata('role_id') == '1') { ?>
        <!-- Nav Item - Dashboard -->
        <li <?= $this->uri->segment(1) == 'home' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>home">
                <i class=" fas fa-home"></i>
                <span>Beranda</span></a>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-users"></i>
                <span>Manajemen User</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url(); ?>sa/user/semua_user">Semua User</a>
                </div>
            </div>
        </li> -->


        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'pengumuman' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>sa/pengumuman">
                <i class="fas fa-bullhorn"></i>
                <span>Pengumuman</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'pengajar' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>sa/pengajar">
                <i class="fas fa-user"></i>
                <span>Data Pengajar</span></a>
        </li>
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'siswa' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>sa/siswa">
                <i class="fas fa-user"></i>
                <span>Data Siswa</span></a>
        </li>
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'matapelajaran' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>sa/matapelajaran">
                <i class=" fas fa-book"></i>
                <span>Kelola Matapelajaran</span></a>
        </li>
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'kelas' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>sa/kelas">
                <i class="fas fa-tasks"></i>
                <span>Kelola Kelas</span></a>
        </li>
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'matapelajaran_kelas' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>sa/matapelajaran_kelas">
                <i class=" fas fa-list-alt"></i>
                <span>Matapelajaran Kelas</span></a>
        </li>
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'jadwal_matapelajaran' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>sa/jadwal_matapelajaran">
                <i class=" fas fa-calendar-check"></i>
                <span>Jadwal Matapelajaran</span></a>
        </li>
    <?php } ?>
    <!-- End Main Menu Admin-->

    <!-- Start Main Menu Pengajar-->
    <?php if ($this->session->userdata('role_id') == '2') { ?>
        <!-- Nav Item - Dashboard -->
        <li <?= $this->uri->segment(1) == 'home' || $this->uri->segment(1) == '' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>home/pengajar">
                <i class=" fas fa-home"></i>
                <span>Beranda</span></a>
        </li>
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'pengumuman' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>sa/pengumuman">
                <i class="fas fa-bullhorn"></i>
                <span>Pengumuman</span>
            </a>
        </li>
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'jadwal_mengajar' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>pengajar/jadwal_mengajar">
                <i class="fas fa-clock"></i>
                <span>Jadwal Mengajar</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'tugas' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>pengajar/tugas">
                <i class="fas fa-list"></i>
                <span>Tugas</span></a>
        </li>
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'materi' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>pengajar/materi">
                <i class=" fas fa-book"></i>
                <span>Materi</span></a>
        </li>
    <?php } ?>
    <!-- End Main Menu Pengajar-->

    <!-- Start Main Menu Siswa-->
    <?php if ($this->session->userdata('role_id') == '3') { ?>
        <!-- Nav Item - Dashboard -->
        <li <?= $this->uri->segment(1) == 'home' || $this->uri->segment(1) == '' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>home/siswa">
                <i class=" fas fa-home"></i>
                <span>Beranda</span></a>
        </li>
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'jadwal_matapelajaran' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>siswa/jadwal_matapelajaran">
                <i class="fas fa-clock"></i>
                <span>Jadwal Mata Pelajaran</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'tugas' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>siswa/tugas">
                <i class="fas fa-list"></i>
                <span>Tugas</span></a>
        </li>
        <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'materi' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
            <a class="nav-link" href="<?php echo base_url(); ?>siswa/materi">
                <i class=" fas fa-book"></i>
                <span>Materi</span></a>
        </li>
    <?php } ?>
    <!-- End Main Menu Siswa-->

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li <?= $this->uri->segment(1) == 'about' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link" href="<?php echo base_url(); ?>about">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>About</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->