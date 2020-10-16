<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css"); ?>" rel="stylesheet">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Jadwal Mengajar</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url('home/pengajar'); ?>">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Jadwal Mengajar</strong>
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
                        <h6 class="m-0 font-weight-bold text-primary">Jadwal Mengajar</h6>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <label><strong><u>Senin</u></strong></label> &nbsp; &nbsp; &nbsp;
                                <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalsenin">Tambah</button><br>
                                <table cellspacing="0">
                                    <tbody>
                                        <?php foreach ($mengajar_senin as $value) : ?>
                                            <tr>
                                                <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                <td width="20%"><?= $value['kelas']; ?></td>
                                                <td width="20%">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_mengajar']; ?>">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>pengajar/jadwal_mengajar/hapus_data/<?php echo $value['id_jadwal_mengajar']; ?>" role="button">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </tfoot>
                                </table>
                                <hr>
                                <label><strong><u>Selasa</u></strong></label> &nbsp; &nbsp; &nbsp;
                                <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalselasa">Tambah</button><br>
                                <table cellspacing="0">
                                    <tbody>
                                        <?php foreach ($mengajar_selasa as $value) : ?>
                                            <tr>
                                                <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                <td width="20%"><?= $value['kelas']; ?></td>
                                                <td width="20%">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_mengajar']; ?>">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>pengajar/jadwal_mengajar/hapus_data/<?php echo $value['id_jadwal_mengajar']; ?>" role="button">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </tfoot>
                                </table>
                                <hr>
                                <label><strong><u>Rabu</u></strong></label> &nbsp; &nbsp; &nbsp;
                                <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalrabu">Tambah</button><br>
                                <table cellspacing="0">
                                    <tbody>
                                        <?php foreach ($mengajar_rabu as $value) : ?>
                                            <tr>
                                                <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                <td width="20%"><?= $value['kelas']; ?></td>
                                                <td width="20%">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_mengajar']; ?>">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>pengajar/jadwal_mengajar/hapus_data/<?php echo $value['id_jadwal_mengajar']; ?>" role="button"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </tfoot>
                                </table>
                                <hr>
                                <label><strong><u>Kamis</u></strong></label> &nbsp; &nbsp; &nbsp;
                                <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalkamis">Tambah</button><br>
                                <table cellspacing="0">
                                    <tbody>
                                        <?php foreach ($mengajar_kamis as $value) : ?>
                                            <tr>
                                                <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                <td width="20%"><?= $value['kelas']; ?></td>
                                                <td width="20%">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_mengajar']; ?>">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>pengajar/jadwal_mengajar/hapus_data/<?php echo $value['id_jadwal_mengajar']; ?>" role="button">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </tfoot>
                                </table>
                                <hr>
                                <label><strong><u>Jum'at</u></strong></label> &nbsp; &nbsp; &nbsp;
                                <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modaljumat">Tambah</button><br>
                                <table cellspacing="0">
                                    <tbody>
                                        <?php foreach ($mengajar_jumat as $value) : ?>
                                            <tr>
                                                <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                <td width="20%"><?= $value['kelas']; ?></td>
                                                <td width="20%">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_mengajar']; ?>">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>pengajar/jadwal_mengajar/hapus_data/<?php echo $value['id_jadwal_mengajar']; ?>" role="button">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </tfoot>
                                </table>
                                <hr>
                                <label><strong><u>Sabtu</u></strong></label> &nbsp; &nbsp; &nbsp;
                                <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalsabtu">Tambah</button><br>
                                <table cellspacing="0">
                                    <tbody>
                                        <?php foreach ($mengajar_sabtu as $value) : ?>
                                            <tr>
                                                <td width="30%"><?= $value['jam_mulai']; ?> - <?= $value['jam_selesai']; ?></td>
                                                <td width="35%"><?= $value['matapelajaran']; ?></td>
                                                <td width="20%"><?= $value['kelas']; ?></td>
                                                <td width="20%">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_jadwal_mengajar']; ?>">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>pengajar/jadwal_mengajar/hapus_data/<?php echo $value['id_jadwal_mengajar']; ?>" role="button">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </tfoot>
                                </table>
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
            <?php echo form_open_multipart('pengajar/jadwal_mengajar/proses_tambah_data'); ?>
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
            <?php echo form_open_multipart('pengajar/jadwal_mengajar/proses_tambah_data'); ?>
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
            <?php echo form_open_multipart('pengajar/jadwal_mengajar/proses_tambah_data'); ?>
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
            <?php echo form_open_multipart('pengajar/jadwal_mengajar/proses_tambah_data'); ?>
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
            <?php echo form_open_multipart('pengajar/jadwal_mengajar/proses_tambah_data'); ?>
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
            <?php echo form_open_multipart('pengajar/jadwal_mengajar/proses_tambah_data'); ?>
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
<?php foreach ($jadwal_mengajar as $value) : $no++ ?>
    <div class="modal fade" id="editmodal<?php echo $value['id_jadwal_mengajar']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('pengajar/jadwal_mengajar/proses_edit_data'); ?>
                <input type="hidden" name="id_jadwal_mengajar" value="<?php echo $value['id_jadwal_mengajar']; ?>"></input>
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