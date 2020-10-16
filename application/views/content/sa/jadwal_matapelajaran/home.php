<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Jadwal Mata Pelajaran</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url('home'); ?>">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Jadwal Mata Pelajaran</strong>
                        </li>
                    </ol>
                </div>
            </div><br>
            <!-- DataTales Example -->
            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <?php echo $this->session->flashdata('pesan'); ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Jadwal Mata Pelajaran
                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == '' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>sa/jadwal_matapelajaran" role="button">Senin</a>
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'selasa' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>sa/jadwal_matapelajaran/selasa" role="button">Selasa</a>
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'rabu' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>sa/jadwal_matapelajaran/rabu" role="button">Rabu</a>
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'kamis' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>sa/jadwal_matapelajaran/kamis" role="button">Kamis</a>
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'jumat' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>sa/jadwal_matapelajaran/jumat" role="button">Jumat</a>
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'sabtu' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>sa/jadwal_matapelajaran/sabtu" role="button">Sabtu</a>
                            </div>
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <?php if ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == '') : ?>
                                    <label><strong><u>Senin</u></strong></label> &nbsp; &nbsp; &nbsp;
                                    <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalsenin">Tambah</button><br>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_senin as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
                                                    <td width="20%">
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_matapelajaran']; ?>">Edit</button>
                                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>sa/jadwal_matapelajaran/hapus_data/<?php echo $value['id_jadwal_matapelajaran']; ?>" role="button">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        </tfoot>
                                    </table>

                                <?php elseif ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'selasa') : ?>
                                    <label><strong><u>Selasa</u></strong></label> &nbsp; &nbsp; &nbsp;
                                    <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalselasa">Tambah</button><br>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_selasa as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
                                                    <td width="20%">
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_matapelajaran']; ?>">Edit</button>
                                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>sa/jadwal_matapelajaran/hapus_data/<?php echo $value['id_jadwal_matapelajaran']; ?>" role="button">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        </tfoot>
                                    </table>

                                <?php elseif ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'rabu') : ?>
                                    <label><strong><u>Rabu</u></strong></label> &nbsp; &nbsp; &nbsp;
                                    <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalrabu">Tambah</button><br>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_rabu as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
                                                    <td width="20%">
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_matapelajaran']; ?>">Edit</button>
                                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>sa/jadwal_matapelajaran/hapus_data/<?php echo $value['id_jadwal_matapelajaran']; ?>" role="button">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        </tfoot>
                                    </table>

                                <?php elseif ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'kamis') : ?>
                                    <label><strong><u>Kamis</u></strong></label> &nbsp; &nbsp; &nbsp;
                                    <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalkamis">Tambah</button><br>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_kamis as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
                                                    <td width="20%">
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_matapelajaran']; ?>">Edit</button>
                                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>sa/jadwal_matapelajaran/hapus_data/<?php echo $value['id_jadwal_matapelajaran']; ?>" role="button">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        </tfoot>
                                    </table>

                                <?php elseif ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'jumat') : ?>
                                    <label><strong><u>Jum'at</u></strong></label> &nbsp; &nbsp; &nbsp;
                                    <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modaljumat">Tambah</button><br>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_jumat as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
                                                    <td width="20%">
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_matapelajaran']; ?>">Edit</button>
                                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>sa/jadwal_matapelajaran/hapus_data/<?php echo $value['id_jadwal_matapelajaran']; ?>" role="button">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        </tfoot>
                                    </table>

                                <?php elseif ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'sabtu') : ?>
                                    <label><strong><u>Sabtu</u></strong></label> &nbsp; &nbsp; &nbsp;
                                    <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalsabtu">Tambah</button><br>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_sabtu as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
                                                    <td width="20%">
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_matapelajaran']; ?>">Edit</button>
                                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>sa/jadwal_matapelajaran/hapus_data/<?php echo $value['id_jadwal_matapelajaran']; ?>" role="button">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        </tfoot>
                                    </table>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

