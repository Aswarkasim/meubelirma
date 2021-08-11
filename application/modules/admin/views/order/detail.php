<div class="box" style="padding: 10px;">
  <a href="<?= base_url('admin/order'); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>


  <!-- title row -->
  <div class="row">
    <div class="col-md-12">
      <h4>
        <i class="fa fa-globe"></i> Tagihan
        <small class="float-right">Tanggal: <?= format_indo($order->date_created); ?></small>
      </h4>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row">
    <div class="col-sm-4">
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
    <div class="col-md-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
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

    <div class="col-md-6">

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



  <div class="btn-group">
    <button type="button" class="btn <?php if ($order->status == 'Menunggu') {
                                        echo 'btn-info';
                                      } else if ($order->status == 'Valid') {
                                        echo 'btn-success';
                                      } else if ($order->status == 'Tidak-Valid') {
                                        echo 'btn-danger';
                                      } ?>"><i class="fa fa-refresh"></i> <?= $order->status; ?></button>
    <button type="button" class="btn <?php if ($order->status == 'Menunggu') {
                                        echo 'btn-info';
                                      } else if ($order->status == 'Valid') {
                                        echo 'btn-success';
                                      } else if ($order->status == 'Tidak-Valid') {
                                        echo 'btn-danger';
                                      } ?> dropdown-toggle" data-toggle="dropdown">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a class="dropdown-item" href="<?= base_url('admin/order/is_valid/' . $order->id_order . '/Menunggu'); ?>">Menunggu</a></li>
      <li><a class="dropdown-item" href="<?= base_url('admin/order/is_valid/' . $order->id_order . '/Valid'); ?>">Valid</a></li>
      <li><a class="dropdown-item" href="<?= base_url('admin/order/is_valid/' . $order->id_order . '/Tidak-Valid'); ?>">Tidak Valid</a></li>
    </ul>
  </div>



  <button type="button" class="btn btn-warning btn-sx" data-toggle="modal" data-target="#modal-default">
    <i class="fa fa-image"></i> Lihat bukti pembayaran
  </button>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Bukti Pembayaran</h4>
        </div>
        <div class="modal-body">
          <img src="<?= base_url($order->bukti_pembayaran); ?>" width="100%" alt="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->