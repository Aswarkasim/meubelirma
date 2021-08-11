<div class="container mt-3">
  <h4><strong>Order</strong></h4>
  <table class="table">
    <thead class="bg-primary text-white">
      <th>#</th>
      <th>Nomor Order</th>
      <th>Status</th>
      <th>Aksi</th>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($order as $row) { ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><a href=""><?= $row->id_order; ?></a></td>
          <td><?= $row->status; ?></td>
          <td><a href="<?= base_url('home/order/invoice/' . $row->id_order); ?>" class="btn btn-primary badge badge-pill"><i class="fa fa-info-circle"></i> Detail</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>