<?php
$id_user = $this->session->userdata('id_user');
$uri = $this->uri->segment(3)

?>

<div class="container mt-3">

  <div class="row">
    <div class="col-md-3 ">
      <ul class="list-group shadow">
        <li class="list-group-item <?= $uri == '' ? 'active' : '' ?>"><a href="<?= base_url('home/produk/') ?>" class="nav-link <?= $uri == '' ? 'text-white' : '' ?>">Semua</a></li>
        <?php foreach ($kategori as $row) { ?>
          <!-- <li class="list-group-item active"><a href="" class="nav-link  text-light">Meja</a></li> -->
          <li class="list-group-item <?= $row->id_kategori == $id_active ? 'active' : '' ?>"><a href="<?= base_url('home/produk/index/' . $row->id_kategori) ?>" class="nav-link <?= $row->id_kategori == $id_active ? 'text-white' : '' ?>"><?= $row->nama_kategori; ?></a></li>
        <?php } ?>
      </ul>
    </div>
    <div class="col-md-9">
      <?php
      if (count($produk) <= 0) { ?>
        <p class="alert alert-info"><i class="fa fa-inbox fa-2x"></i> TIdak ada produk</p>
      <?php } else { ?>
        <?php if ($this->session->userdata('role') === 'Pemasok') { ?>
          <a href="<?= base_url('home/produk/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a>
        <?php } ?>
        <div class="row">
          <?php foreach ($produk as $row) {
            $cekKeranjang = $this->HM->cekKeranjang($id_user, $row->id_produk);
          ?>
            <div class="col-md-3 m-2 shadow rounded" style="height: 350px;">
              <div class="img" style="max-height: 150px; overflow: hidden;">
                <img src="<?= base_url($row->gambar); ?>" class="" style="width: 100%; overflow: hidden;" alt="">
              </div>
              <hr>
              <p class="text-center"><a href="<?= base_url('home/produk/detail/' . $row->id_produk); ?>" class="nav-link"><?= $row->nama_produk; ?></a></p>
              <hr>
              <p class=""><strong><?= 'Rp. ' . nominal($row->harga) ?></strong></p>
              <?php if ($this->session->userdata('role') !== 'Pemasok') {
                if (!$cekKeranjang) {
              ?>
                  <div class="d-grid gap-2">
                    <a href="<?= base_url('home/cart/addToCart/' . $row->id_produk); ?>" class="btn btn-primary"><i class="fa fa-cart-plus mx-1"></i> Tambah ke keranjang</a>
                  </div>
                <?php } else {
                ?>
                  <small class="alert alert-success"><i class="fa fa-check"></i> Telah ditambahkan</small>
              <?php
                }
              } ?>
            </div>
        <?php }
        } ?>
        </div>
        <div class="row mt-5">
          <div class="text-center">
            <?= $pagination; ?>
          </div>
        </div>
    </div>
  </div>
</div>