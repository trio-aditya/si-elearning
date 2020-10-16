<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css"); ?>" rel="stylesheet">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Matapelajaran Kelas</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url('home'); ?>">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Matapelajaran Kelas</strong>
                        </li>
                    </ol>
                </div>
            </div><br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Matapelajaran Kelas
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data
                        </button>
                </div>
                <div class="card-body">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="20%">No.</th>
                                    <th>Kelas</th>
                                    <th>Matapelajaran</th>
                                    <th width="30%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($matapelajaran_kelas as $value) : ?>
                                    <tr>
                                        <th scope="row"><?= $no ?></th>
                                        <td><?= $value['kelas']; ?></td>
                                        <td><?= $value['matapelajaran']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal<?php echo $value['id_matapelajaran_kelas']; ?>"> Edit</button>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>sa/matapelajaran_kelas/hapus_data/<?php echo $value['id_matapelajaran_kelas']; ?>" role="button"> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="20%">No.</th>
                                    <th>Kelas</th>
                                    <th>Matapelajaran</th>
                                    <th width="30%">Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

<!-- Start of Modal Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/matapelajaran_kelas/proses_tambah_data'); ?>
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
                    <label><strong>Kelas</strong></label><br>
                    <div class="form-check form-check-inline">
                        <?php foreach ($kelas as $row) : ?>
                            <input class="form-check-input" type="checkbox" name="kelas_id[]" id="kelas_id" value="<?php echo $row['id_kelas']; ?>"><?php echo $row['kelas']; ?> &nbsp;
                        <?php endforeach; ?>
                    </div>
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
<!-- End of Modal Tambah Data -->

<!-- Start of Modal Edit Data -->
<?php $no = 0; ?>
<?php foreach ($matapelajaran_kelas as $value) : $no++ ?>
    <div class="modal fade" id="editmodal<?php echo $value['id_matapelajaran_kelas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('sa/matapelajaran_kelas/proses_edit_data'); ?>
                <input type="hidden" name="id_matapelajaran_kelas" value="<?php echo $value['id_matapelajaran_kelas']; ?>"></input>
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
                        <label><strong>Kelas</strong></label>
                        <select class="form-control" name="kelas_id" id="kelas_id">
                            <option value="">- Kelas -</option>
                            <?php foreach ($kelas as $row) : ?>
                                <option value=" <?php echo $row['id_kelas']; ?>"><?php echo $row['kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
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