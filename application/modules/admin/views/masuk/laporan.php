<h3>
    convert html to pdf
</h3><br>


<table class="table DataTable table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID TRANSAKSI</th>
            <th>TANGGAL</th>
            <th>ID BARANG</th>
            <th>NAMA BARANG</th>
            <th>JUMLAH MASUK</th>
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
            </tr>
            <?php $no++;
        } ?>
    </tbody>
</table>