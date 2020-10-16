<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Materi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="<?php echo base_url('siswa/materi'); ?>">Materi</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Detail Materi</strong>
                </li>
            </ol>
        </div>
    </div><br>

    <div class="col-lg-12">
        <a class="btn btn-success btn-sm" href="<?php echo base_url() ?>siswa/materi" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</a><br><br>
        <!-- Basic Card Example -->
        <div class="table-responsive">
            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10%">No.</th>
                        <th>Informasi Materi</th>
                        <th width="10%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($materi as $value) : ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><b><?= $value['judul_materi']; ?></b> <br>
                                <div class="badge badge-primary text-wrap" style="width: 4rem;">
                                    <?= $value['tipe_materi']; ?>
                                </div> / <?= $value['matapelajaran']; ?> / Kelas <?= $value['kelas']; ?> <br>
                                <b>Isi Materi:</b> <?= substr($value['materi'], 0, 150) . '...'; ?>
                                <hr>
                            </td>
                            <td>
                                <?php if ($value['tipe_materi'] == 'file') : ?>
                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url() ?>siswa/materi/download/<?php echo $value['materi']; ?>" role="button"> <i class="fa fa-download" aria-hidden="true"></i></a>
                                <?php endif; ?>
                                <?php if ($value['tipe_materi'] == 'tertulis') : ?>
                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url() ?>siswa/materi/detail/<?php echo $value['id_materi']; ?>" role="button"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th width="10%">No.</th>
                        <th>Informasi Materi</th>
                        <th width="10%"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


</div>