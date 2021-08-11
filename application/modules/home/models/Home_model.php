<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

  function getProdukByType($type)
  {
    $query = $this->db->select('*')
      ->from('tbl_produk')
      ->where('type', $type)
      ->get();
    return $query->result();
  }

  function listAll($table, $type, $limit, $offset)
  {
    $query = $this->db->select('*')
      ->from($table)
      ->limit($limit)
      ->offset($offset)
      ->where('type', $type)
      ->get();
    return $query->result();
  }

  function cekKeranjang($id_user, $id_produk)
  {
    $query = $this->db->select('*')
      ->from('tbl_keranjang')
      ->where('id_user', $id_user)
      ->where('id_produk', $id_produk)
      ->where('status', 'waiting')
      ->get();
    return $query->row();
  }

  function listKeranjang($id_user)
  {
    $query = $this->db->select('tbl_keranjang.*, tbl_produk.nama_produk, tbl_produk.stok, tbl_produk.id_user')
      ->from('tbl_keranjang')
      ->join('tbl_produk', 'tbl_produk.id_produk = tbl_keranjang.id_produk', 'left')
      ->where('tbl_keranjang.id_user', $id_user)
      ->where('tbl_keranjang.status', 'waiting')
      ->get();
    return $query->result();
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


  function listByUser($table, $id_user, $limit, $offset)
  {
    $query = $this->db->select('*')
      ->from($table)
      ->where('id_user', $id_user)
      ->limit($limit)
      ->offset($offset)
      ->get();
    return $query->result();
  }
}

/* End of file ModelName.php */
