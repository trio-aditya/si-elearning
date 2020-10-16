<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Detail Pengumuman</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Pengumuman</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Detail Pengumuman</strong>
                </li>
            </ol>
        </div>
    </div><br>

    <div class="col-lg-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Pengumuman</h6>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="card-body">
                        <label><strong>Judul</strong></label><br>
                        <label><strong>Isi Pengumuman</strong></label><br>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="card-body">
                        <label>: <?php echo $pengumuman['judul']; ?></label><br>
                        <label>: <?php echo $pengumuman['konten']; ?></label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>