<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Pengajar</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="<?php echo base_url() ?>sa/pengajar">Data Pengajar</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Profil User</strong>
                </li>
            </ol>
        </div>
    </div><br>

    <div class="col-lg-12">
        <a class="btn btn-success btn-sm" href="<?php echo base_url() ?>sa/pengajar" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</a><br><br>
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profil User
                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodalstatus">Edit Status</button>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal">Edit Profil</button>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodalfoto">Edit Foto</button>
                    </div>
            </div>
            <div class="row">&nbsp;&nbsp;
                <div class="col-sm-3">&nbsp;
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img style="max-height: 200px; max-width: 200px;" src="<?php echo base_url('assets/img/user.png'); ?>" class="rounded" alt="...">
                                <!-- <img style="max-height: 200px; max-width: 200px;" src="<?php echo base_url('assets/upload/pengajar/' . $pengajar['foto']); ?>" class="rounded" alt="...">
                                -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card-body">
                        <label><strong>NIP</strong></label><br>
                        <label><strong>Nama Lengkap</strong></label><br>
                        <label><strong>Jenis Kelamin</strong></label><br>
                        <label><strong>Tempat Lahir</strong></label><br>
                        <label><strong>Tanggal Lahir</strong></label><br>
                        <label><strong>Agama</strong></label><br>
                        <label><strong>Alamat</strong></label><br>
                        <label><strong>Status</strong></label><br>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-body">
                        <label>: <?php echo $pengajar['nip']; ?></label><br>
                        <label>: <?php echo $pengajar['nama']; ?></label><br>
                        <?php if ($pengajar['jenis_kelamin'] == '1') : ?>
                            <label>: Laki-Laki</label><br>
                        <?php elseif ($pengajar['jenis_kelamin'] == '2') : ?>
                            <label>: Perempuan</label><br>
                        <?php endif; ?>
                        <label>: <?php echo $pengajar['tempat_lahir']; ?></label><br>
                        <label>: <?php echo date('d-m-Y', strtotime($pengajar['tanggal_lahir'])); ?></label><br>
                        <label>: <?php echo $pengajar['agama']; ?></label><br>
                        <label>: <?php echo $pengajar['alamat']; ?></label><br>
                        <?php if ($pengajar['status'] == '0') : ?>
                            <label><strong>: Pending</strong></label>
                        <?php elseif ($pengajar['status'] == '1') : ?>
                            <label><strong>: Aktif</strong></label>
                        <?php endif; ?></label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5 inline">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Akun Login
                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodaluser">Edit</button>
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card-body">
                        <label><strong>Username</strong></label><br>
                        <label><strong>Password</strong></label><br>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-body">
                        <label>: <?php echo $pengajar['username']; ?></label><br>
                        <label>: ***********</label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Start of Modal Edit Profil -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/pengajar/proses_edit_profil'); ?>
            <input type="hidden" name="id_pengajar" value="<?php echo $pengajar['id_pengajar']; ?>"></input>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>NIP</strong></label>
                    <input name="nip" type="number" value="<?php echo $pengajar['nip']; ?>" placeholder=" Masukkan NIP" class="form-control">
                </div>
                <div class="form-group">
                    <label><strong>Nama Lengkap</strong></label>
                    <input name="nama" type="text" value="<?php echo $pengajar['nama']; ?>" placeholder=" Masukkan Nama Lengkap" class="form-control">
                </div>
                <div class="form-group">
                    <label><strong>Jenis Kelamin</strong></label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><strong>Tempat Lahir</strong></label>
                    <input name="tempat_lahir" type="text" value="<?php echo $pengajar['tempat_lahir']; ?>" placeholder=" Masukkan Tempat Lahir" class="form-control">
                </div>
                <div class="form-group">
                    <label><strong>Tanggal Lahir</strong></label>
                    <input name="tanggal_lahir" type="date" value="<?php echo $pengajar['tanggal_lahir']; ?>" placeholder=" Masukkan Tanggal Lahir" class="form-control">
                </div>
                <div class="form-group">
                    <label><strong>Agama</strong></label>
                    <select class="form-control" name="agama">
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><strong>Alamat</strong></label>
                    <input name="alamat" type="text" value="<?php echo $pengajar['alamat']; ?>" placeholder=" Masukkan Alamat" class="form-control">
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
<!-- End of Modal Edit Profil -->

<!-- Start of Modal Edit Foto -->
<div class="modal fade" id="editmodalfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/pengajar/proses_edit_foto'); ?>
            <input type="hidden" name="id_pengajar" value="<?php echo $pengajar['id_pengajar']; ?>"></input>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Foto</strong></label>
                    <input name="foto" type="file" class="form-control">
                    <p><?php echo $pengajar['foto']; ?></p>
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
<!-- End of Modal Edit Foto -->

<!-- Start of Modal Edit Status -->
<div class="modal fade" id="editmodalstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/pengajar/proses_edit_status'); ?>
            <input type="hidden" name="user_id" value="<?php echo $pengajar['user_id']; ?>"></input>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Status</strong></label>
                    <select class="form-control" name="status">
                        <option value="1">Aktif</option>
                        <option value="0">Pending</option>
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
<!-- End of Modal Edit Status -->

<!-- Start of Modal Edit Username & Password -->
<div class="modal fade" id="editmodaluser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/pengajar/proses_edit_user'); ?>
            <input type="hidden" name="user_id" value="<?php echo $pengajar['user_id']; ?>"></input>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Username</strong></label>
                    <input name="username" type="text" value="<?php echo $pengajar['username']; ?>" placeholder="Masukkan Username" class="form-control">
                </div>
                <div class="form-group">
                    <label><strong>Password</strong></label>
                    <input name="password" type="text" value="<?= base64_decode($pengajar['session']); ?>" placeholder="Masukkan Password" class="form-control">
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
<!-- End of Modal Edit Username & Password -->