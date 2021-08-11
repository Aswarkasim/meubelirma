<div class="box" style="padding: 10px;">
  <a href="<?= base_url('admin/produk'); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
  <a href="<?= base_url('admin/produk/edit'); ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
  <a href="<?= base_url('admin/produk/delete/' . $produk->id_produk); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
  <br><br>
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
      <!-- <a href="" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Tambah ke keranjang</a>
      <a href="" class="btn btn-secondary"><i class="fa fa-inbox"></i> Order</a> -->
    </div>
  </div>
</div>