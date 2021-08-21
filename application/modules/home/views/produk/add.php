<div class="container-sm" style="max-width: 800px;">

  <a href="<?= base_url('home/produk'); ?>" class="btn btn-secondary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>

  <h4><b>Tambah Produk</b></h4>


  <?php

  if ($this->uri->segment(3) == 'add') {
    echo form_open_multipart(base_url('home/produk/add'));
  } else {
    echo form_open_multipart(base_url('home/produk/edit/' . $produk->id_produk));
  }



  ?>

  <div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-9">
      <div class="form-group">
        <?php echo validation_errors('<span class="text-danger">', '</span><br>') ?>
      </div>
    </div>
  </div>

  <form method="post">

    <div class="row">
      <div class="col-md-3">
        <label for="" class="pull-right">Nama Produk</label>
      </div>
      <div class="col-md-9">
        <div class="form-group">
          <input type="text" class="form-control" name="nama_produk" value="<?= isset($tugas) ? $tugas->nama_produk : set_value('nama_produk'); ?>" placeholder="Nama Produk">
        </div>
      </div>
    </div>
    <br>

    <div class="row">
      <div class="col-md-3">
        <label for="" class="pull-right">Kategori</label>
      </div>
      <div class="col-md-9">
        <div class="form-group">
          <select name="id_kategori" class="form-control" id="">
            <option value="">-- Kategori --</option>
            <?php foreach ($kategori as $row) { ?>
              <option value="<?= $row->id_kategori; ?>"><?= $row->nama_kategori; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <br>

    <div class="row">
      <div class="col-md-3">
        <label for="" class="pull-right">Harga</label>
      </div>
      <div class="col-md-9">
        <div class="form-group">
          <input type="number" class="form-control" name="harga" value="<?= isset($tugas) ? $tugas->harga : set_value('harga'); ?>" placeholder="Harga">
        </div>
      </div>
    </div>
    <br>


    <div class="row">
      <div class="col-md-3">
        <label for="" class="pull-right">Stok</label>
      </div>
      <div class="col-md-9">
        <div class="form-group">
          <input type="number" class="form-control" name="stok" value="<?= isset($tugas) ? $tugas->stok : set_value('stok'); ?>" placeholder="Stok">
        </div>
      </div>
    </div>
    <br>


    <div class="row">
      <div class="col-md-3">
        <label for="" class="pull-right">Gambar</label>
      </div>
      <div class="col-md-9">
        <div class="form-group">
          <input type="file" class="form-control" name="gambar" placeholder="Gambar">
          <small class="text-danger">* Hanya menerima format .jpg | .png</small>
        </div>
      </div>
    </div>
    <br>



    <div class="row">
      <div class="col-md-3">
        <label for="" class="pull-right">Deskripsi</label>
      </div>
      <div class="col-md-9">
        <div class="form-group">
          <textarea name="deskripsi" class="form-control" id="editor" cols="30" rows="10"><?= isset($tugas) ? $tugas->deskripsi : set_value('deskripsi'); ?></textarea>
        </div>
      </div>
    </div>

    <br>
    <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-9">
        <button type="submit" class="btn btn-primary px-5">Buat</button>
      </div>
    </div>
  </form>
</div>

<?php echo form_close() ?>

<script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>