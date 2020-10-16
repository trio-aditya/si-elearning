<script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>

<!-- TimeCircles-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/timecircles/inc/TimeCircles.js'); ?>"></script>
<link href="<?php echo base_url('assets/timecircles/inc/TimeCircles.css'); ?>" rel="stylesheet">

<?php
error_reporting(0);
?>

<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Tugas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url('home/siswa'); ?>">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url('siswa/tugas'); ?>">Tugas</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong><?= $tugas['matapelajaran'] ?></strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Detail Tugas</strong>
                </li>
            </ol>
        </div>
    </div><br>

    <div class="col-lg-12">
        <a class="btn btn-success btn-sm" href="<?php echo base_url() ?>siswa/tugas/detail_data" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</a><br><br>
        <!-- Collapsable Card Example -->
        <div>
            <?php $start_date = strtotime($tugas['waktu_terbit']); ?>
            <?php $end_date = strtotime($tugas['waktu_tutup']); ?>
            <?php $todays_date = strtotime(date("Y-m-d")); ?>
            <?php if ($todays_date >= $start_date && $todays_date  <= $end_date) { ?>
                <div class="alert alert-success alert-dismissable">
                    <li> Tugas <?php echo $tugas['matapelajaran']; ?>: <strong><?php echo date("d F Y", strtotime($tugas['waktu_terbit'])) ?></strong> s.d. <strong><?php echo date("d F Y", strtotime($tugas['waktu_tutup'])) ?></strong> untuk siswa kelas <?php echo $tugas['kelas'] ?> sedang berlangsung</li>
                </div>
            <?php } else { ?>
                <?php if ($todays_date < $start_date) { ?>
                    <div class="alert alert-warning alert-dismissable">
                        <li> Jadwal Pengisian Tugas <?php echo $tugas['matapelajaran']; ?>: <strong><?php echo date("d F Y", strtotime($tugas['waktu_terbit'])) ?></strong> s.d. <strong><?php echo date("d F Y", strtotime($tugas['waktu_tutup'])) ?></strong> untuk siswa kelas <?php echo $tugas['kelas'] ?></li>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <li> Jadwal Pengisian Tugas <?php echo $tugas['matapelajaran']; ?>: <strong><?php echo date("d F Y", strtotime($tugas['waktu_terbit'])) ?></strong> s.d. <strong><?php echo date("d F Y", strtotime($tugas['waktu_tutup'])) ?></strong> untuk siswa kelas <?php echo $tugas['kelas'] ?> sudah berakhir</li>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <div class="card shadow mb-4">
            <?php echo $this->session->flashdata('pesan'); ?>
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Detail Tugas</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="row">
                    <div class="col-sm-2.5">
                        <div class="card-body">
                            <label><strong>Judul Tugas</strong></label><br>
                            <label><strong>Mata Pelajaran</strong></label><br>
                            <label><strong>Kelas</strong></label><br>
                            <label><strong>Waktu Pengisian</strong></label><br>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="card-body">
                            <label>: <?php echo $tugas['judul_tugas']; ?></label><br>
                            <label>: <?php echo $tugas['matapelajaran']; ?></label><br>
                            <label>: <?php echo $tugas['kelas']; ?></label><br>
                            <label>: <?= date('d-m-Y', strtotime($tugas['waktu_terbit'])); ?> s/d <?= date('d-m-Y', strtotime($tugas['waktu_tutup'])); ?></label><br>
                        </div>
                    </div>
                    <!--
                    <div class="col-sm-5">
                        <div class="card-body">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Waktu Pengisian</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 example" data-date="<?php echo $tugas['waktu_tutup'] ?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                -->
                </div>
            </div>
        </div>
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tugas <?= $tugas['matapelajaran'] ?> - Kelas <?= $tugas['kelas'] ?></h6>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <b><u>Tugas:</u></b><br>
                        <b><?= $tugas['judul_tugas']; ?></b><br>
                        <label><?= $tugas['tugas']; ?> </label><br>
                        <hr>
                        <b><u>Jawaban:</u></b><br>
                        <b><?= $jawab['jawaban']; ?></b><br>
                        <hr>
                        <?php if ($todays_date >= $start_date && $todays_date  <= $end_date) : ?>
                            <?php if ($count['total'] == 0) { ?>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#isijawaban">Isi Jawaban</button>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#isijawabanfile">Upload Jawaban</button>
                            <?php } else { ?>
                                <form action="<?php echo base_url() ?>siswa/tugas/hapus_jawaban/<?php echo $jawab['id_jawaban']; ?>" method="post">
                                    <input type="hidden" name="id_tugas" value="<?php echo  $tugas['id_tugas']; ?>">
                                    <button class="btn btn-danger float-right" type="submit">Hapus Jawaban</button>
                                </form>
                                <?php if ($value['tipe_tugas'] == 'file') { ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editjawabanfile<?php echo $jawab['id_jawaban']; ?>">Edit Jawaban</button>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editjawaban<?php echo $jawab['id_jawaban']; ?>">Edit Jawaban</button>
                                <?php } ?>
                            <?php } ?>
                        <?php endif; ?>
                        <?php if ($count['total'] != 0) { ?>
                            <?php if ($value['tipe_tugas'] == 'file') : ?>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#lihatnilai<?php echo $tugas['id_tugas']; ?>">Lihat Nilai</button>
                            <?php endif; ?>
                            <?php if ($value['tipe_tugas'] != 'file') : ?>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#lihatjawaban">Lihat Jawaban</button>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#lihatnilai<?php echo $nilai['tugas_id']; ?>">Lihat Nilai</button>
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".example").TimeCircles({
            width: 0.05
        });
    </script>


    <!-- Start of Modal Isi Jawaban Tertulis-->
    <div class="modal fade" id="isijawaban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Isi Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('siswa/tugas/isi_tugas'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Jawaban</strong></label>
                        <input type="hidden" class="form-control" name="tugas_id" value="<?php echo $tugas['id_tugas']; ?>"></input>
                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $this->session->userdata('id_user'); ?>"></input>
                        <input type="hidden" class="form-control" name="siswa_id" value="<?php echo $data_user['id_siswa']; ?>"></input>
                        <textarea class="ckeditor" id="ckeditor" name="jawaban"></textarea>
                        <input type="hidden" class="form-control" name="tipe_jawaban" value="tertulis"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="" method="post">
                        <input type="hidden" name="id_tugas" value="<?php echo  $tugas['id_tugas']; ?>">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Isi Jawaban Tertulis -->

    <!-- Start of Modal Isi Jawaban File -->
    <div class="modal fade" id="isijawabanfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('siswa/tugas/isi_tugas_file'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Upload Tugas</strong></label>
                        <input type="hidden" class="form-control" name="tugas_id" value="<?php echo $tugas['id_tugas']; ?>"></input>
                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $this->session->userdata('id_user'); ?>"></input>
                        <input type="hidden" class="form-control" name="siswa_id" value="<?php echo $data_user['id_siswa']; ?>"></input>
                        <input type="file" class="form-control-file" name="jawaban"></input>
                        <input type="hidden" class="form-control" name="tipe_jawaban" value="file"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="" method="post">
                        <input type="hidden" name="id_tugas" value="<?php echo  $tugas['id_tugas']; ?>">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Isi Jawaban File-->

    <!-- Start of Modal Lihat Jawaban -->
    <div class="modal fade" id="lihatjawaban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('siswa/tugas/lihat_jawaban'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Jawaban</strong></label>
                        <input type="hidden" class="form-control" name="tugas_id" value="<?php echo $tugas['id_tugas']; ?>"></input>
                        <textarea class="ckeditor" id="ckedtor" name="jawaban"><?php echo  $jawab['jawaban'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Lihat Jawaban -->

    <!-- Start of Modal Lihat Nilai -->
    <div class="modal fade" id="lihatnilai<?php echo $nilai['tugas_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="id_tugas" value="<?php echo $tugas['id_tugas']; ?>"></input>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Nilai</strong></label>
                        <input type="text" class="form-control" value="<?php echo $jawab['nilai']; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Lihat Nilai -->

    <!-- Start of Modal Edit Jawaban -->
    <div class="modal fade" id="editjawaban<?php echo $jawab['id_jawaban']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('siswa/tugas/edit_jawaban'); ?>
                <input type="hidden" name="id_jawaban" value="<?php echo $jawab['id_jawaban']; ?>"></input>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Jawaban</strong></label>
                        <textarea class="ckeditor" id="ckedtor" name="jawaban"><?php echo  $jawab['jawaban'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="" method="post">
                        <input type="hidden" name="id_tugas" value="<?php echo  $tugas['id_tugas']; ?>">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Edit Jawaban -->

    <!-- Start of Modal Edit Jawaban File-->
    <div class="modal fade" id="editjawabanfile<?php echo $jawab['id_jawaban']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('siswa/tugas/proses_jawaban_file'); ?>
                <input type="hidden" name="id_jawaban" value="<?php echo $jawab['id_jawaban']; ?>"></input>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Jawaban</strong></label>
                        <input type="file" class="form-control-file" name="jawaban"></input>
                        <p><?php echo  $jawab['jawaban']; ?></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="" method="post">
                        <input type="hidden" name="id_tugas" value="<?php echo  $tugas['id_tugas']; ?>">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Edit Jawaban File-->