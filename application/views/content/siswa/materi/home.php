<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css"); ?>" rel="stylesheet">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Materi</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url('home/siswa'); ?>">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Materi</strong>
                        </li>
                    </ol>
                </div>
            </div><br>


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Pelajaran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="10%">No.</th>
                                    <th>Mata Pelajaran</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($matapelajaran as $value) : ?>
                                    <tr>
                                        <th scope="row"><?= $no ?></th>
                                        <td><?= $value['matapelajaran']; ?></td>
                                        <td>
                                            <form action=" <?php echo base_url() . 'siswa/materi/detail_data' ?>" method="post">
                                                <input type="hidden" name="matapelajaran_id" value="<?php echo  $value['matapelajaran_id']; ?>">
                                                <input type="hidden" name="kelas_id" value="<?php echo  $value['kelas_id']; ?>">
                                                <button class="btn btn-primary btn-sm" type="submit"> Lihat Materi</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="10%">No.</th>
                                    <th>Mata Pelajaran</th>
                                    <th width="20%">Aksi</th>
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