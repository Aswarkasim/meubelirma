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
    $query = $this->db->select('tbl_produk.*, tbl_kategori.nama_kategori, tbl_user.namalengkap')
      ->from($table)
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left')
      ->join('tbl_user', 'tbl_user.id_user = tbl_produk.id_user', 'left')
      ->limit($limit)
      ->offset($offset)
      ->where('type', $type)
      ->get();
    return $query->result();
  }

  function listByUser($table, $id_user, $limit, $offset)
  {
    $query = $this->db->select('tbl_produk.*, tbl_kategori.nama_kategori, tbl_user.namalengkap')
      ->from($table)
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left')
      ->join('tbl_user', 'tbl_user.id_user = tbl_produk.id_user', 'left')
      ->where('tbl_produk.id_user', $id_user)
      ->limit($limit)
      ->offset($offset)
      ->get();
    return $query->result();
  }
  function listProductByKategori($type, $id_kategori)
  {
    $query = $this->db->select('tbl_produk.*, tbl_kategori.nama_kategori, tbl_user.namalengkap')
      ->from('tbl_produk')
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left')
      ->join('tbl_user', 'tbl_user.id_user = tbl_produk.id_user', 'left')
      ->where('tbl_produk.id_kategori', $id_kategori)
      ->where('tbl_produk.type', $type)
      ->get();
    return $query->result();
  }

  function listProductByPemasok($id_user, $id_kategori)
  {
    $query = $this->db->select('tbl_produk.*, tbl_kategori.nama_kategori')
      ->from('tbl_produk')
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left')
      ->where('tbl_produk.id_user', $id_user)
      ->where('tbl_produk.id_kategori', $id_kategori)
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






  function listOrder($field, $id_user)
  {
    $query = $this->db->select('*')
      ->from('tbl_order')
      ->where($field, $id_user)
      ->order_by('date_created', 'DESC')
      ->get();
    return $query->result();
  }
}

/* End of file ModelName.php */
