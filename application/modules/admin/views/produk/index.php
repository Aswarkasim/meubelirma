<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"><?= $title; ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <p>
      <a href="<?= base_url($add) ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
    </p>

    <table class="table DataTable">
      <thead>
        <tr>
          <th width="40px">No</th>
          <th>Nama Produk</th>
          <th>Stok</th>
          <th>Harga Satuan</th>
          <th width="200px">TIndakan</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($produk as $row) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><a href="<?= base_url('admin/produk/detail/' . $row->id_produk) ?>"><strong><?= $row->nama_produk; ?></strong></a></td>
            <td><?= $row->stok; ?></td>
            <td><?= 'Rp. ' . nominal($row->harga); ?></td>
            <td>
              <a class="btn btn-success" href="<?= base_url('admin/produk/edit/' . $row->id_produk) ?>"><i class="fa fa-edit"></i> Edit</a>
              <a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/produk/delete/' . $row->id_produk) ?>"><i class="fa fa-trash"></i> Hapus</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
  <!-- /.box-body -->
</div>