<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css"); ?>" rel="stylesheet">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Kelas</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Kelola Kelas</strong>
                        </li>
                    </ol>
                </div>
            </div><br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kelas
                        <a href="<?php echo base_url('su/kelas/tambah_data'); ?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>No.</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($kelas as $value) : ?>
                                    <tr align="center">
                                        <th scope="row"><?= $no ?></th>
                                        <td><?= $value['kelas']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>su/kelas/edit_data/<?php echo $value['id_kelas']; ?>" class="badge badge-success">Edit</a>
                                            <a href="<?php echo base_url() ?>su/kelas/hapus_data/<?php echo $value['id_kelas']; ?>" class="badge badge-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr align="center">
                                    <th>No.</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
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

<div id="tambah-kelas" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tambah_fakultas" class="form-horizontal">
                    <div class="form-group">
                        <label class="font-normal"><b>Fakultas</b></label>
                        <input id="nama_fakultas" name="nama_fakultas" type="text" placeholder="Fakultas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-normal"><b>Singkatan</b></label>
                        <input id="singkatan_fakultas" name="singkatan_fakultas" type="text" placeholder="Singkatan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-normal"><b>Wakil Dekan Satu</b></label>
                        <input id="nama_wadek_satu" name="nama_wadek_satu" type="text" placeholder="Wakil Dekan Satu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-normal"><b>NIP Dekan Satu</b></label>
                        <input id="nip_wadek_satu" name="nip_wadek_satu" type="text" placeholder="NIP Dekan Satu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-normal"><b>Masa Jabatan</b><small class="text-info"></small></label>
                        <div class="input-daterange input-group" id="datepicker">
                            <input id="mulai_jabatan" name="mulai_jabatan" type="text" class="form-control-sm form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="2019-09-20" />
                            <span class="input-group-addon">to</span>
                            <input id="selesai_jabatan" name="selesai_jabatan" type="text" class="form-control-sm form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="2019-09-20" />
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div id="detail_fakultas" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Detail Fakultas</h4>
            </div>
            <div class="modal-body">
                <div id="tampil_fakultas">

                </div>
            </div>
        </div>
    </div>
</div>
<div id="ubah_fakultas" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <div class="modal-body">
                <div id="form_edit_fakultas">

                </div>
            </div>
        </div>
    </div>
</div>

<div id="ganti_wadek" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Ganti Wakil Dekan Satu</h4>
            </div>
            <div class="modal-body">
                <div id="form_ganti_wadek">

                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js"); ?>"></script>

<script>
    //manajemen_fakultas
    $(document).ready(function() {
        var fakultas = $('#manajemen_fakultas').DataTable({
            "processing": true,
            "ajax": 'kelas/data_kelas',
            stateSave: true,
            "order": []
        })
    })
</script>