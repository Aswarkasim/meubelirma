<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pencatatan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'AM');
  }

  public function index()
  {
    $produk = $this->AM->listProduk();

    $pencatatan = $this->Crud_model->listing('tbl_pencatatan', 'DESC');

    $konfigurasi = $this->Crud_model->listingOne('tbl_konfigurasi', 'id_konfigurasi', '1');
    $data = [
      'title'    => 'Pencatatan',
      'konfigurasi'   => $konfigurasi,
      'produk'   => $produk,
      'pencatatan'   => $pencatatan,
      'content'  => 'admin/pencatatan/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function add()
  {
    $konfigurasi = $this->Crud_model->listingOne('tbl_konfigurasi', 'id_konfigurasi', '1');
    $i = $this->input;
    $id_produk = $i->post('id_produk');
    $jumlah = $i->post('jumlah');
    $produk = $this->Crud_model->listingOne('tbl_produk', 'id_produk', $id_produk);
    $stokNow = $produk->stok;

    if ($stokNow < $jumlah) {
      $this->session->set_flashdata('msg_er', 'stok tidak cukup');
      redirect('admin/pencatatan');
    } else {
      __is_boolean('tbl_produk', 'id_produk', $id_produk, 'stok', $stokNow - $jumlah);


      $data = [
        'id_pencatatan'   => random_string(),
        'tanggal'         => $i->post('tanggal'),
        'id_produk'       => $id_produk,
        'nama_produk'     => $produk->nama_produk,
        'jumlah'          => $jumlah,
        'type'            => 'Keluar',
        'total_harga'     => $jumlah * $produk->harga
      ];
      __is_boolean('tbl_konfigurasi', 'id_konfigurasi', '1', 'saldo', $konfigurasi->saldo + $data['total_harga']);

      $this->Crud_model->add('tbl_pencatatan', $data);
      $this->session->set_flashdata('msg', 'pencatatan berhasil ditambah');
      redirect('admin/pencatatan');
    }
  }


  //Delete one item
  public function delete($id_pencatatan)
  {

    $this->Crud_model->delete('tbl_pencatatan', 'id_pencatatan', $id_pencatatan);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('admin/pencatatan');
  }

  function cancel($id_pencatatan)
  {
    $pencatatan = $this->Crud_model->listingOne('tbl_pencatatan', 'id_pencatatan', $id_pencatatan);
    $id_produk = $pencatatan->id_produk;
    $produk = $this->Crud_model->listingOne('tbl_produk', 'id_produk', $id_produk);
    $stok_pencatatan = $pencatatan->jumlah;
    $stok_produk = $produk->stok;
    $stok = $stok_produk - $stok_pencatatan;

    $this->AM->addStok($stok, $id_produk);

    $this->Crud_model->delete('tbl_pencatatan', 'id_pencatatan', $id_pencatatan);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('admin/pencatatan');
  }
}

/* End of file Controllername.php */
