<form action="<?= base_url('admin/pencatatan/add') ?>" method="post">
    <div class="row">
        <div class="col-md-offset-2 col-md-6">

            <?php
            echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
            ?>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="pull-right">Tanggal</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" value="<?= date('d/m/y') ?>" required name="tanggal" class="form-control">
                        <small class="text text-danger"><strong>* Kosongkan jika sekarang</strong></small>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="pull-right">Produk</label>
                    </div>
                    <div class="col-md-9">
                        <select name="id_produk" id="id_produk" required class="form-control select2">
                            <option value="none">-- Pilih Produk --</option>
                            <?php foreach ($produk as $row) {
                                if ($row->stok >= 1) {
                            ?>
                                    <option value="<?= $row->id_produk ?>"> <?= $row->nama_produk ?></option>
                            <?php  }
                            } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="pull-right">Jumlah Keluar</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" required name="jumlah" class="form-control">
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-9 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>