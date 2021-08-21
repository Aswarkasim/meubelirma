<div class="container mt-3" style="max-width: 900px;">
  <a href="<?= base_url('home/produk'); ?>" class="btn btn-secondary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>

  <div class="row">
    <div class="col-md-4">
      <img src="<?= base_url($produk->gambar); ?>" width="100%" alt="">
    </div>

    <div class="col-md-8">
      <h3><?= $produk->nama_produk; ?></h3>
      <p><?= $produk->deskripsi; ?></p>
      <hr>
      <p><?= 'Stok : ' . $produk->stok ?></p>
      <p>
      <h4><?= 'Rp. ' . $produk->harga ?></h4>
      </p>
      <?php if ($this->session->userdata('role') !== 'Pemasok') {
        if (!$cekKeranjang) {
      ?>
          <div class="d-grid gap-2">
            <a href="<?= base_url('home/cart/addToCart/detail/' . $produk->id_produk); ?>" class="btn btn-primary"><i class="fa fa-cart-plus mx-1"></i> Tambah ke keranjang</a>
          </div>
        <?php } else {
        ?>
          <small class="alert alert-success"><i class="fa fa-check"></i> Telah ditambahkan</small>
      <?php
        }
      } ?>
      <!-- <a href="" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Tambah ke keranjang</a> -->
      <!-- <a href="" class="btn btn-secondary"><i class="fa fa-inbox"></i> Order</a> -->
    </div>
  </div>
</div>