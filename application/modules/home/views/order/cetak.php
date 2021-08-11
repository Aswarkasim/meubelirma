  <link href="<?= base_url('assets/home/'); ?>css/bootstrap_mythemes.css" rel="stylesheet">

  <div class="container">
    <div class="invoice p-3 mb-3">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fa fa-globe"></i> Tagihan
            <small class="float-right">Tanggal: <?= date('Y M D'); ?></small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Nama Pembeli : <?= $order->nama_pelanggan; ?></strong><br>
            No. Hp. : <?= $order->nohp; ?><br>
            Alamat : <?= $order->alamat; ?><br>
          </address>
        </div>

      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>QTY</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($produk as $row) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row->nama_produk; ?></td>
                  <td><?= $row->qty; ?></td>
                  <td><?= 'Rp. ' . nominal($row->harga); ?></td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">

        <div class="col-6">

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th>Total:</th>
                  <td><?= 'Rp. ' . nominal($order->total_tagihan); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </div>
  </div>