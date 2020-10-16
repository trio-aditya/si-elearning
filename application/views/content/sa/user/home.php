<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css"); ?>" rel="stylesheet">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>User</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Manajemen User</strong>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Semua User</strong>
                        </li>
                    </ol>
                </div>
            </div><br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Semua User
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
                                    <th align="center" width="5%">No.</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Password</th>
                                    <th>Masuk</th>
                                    <th align="center" width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($user as $value) : ?>
                                    <tr>
                                        <th scope="row"><?= $no ?></th>
                                        <td><?= $value['username']; ?></td>
                                        <td><?= $value['role']; ?></td>
                                        <td><?= base64_decode($value['session']); ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($value['masuk']));   ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $value['id_user']; ?>"><i class="fa fa-eye" aria-hidden="true"></i> Edit</button>
                                            <a class="btn btn-danger" href="<?php echo base_url() ?>sa/user/hapus_data/<?php echo $value['id_user']; ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th align="center" width="5%">No.</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Password</th>
                                    <th>Masuk</th>
                                    <th align="center" width="20%">Aksi</th>
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
            <?php echo form_open_multipart('sa/user/proses_tambah_data'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role_id" id="role_id">
                        <option value="">- Pilih Role -</option>
                        <?php foreach ($role as $rl) : ?>
                            <option value=" <?php echo $rl['id_role']; ?>"><?php echo $rl['role']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control">
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
<?php foreach ($user as $value) : $no++ ?>
    <div class="modal fade" id="editmodal<?php echo $value['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('sa/user/proses_edit_data'); ?>
                <input type="hidden" name="id_user" value="<?php echo $value['id_user']; ?>"></input>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role_id" id="role_id">
                            <option value="">- Pilih Role -</option>
                            <?php foreach ($role as $rl) : ?>
                                <option value=" <?php echo $rl['id_role']; ?>"><?php echo $rl['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $value['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" value="<?= base64_decode($value['session']); ?>">
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