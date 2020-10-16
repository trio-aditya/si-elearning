<div class="container-fluid">
    <h3>Halaman Edit Data</h3>
    <hr><br>


    <form method="post" action="<?php echo base_url('sa/kelas/proses_edit_data'); ?>">
        <div class="form-group row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-5">
                <input type="hidden" class="form-control" value="<?php echo $kelas['id_kelas']; ?>" name="id_kelas">
                <input type="text" class="form-control" value="<?php echo $kelas['kelas']; ?>" name="kelas">
            </div>
        </div>
        <div class="form-group row">
            <label for="kelas" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>
</div>