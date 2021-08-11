<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('admin/Admin_model', 'AM');
  }


  public function index()
  {
    $order = $this->AM->listOrder();
    $data = [
      'title'   => 'Order',
      'order'   => $order,
      'content' => 'admin/order/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function detail($id_order)
  {
    is_read('tbl_order', 'id_order', $id_order);

    $order = $this->AM->listOrderDetail($id_order);
    $produk = $this->AM->listOrderFromKeranjang($id_order);
    $data = [
      'title'   => 'Order',
      'order'   => $order,
      'produk'   => $produk,
      'content' => 'admin/order/detail'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }


  function is_valid($id_order, $value)
  {
    __is_boolean('tbl_order', 'id_order', $id_order, 'status', $value);
    $this->session->set_flashdata('msg', 'Status diubah');
    redirect('admin/order/detail/' . $id_order);
  }

  function delete($id_order)
  {
    $d = $this->Crud_model->listingOne('tbl_order', 'id_order', $id_order);
    if ($d->bukti_pembayaran != '') {
      unlink($d->bukti_pembayaran);
    }
    $this->Crud_model->delete('tbl_order', 'id_order', $id_order);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('admin/order');
  }
}
