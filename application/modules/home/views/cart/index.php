<div class="container mt-3">
  <h4><strong>Keranjang</strong></h4>
  <table class="table">
    <thead class="bg-primary text-white">
      <th>#</th>
      <th>Nama Barang</th>
      <th>Qty</th>
      <th>Harga</th>
      <th>Aksi</th>
    </thead>
    <tbody>
      <?php $no  = 1;
      $total = 0;
      foreach ($cart as $row) { ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row->nama_produk; ?></td>
          <td>
            <?php if ($row->qty > 1) { ?>
              <a href="<?= base_url('home/cart/qty/minus/' . $row->id_keranjang . '/' . $row->id_produk); ?>" class="btn btn-success btn-sm"><i class="fa fa-minus"></i></a>
            <?php } ?>
            <span class="mx-2"><?= $row->qty; ?></span>
            <?php if ($row->qty <= $row->stok) { ?>
              <a href="<?= base_url('home/cart/qty/plus/' . $row->id_keranjang . '/' . $row->id_produk); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
            <?php } ?>
          </td>
          <td><?= 'Rp. ' . nominal($row->harga); ?></td>
          <td><a href="<?= base_url('home/cart/delete/' . $row->id_keranjang); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a></td>
        </tr>



      <?php $total = $total + $row->harga;
      } ?>
    </tbody>
  </table>
  <div class="row">
    <div class="col">
      <p class="float-end">Total : <?= 'Rp. ' . nominal($total) ?></p>
    </div>
  </div>


  <form action="<?= base_url('home/order/makeOrder'); ?>" method="POST">
    <input type="hidden" name="total_tagihan" value="<?= $total; ?>">
    <div class="row">
      <div class="offset-6 col-md-6">

        <div class="row">
          <div class="col-md-3">
            <label for="" class="pull-right">Nama Pembeli</label>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <input type="text" required class="form-control" name="nama_pelanggan" value="<?= set_value('nama_pelanggan') ?>" placeholder="Nama Pembeli">
            </div>
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col-md-3">
            <label for="" class="pull-right">No. Hp.</label>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <input type="text" required class="form-control" name="nohp" value="<?= set_value('nohp') ?>" placeholder="No. Hp.">
            </div>
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col-md-3">
            <label for="" class="pull-right">Alamat</label>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <input type="text" required class="form-control" name="alamat" value="<?= set_value('alamat') ?>" placeholder="No. Hp.">
            </div>
          </div>
        </div>
        <br>


      </div>
    </div>

    <div class="float-end mb-3">
      <button type="submit" class="btn btn-primary">Selanjutnya <i class="fa fa-arrow-right"></i></button>
    </div>

  </form>

</div>