<!-- Start of Modal Tambah Data Senin-->
<div class="modal fade" id="modalsenin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/jadwal_matapelajaran/proses_tambah_data'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Kelas</strong></label>
                    <select class="form-control" name="kelas_id" id="kelas_id">
                        <option value="">- Kelas -</option>
                        <?php foreach ($kelas as $row) : ?>
                            <option value=" <?php echo $row['id_kelas']; ?>"><?php echo $row['kelas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Mata Pelajaran</strong></label>
                    <select class="form-control" name="matapelajaran_id" id="matapelajaran_id">
                        <option value="">- Mata Pelajaran -</option>
                        <?php foreach ($matapelajaran as $row) : ?>
                            <option value=" <?php echo $row['id_matapelajaran'] ?>"><?php echo $row['matapelajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Mulai</strong></label>
                    <input type="hidden" name="hari" value="senin" class="form-control">
                    <input type="text" name="jam_mulai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 08:30</p>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Selesai</strong></label>
                    <input type="text" name="jam_selesai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 09:30</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Data Senin-->

<!-- Start of Modal Tambah Data Selasa-->
<div class="modal fade" id="modalselasa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/jadwal_matapelajaran/proses_tambah_data'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Kelas</strong></label>
                    <select class="form-control" name="kelas_id" id="kelas_id">
                        <option value="">- Kelas -</option>
                        <?php foreach ($kelas as $row) : ?>
                            <option value=" <?php echo $row['id_kelas']; ?>"><?php echo $row['kelas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Mata Pelajaran</strong></label>
                    <select class="form-control" name="matapelajaran_id" id="matapelajaran_id">
                        <option value="">- Mata Pelajaran -</option>
                        <?php foreach ($matapelajaran as $row) : ?>
                            <option value=" <?php echo $row['id_matapelajaran'] ?>"><?php echo $row['matapelajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Mulai</strong></label>
                    <input type="hidden" name="hari" value="selasa" class="form-control">
                    <input type="text" name="jam_mulai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 08:30</p>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Selesai</strong></label>
                    <input type="text" name="jam_selesai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 09:30</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Data Selasa-->

<!-- Start of Modal Tambah Data Rabu-->
<div class="modal fade" id="modalrabu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/jadwal_matapelajaran/proses_tambah_data'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Kelas</strong></label>
                    <select class="form-control" name="kelas_id" id="kelas_id">
                        <option value="">- Kelas -</option>
                        <?php foreach ($kelas as $row) : ?>
                            <option value=" <?php echo $row['id_kelas']; ?>"><?php echo $row['kelas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Mata Pelajaran</strong></label>
                    <select class="form-control" name="matapelajaran_id" id="matapelajaran_id">
                        <option value="">- Mata Pelajaran -</option>
                        <?php foreach ($matapelajaran as $row) : ?>
                            <option value=" <?php echo $row['id_matapelajaran'] ?>"><?php echo $row['matapelajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Mulai</strong></label>
                    <input type="hidden" name="hari" value="rabu" class="form-control">
                    <input type="text" name="jam_mulai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 08:30</p>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Selesai</strong></label>
                    <input type="text" name="jam_selesai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 09:30</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Data Rabu-->

<!-- Start of Modal Tambah Data Kamis-->
<div class="modal fade" id="modalkamis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/jadwal_matapelajaran/proses_tambah_data'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Kelas</strong></label>
                    <select class="form-control" name="kelas_id" id="kelas_id">
                        <option value="">- Kelas -</option>
                        <?php foreach ($kelas as $row) : ?>
                            <option value=" <?php echo $row['id_kelas']; ?>"><?php echo $row['kelas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Mata Pelajaran</strong></label>
                    <select class="form-control" name="matapelajaran_id" id="matapelajaran_id">
                        <option value="">- Mata Pelajaran -</option>
                        <?php foreach ($matapelajaran as $row) : ?>
                            <option value=" <?php echo $row['id_matapelajaran'] ?>"><?php echo $row['matapelajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Mulai</strong></label>
                    <input type="hidden" name="hari" value="kamis" class="form-control">
                    <input type="text" name="jam_mulai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 08:30</p>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Selesai</strong></label>
                    <input type="text" name="jam_selesai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 09:30</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Data Kamis-->

<!-- Start of Modal Tambah Data Jum'at-->
<div class="modal fade" id="modaljumat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/jadwal_matapelajaran/proses_tambah_data'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Kelas</strong></label>
                    <select class="form-control" name="kelas_id" id="kelas_id">
                        <option value="">- Kelas -</option>
                        <?php foreach ($kelas as $row) : ?>
                            <option value=" <?php echo $row['id_kelas']; ?>"><?php echo $row['kelas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Mata Pelajaran</strong></label>
                    <select class="form-control" name="matapelajaran_id" id="matapelajaran_id">
                        <option value="">- Mata Pelajaran -</option>
                        <?php foreach ($matapelajaran as $row) : ?>
                            <option value=" <?php echo $row['id_matapelajaran'] ?>"><?php echo $row['matapelajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Mulai</strong></label>
                    <input type="hidden" name="hari" value="jumat" class="form-control">
                    <input type="text" name="jam_mulai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 08:30</p>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Selesai</strong></label>
                    <input type="text" name="jam_selesai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 09:30</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Data Jum'at-->

<!-- Start of Modal Tambah Data Sabtu-->
<div class="modal fade" id="modalsabtu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/jadwal_matapelajaran/proses_tambah_data'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Kelas</strong></label>
                    <select class="form-control" name="kelas_id" id="kelas_id">
                        <option value="">- Kelas -</option>
                        <?php foreach ($kelas as $row) : ?>
                            <option value=" <?php echo $row['id_kelas']; ?>"><?php echo $row['kelas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Mata Pelajaran</strong></label>
                    <select class="form-control" name="matapelajaran_id" id="matapelajaran_id">
                        <option value="">- Mata Pelajaran -</option>
                        <?php foreach ($matapelajaran as $row) : ?>
                            <option value=" <?php echo $row['id_matapelajaran'] ?>"><?php echo $row['matapelajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Mulai</strong></label>
                    <input type="hidden" name="hari" value="sabtu" class="form-control">
                    <input type="text" name="jam_mulai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 08:30</p>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Jam Selesai</strong></label>
                    <input type="text" name="jam_selesai" placeholder="hh:mm" class="form-control" required>
                    <p class="font-italic">Contoh : 09:30</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Data Sabtu-->

<!-- Start of Modal Edit Data -->
<?php $no = 0; ?>
<?php foreach ($jadwal_matapelajaran as $value) : $no++ ?>
    <div class="modal fade" id="editmodal<?php echo $value['id_jadwal_matapelajaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('sa/jadwal_matapelajaran/proses_edit_data'); ?>
                <input type="hidden" name="id_jadwal_matapelajaran" value="<?php echo $value['id_jadwal_matapelajaran']; ?>"></input>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Kelas</strong></label>
                        <select class="form-control" name="kelas_id" id="kelas_id">
                            <option value="">- Kelas -</option>
                            <?php foreach ($kelas as $row) : ?>
                                <option value=" <?php echo $row['id_kelas']; ?>"><?php echo $row['kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Mata Pelajaran</strong></label>
                        <select class="form-control" name="matapelajaran_id" id="matapelajaran_id">
                            <option value="">- Mata Pelajaran -</option>
                            <?php foreach ($matapelajaran as $row) : ?>
                                <option value=" <?php echo $row['id_matapelajaran'] ?>"><?php echo $row['matapelajaran']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Jam Mulai</strong></label>
                        <input type="text" name="jam_mulai" placeholder="hh:mm" class="form-control" value="<?php echo $value['jam_mulai']; ?>" required>
                        <p class="font-italic">Contoh : 08:30</p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Jam Selesai</strong></label>
                        <input type="text" name="jam_selesai" placeholder="hh:mm" class="form-control" value="<?php echo $value['jam_selesai']; ?>" required>
                        <p class="font-italic">Contoh : 09:30</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- End of Modal Edit Data -->