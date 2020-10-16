<div class="container-fluid">
    <h3>Halaman Tambah Data</h3>
    <hr><br>


    <form method="post" action="<?php echo base_url('sa/kelas/proses_tambah_data'); ?>">
        <div class="form-group row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="kelas">
            </div>
        </div>
        <div class="form-group row">
            <label for="kelas" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>
</div>