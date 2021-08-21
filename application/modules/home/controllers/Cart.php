<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in_user();
    $this->load->model('home/Home_model', 'HM');
  }


  public function index()
  {
    $id_user = $this->session->userdata('id_user');
    $cart = $this->HM->listKeranjang($id_user);
    $data = [
      'cart'    => $cart,
      'content'  => 'home/cart/index'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function detail()
  {
    $data = [
      'content'  => 'home/cart/detail'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }


  function invoice()
  {
    $data = [
      'content'  => 'home/cart/invoice'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function addToCart($uri, $id_produk)
  {
    $uri = $this->uri->segment(4);
    // print_r($uri);
    // die;
    $produk = $this->Crud_model->listingOne('tbl_produk', 'id_produk', $id_produk);
    $data = [
      'id_keranjang'    => random_string(),
      'id_user'         => $this->session->userdata('id_user'),
      'id_produk'       => $id_produk,
      'qty'             => 1,
      'status'          => 'waiting',
      'harga'           => $produk->harga
    ];
    $this->Crud_model->add('tbl_keranjang', $data);
    if ($uri === 'detail') {
      redirect('home/produk/detail/' . $id_produk);
    } else {
      redirect('home/produk');
    }
  }


  function qty($action, $id_keranjang, $id_produk)
  {

    $cart = $this->Crud_model->listingOne('tbl_keranjang', 'id_keranjang', $id_keranjang);
    $produk = $this->Crud_model->listingOne('tbl_produk', 'id_produk', $id_produk);

    if ($action == 'minus') {

      $qty = $cart->qty - 1;
    } else {
      $qty = $cart->qty + 1;
    }

    $data = [
      'qty' => $qty,
      'harga' => $qty * $produk->harga
    ];
    $this->Crud_model->edit('tbl_keranjang', 'id_keranjang', $id_keranjang, $data);
    redirect('home/cart');
  }

  function delete($id_keranjang)
  {
    $this->Crud_model->delete('tbl_keranjang', 'id_keranjang', $id_keranjang);
    redirect('home/cart');
  }
}


/* End of file Controllername.php */
