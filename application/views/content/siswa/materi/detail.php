<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Materi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url('home/siswa'); ?>">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="<?php echo base_url('siswa/materi'); ?>">Materi</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong><?= $materi['matapelajaran'] ?></strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Detail Materi</strong>
                </li>
            </ol>
        </div>
    </div><br>

    <div class="col-lg-12">
        <a class="btn btn-success btn-sm" href="<?php echo base_url() ?>siswa/materi/detail_data" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</a><br><br>
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Materi <?= $materi['matapelajaran'] ?> - Kelas <?= $materi['kelas'] ?></h6>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <label><?= $materi['materi']; ?> </label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>