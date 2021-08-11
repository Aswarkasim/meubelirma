<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?= $title ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php include('add.php') ?>

        <table class="table DataTable table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID TRANSAKSI</th>
                    <th>TANGGAL</th>
                    <th>ID BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>JUMLAH MASUK</th>
                    <th>SATUAN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($masuk as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row->id_masuk ?></td>
                        <td><?= $row->tanggal ?></td>
                        <td><?= $row->id_barang ?></td>
                        <td><?= $row->nama_barang ?></td>
                        <td><?= $row->jumlah ?></td>
                        <td><?= $row->nama_satuan ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success"><i class="fa fa-cogs"></i></button>
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('transaksi/masuk/delete/' . $row->id_masuk) ?>" class="tombol-hapus"><i class="fa fa-trash"></i> Hapus</a></li>
                                    <li><a href="<?= base_url('transaksi/masuk/cancel/' . $row->id_masuk) ?>" class="tombol-kurang"><i class="fa fa-minus"></i>Batal Tambah</a></li>
                                </ul>
                            </div>


                        </td>
                    </tr>
                    <?php $no++;
                } ?>
            </tbody>
        </table>

    </div>
    <!-- /.box-body -->
</div>