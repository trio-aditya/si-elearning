<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Tugas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Tugas</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Detail Tugas</strong>
                </li>
            </ol>
        </div>
    </div><br>

    <div class="col-lg-12">
        <a class="btn btn-success btn-sm" href="<?php echo base_url() ?>siswa/tugas" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</a><br><br>
        <!-- Basic Card Example -->
        <div class="table-responsive">
            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10%">No.</th>
                        <th>Informasi Tugas</th>
                        <th>Tipe Tugas</th>
                        <th width="10%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($tugas as $value) : ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><b><?= $value['judul_tugas']; ?></b> <br>
                                <?= $value['matapelajaran']; ?> / Kelas <?= $value['kelas']; ?> <br>
                                <b>Waktu Pengerjaan: </b> <?= date('d-m-Y', strtotime($value['waktu_terbit'])); ?> s/d <?= date('d-m-Y', strtotime($value['waktu_tutup'])); ?><br>
                                <b>Isi Tugas:</b> <?= substr($value['tugas'], 0, 150) . '...'; ?>
                                <hr>
                            </td>
                            <td>
                                <div class="badge badge-primary text-wrap" style="width: 6rem;">
                                    <?= $value['tipe_tugas']; ?>
                                </div>
                            </td>
                            <td>
                                <?php if ($value['tipe_tugas'] == 'file') : ?>
                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url() ?>siswa/tugas/download/<?php echo $value['tugas']; ?>" role="button"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    <a class="btn btn-success btn-sm" href="<?php echo base_url() ?>siswa/tugas/detail/<?php echo $value['id_tugas']; ?>" role="button"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                <?php endif; ?>
                                <?php if ($value['tipe_tugas'] == 'tertulis' || $value['tipe_tugas'] == 'essay') : ?>
                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url() ?>siswa/tugas/detail/<?php echo $value['id_tugas']; ?>" role="button"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th width="10%">No.</th>
                        <th>Informasi Tugas</th>
                        <th>Tipe Tugas</th>
                        <th width="10%"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


</div>