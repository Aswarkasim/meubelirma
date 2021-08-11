
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  function listProduk()
  {
    $this->db->select('tbl_produk.*,
                            tbl_kategori.nama_kategori')
      ->from('tbl_produk')
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'LEFT')
      ->where('type', 'Umum');
    return $this->db->get()->result();
  }

  function countOrder()
  {
    $this->db->select('*')
      ->from('tbl_order')
      ->where('status', 'Menunggu')
      ->where('id_pemasok', null)
      ->where('is_read', '0');
    return $this->db->get()->result();
  }

  function listOrder()
  {
    $this->db->select('tbl_order.*,
                            tbl_user.namalengkap')
      ->from('tbl_order')
      ->join('tbl_user', 'tbl_user.id_user = tbl_order.id_user', 'LEFT')
      ->where('id_pemasok', null)
      ->where('status', 'Menunggu');
    return $this->db->get()->result();
  }

  function listOrderDetail($id_order)
  {
    $this->db->select('tbl_order.*,
                            tbl_user.namalengkap')
      ->from('tbl_order')
      ->join('tbl_user', 'tbl_user.id_user = tbl_order.id_user', 'LEFT')
      ->where('id_order', $id_order);
    return $this->db->get()->row();
  }

  function listOrderFromKeranjang($id_order)
  {
    $query = $this->db->select('tbl_keranjang.*, tbl_produk.nama_produk, tbl_produk.stok, tbl_produk.id_user')
      ->from('tbl_keranjang')
      ->join('tbl_produk', 'tbl_produk.id_produk = tbl_keranjang.id_produk', 'left')
      ->where('tbl_keranjang.id_order', $id_order)
      ->get();
    return $query->result();
  }

  function addStok($stok_total, $id_barang)
  {
    $this->db->query("UPDATE tbl_produk SET `stok` = '$stok_total' WHERE `id_produk` = '$id_produk'");
  }
}

/* End of file Controllername.php */
