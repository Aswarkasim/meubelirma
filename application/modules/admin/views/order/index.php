 <style>
   .not_read {
     background-color: bisque;
   }
 </style>

 <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
 <div class="box">
   <div class="box-header">
     <h3 class="box-title"><?= $title; ?></h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">


     <table class="table DataTable">
       <thead>
         <tr>
           <th width="40px">No</th>
           <th>Nama Produk</th>
           <th>Total Produk</th>
           <th>Tagihan</th>
           <th width="200px">TIndakan</th>
         </tr>
       </thead>
       <tbody>
         <?php $no = 1;
          foreach ($order as $row) {
            $cart = $this->Crud_model->listingOneAll('tbl_keranjang', 'id_order', $row->id_order);
          ?>
           <tr class="<?php if ($row->is_read == 0) {
                        echo "not_read";
                      }  ?>">
             <td><?= $no++; ?></td>
             <td><a href="<?= base_url('admin/order/detail/' . $row->id_order) ?>"><strong><?= $row->nama_pelanggan; ?></strong></a></td>
             <td><?= count($cart); ?></td>
             <td><?= 'Rp. ' . nominal($row->total_tagihan); ?></td>
             <td>
               <a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/order/delete/' . $row->id_order) ?>"><i class="fa fa-trash"></i> Hapus</a>
             </td>
           </tr>
         <?php } ?>
       </tbody>
     </table>

   </div>
   <!-- /.box-body -->
 </div>