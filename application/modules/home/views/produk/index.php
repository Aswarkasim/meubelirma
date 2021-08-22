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
          <li class="list-group-item <?= $row->id_kategori == $id_active ? 'active' : '' ?>"><a href="<?= base_url('home/produk/kategori/' . $row->id_kategori) ?>" class="nav-link <?= $row->id_kategori == $id_active ? 'text-white' : '' ?>"><?= $row->nama_kategori; ?></a></li>
        <?php } ?>
      </ul>
    </div>
    <div class="col-md-9">

      <p class="alert alert-success">
        <?= 'Halo ' . $this->session->userdata('username') . ' selamat datang di akun ' . $this->session->userdata('role') . ' !😊';; ?>
      </p>

      <?php if ($this->session->userdata('role') === 'Pemasok') { ?>
        <a href="<?= base_url('home/produk/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a>
      <?php } ?>

      <?php
      if (count($produk) <= 0) { ?>
        <p class="alert alert-info"><i class="fa fa-inbox fa-2x"></i> TIdak ada produk</p>
      <?php } else { ?>

        <div class="row">
          <?php foreach ($produk as $row) {
            $cekKeranjang = $this->HM->cekKeranjang($id_user, $row->id_produk);
          ?>
            <div class="col-md-3 m-2 shadow rounded" style="height: 400px;">
              <div class="img" style="max-height: 150px; overflow: hidden;">
                <img src="<?= base_url($row->gambar); ?>" class="" style="width: 100%; overflow: hidden;" alt="">
              </div>
              <hr>
              <p class="text-center"><a href="<?= base_url('home/produk/detail/' . $row->id_produk); ?>" class="nav-link"><b><?= $row->nama_produk; ?></b></a></p>
              <?php if (isset($row->namalengkap)) { ?>
                <a href=""><b><?= $row->namalengkap; ?></b></a><br>
              <?php } ?>
              <small><?= $row->nama_kategori; ?></small>
              <hr>
              <p class=""><strong><?= 'Rp. ' . nominal($row->harga) ?></strong></p>
              <?php if ($this->session->userdata('role') !== 'Pemasok') {
                if (!$cekKeranjang) {
              ?>
                  <div class="d-grid gap-2">
                    <a href="<?= base_url('home/cart/addToCart/produk/' . $row->id_produk); ?>" class="btn btn-primary"><i class="fa fa-cart-plus mx-1"></i> Tambah ke keranjang</a>
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
            <?php if (isset($pagination)) {
              echo $pagination;
            }; ?>
          </div>
        </div>
    </div>
  </div>
</div>