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
                            <a href="<?php echo base_url('home/siswa'); ?>">Beranda</a>
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
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Jadwal Mata Pelajaran
                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == '' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>siswa/jadwal_matapelajaran" role="button">Senin</a>
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'selasa' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>siswa/jadwal_matapelajaran/selasa" role="button">Selasa</a>
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'rabu' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>siswa/jadwal_matapelajaran/rabu" role="button">Rabu</a>
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'kamis' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>siswa/jadwal_matapelajaran/kamis" role="button">Kamis</a>
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'jumat' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>siswa/jadwal_matapelajaran/jumat" role="button">Jumat</a>
                                <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'sabtu' ? 'class="btn btn-primary btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>siswa/jadwal_matapelajaran/sabtu" role="button">Sabtu</a>
                            </div>
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <?php if ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == '') : ?>
                                    <label><strong><u>Senin</u></strong></label>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_senin as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        </tfoot>
                                    </table>

                                <?php elseif ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'selasa') : ?>
                                    <label><strong><u>Selasa</u></strong></label>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_selasa as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        </tfoot>
                                    </table>

                                <?php elseif ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'rabu') : ?>
                                    <label><strong><u>Rabu</u></strong></label>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_rabu as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        </tfoot>
                                    </table>

                                <?php elseif ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'kamis') : ?>
                                    <label><strong><u>Kamis</u></strong></label>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_kamis as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        </tfoot>
                                    </table>

                                <?php elseif ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'jumat') : ?>
                                    <label><strong><u>Jum'at</u></strong></label>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_jumat as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        </tfoot>
                                    </table>

                                <?php elseif ($this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'sabtu') : ?>
                                    <label><strong><u>Sabtu</u></strong></label>
                                    <table cellspacing="0">
                                        <tbody>
                                            <?php foreach ($matpel_sabtu as $value) : ?>
                                                <tr>
                                                    <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                    <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                    <td width="20%"><?= $value['kelas']; ?></td>
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