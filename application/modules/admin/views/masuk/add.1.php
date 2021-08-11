<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
                ?>

                <form action="<?= base_url('transaksi/masuk/add') ?>" method="post">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">ID Tansaksi</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" value="<?= 'TR' . date('ymdhis') ?>" name="id_masuk" class="form-control">
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
                                    <?php foreach ($barang as $row) { ?>
                                        <option value="<?= $row->id_barang ?>"><?= $row->nama_barang ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
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
                    </div>

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

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Total Stok</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" id="total" disabled name="total" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-9">
                                <a href="<?= base_url($back) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>

                </form>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>


<script>
    function loadRombel() {
        var kelas = $("#kelas").val();
        var jurusan = $("#jurusan").val();
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>transaksi/masuk/loadStok',
            data: 'kelas=' + kelas + '&jurusan=' + jurusan,
            success: function(html) {
                $("#showRombel").html(html);
            }
        })
    }
</script>