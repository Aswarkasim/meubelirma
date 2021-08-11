<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?= $title ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php include('add.php') ?>
        <h4><b>Saldo : <?= 'Rp. ' . nominal($konfigurasi->saldo); ?></b></h4>
        <table class="table DataTable table-hover">
            <thead>
                <tr>
                    <th width="50px">No.</th>
                    <th>Transaki</th>
                    <th>TANGGAL</th>
                    <th>NAMA BARANG</th>
                    <th>JUMLAH MASUK</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($pencatatan as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <div class="badge <?= $row->type == 'Keluar' ? 'btn-success' : 'btn-warning'; ?>"><?= $row->type ?></div>
                        </td>
                        <td><?= $row->tanggal ?></td>
                        <td><?= $row->nama_produk ?></td>
                        <td><?= $row->jumlah ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success"><i class="fa fa-cogs"></i></button>
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('admin/pencatatan/delete/' . $row->id_pencatatan) ?>" class="tombol-hapus"><i class="fa fa-trash"></i> Hapus</a></li>
                                    <li><a href="<?= base_url('admin/pencatatan/cancel/' . $row->id_pencatatan) ?>" class="tombol-kurang"><i class="fa fa-minus"></i>Batal Tambah</a></li>
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