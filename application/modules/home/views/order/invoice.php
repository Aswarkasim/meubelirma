<div class="container">
  <div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url('home/order'); ?>" class="btn btn-secondary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>
        <h4>
          <i class="fa fa-globe"></i> Tagihan
          <small class="float-right">Tanggal: <?= format_indo($order->date_created); ?></small>
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



    <?php

    $role = $this->session->userdata('role');
    if (($role === 'Pembeli') || $role === 'User') {

      if ($order->status == 'Belum') { ?>
        <p class="alert alert-warning"><i class="fa fa-warning"></i> Tagihan anda belum dibayar</p>
      <?php } else if ($order->status == 'Tidak-Valid') { ?>
        <p class="alert alert-danger"><i class="fa fa-times"></i> Pembayaran tidak valid</p>
      <?php } else if ($order->status == 'Valid') { ?>
        <p class="alert alert-success"><i class="fa fa-check"></i> Pembayaran valid</p>
      <?php } else { ?>
        <p class="alert alert-info"><i class="fa fa-spinner"></i> Menunggu konfirmasi</p>
      <?php } ?>
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-12">
          <a href="<?= base_url('home/order/print/' . $order->id_order); ?>" target="_blank" class="btn btn-secondary"><i class="fa fa-print"></i> Print</a>



        <?php
      } else { ?>

          <?php if ($order->status != 'Belum') { ?>
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn <?php if ($order->status == 'Menunggu') {
                                                                      echo 'btn-info';
                                                                    } else if ($order->status == 'Valid') {
                                                                      echo 'btn-success';
                                                                    } else if ($order->status == 'Tidak-Valid') {
                                                                      echo 'btn-danger';
                                                                    } ?> dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <?= $order->status; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                  <li><a class="dropdown-item" href="<?= base_url('home/order/is_valid/' . $order->id_order . '/Menunggu'); ?>">Menunggu</a></li>
                  <li><a class="dropdown-item" href="<?= base_url('home/order/is_valid/' . $order->id_order . '/Valid'); ?>">Valid</a></li>
                  <li><a class="dropdown-item" href="<?= base_url('home/order/is_valid/' . $order->id_order . '/Tidak-Valid'); ?>">Tidak Valid</a></li>
                </ul>
              </div>
            </div>



        <?php }
        } ?>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modelIdUploadBukti">
          <i class="fa fa-edit"></i> <?= $role == 'Pemasok' ? 'Lihat Bukti Pembayaran' :  'Upload Bukti Pmebayaran' ?>
        </button>

        </div>
      </div>

  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modelIdUploadBukti" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bukti Pembayaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <?= form_open_multipart('home/order/uploadBukti') ?>
      <form action="" method="POST">
        <input type="hidden" value="<?= $order->id_order; ?>" name="id_order">
        <div class="modal-body">
          <div class="form-group">

            <?php if ($role != 'Pemasok') { ?>
              <label for="" class="form-label">Pilih Foto</label>
              <input type="file" name="bukti_pembayaran" id="" class="form-control"><br>
            <?php } ?>
            <?php if ($order->bukti_pembayaran != '') { ?>
              <img src="<?= base_url($order->bukti_pembayaran); ?>" width="100%" alt="">
            <?php } ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <?php if ($role != 'Pemasok') { ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          <?php } ?>
        </div>
      </form>
      <?= form_close() ?>

    </div>
  </div>
</div>