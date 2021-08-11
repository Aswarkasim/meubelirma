<form action="<?= base_url('transaksi/masuk/add') ?>" method="post">
    <div class="row">
        <div class="col-md-offset-2 col-md-6">

            <?php
            echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
            ?>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="pull-right">ID Tansaksi</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" disabled value="<?= 'TM' . date('Ymdhis') ?>" name="id_masuk" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="pull-right">Tanggal</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" value="<?= date('d/m/y') ?>" name="tanggal" class="form-control">
                        <small class="text text-danger"><strong>* Kosongkan jika sekarang</strong></small>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="pull-right">Barang</label>
                    </div>
                    <div class="col-md-9">
                        <select name="id_barang" id="id_barang" class="form-control select2">
                            <option value="none">-- Pilih Barang --</option>
                            <?php foreach ($barang as $row) { ?>
                                <option value="<?= $row->id_barang ?>"><?= $row->id_barang ?> || <?= $row->nama_barang ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="pull-right">Stok</label>
                    </div>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="text" id="stok" disabled class="form-control">
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="pull-right">Jumlah Masuk</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" name="jumlah" class="form-control">
                    </div>
                </div>
            </div>

            <!-- <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="pull-right">Total Stok</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" id="total" disabled name="total" class="form-control">
                    </div>
                </div>
            </div> -->
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