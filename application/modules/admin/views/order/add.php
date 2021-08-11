<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-10">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><strong><?= $title ?></strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        <?php
                        echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
                        if (isset($error)) {
                            echo '<div class="alert alert-warning">';
                            echo $error;
                            echo '</div>';
                        }
                        $uri = $this->uri->segment(3);
                        if ($uri == 'add') {
                            echo form_open_multipart($add);
                        } else {
                            echo form_open_multipart($edit);
                        } ?>
                        <form action="" method="post">


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="pull-right">Nama Produk</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="nama_produk" value="<?= isset($produk) ? $produk->nama_produk : set_value('nama_produk') ?>" placeholder="Nama Produk" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="pull-right">Kategori</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select required name="id_kategori" id="" class="form-control select2">
                                            <option value="">-- Kategori --</option>
                                            <?php foreach ($kategori as $row) { ?>
                                                <option value="<?= $row->id_kategori; ?>" <?php if (isset($produk)) {
                                                                                                if ($produk->id_kategori == $row->id_kategori) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            } ?>><?= $row->nama_kategori; ?></option>
                                            <?php } ?>
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
                                        <input type="text" name="stok" value="<?= isset($produk) ? $produk->stok : set_value('stok') ?>" placeholder="Stok" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="pull-right">Harga Satuan</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="harga" value="<?= isset($produk) ? $produk->harga : set_value('harga') ?>" placeholder="Harga Satuan" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="pull-right">Gambar</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" name="gambar" <?= $uri == 'add' ? 'required' : '' ?> placeholder="Gambar" class="form-control">
                                        <br>
                                        <?php if (isset($produk)) { ?>
                                            <img src="<?= base_url($produk->gambar) ?>" width="150px" alt="">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <script src="<?= base_url('assets/admin/') ?>bower_components/ckeditor/ckeditor.js"></script>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="pull-right">Deskripsi</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="deskripsi" id="editor1" placeholder="Deskripsi" class="form-control">
                                            <?= isset($produk) ? $produk->deskripsi : set_value('deskripsi') ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>



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
                        <?= form_close() ?>
                    </div>
                    <!-- <div class="col-md-6">

                    </div> -->
                </div>


            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('editor1')
    $('.select2').select2()
</script>