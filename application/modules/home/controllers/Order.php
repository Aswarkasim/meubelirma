<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
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
    $role = $this->session->userdata('role');

    if ($role == 'Pemasok') {
      $field = 'id_pemasok';
    } else if (($role == 'Pembeli') || $role == 'User') {
      $field = 'id_user';
    }

    $order = $this->Crud_model->listingOneAll('tbl_order', $field, $id_user);

    $data = [
      'order'   => $order,
      'content'  => 'home/order/index'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function detail()
  {
    $data = [
      'content'  => 'home/produk/detail'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function makeOrder()
  {
    $id_user = $this->session->userdata('id_user');
    $cart = $this->HM->listKeranjang($id_user);



    $id_pemasok = null;
    if ($this->session->userdata('role') === 'Pembeli') {

      foreach ($cart as $key => $value) {
        if ($key == 0) {
          $id_pemasok = $value->id_user;
        }
      }
    }


    $i = $this->input;
    $dataOrder = [
      'id_order'        => random_string('numeric'),
      'id_user'         => $id_user,
      'id_pemasok'      => $id_pemasok,
      'total_tagihan'   => $i->post('total_tagihan'),
      'nama_pelanggan'  => $i->post('nama_pelanggan'),
      'nohp'            => $i->post('nohp'),
      'alamat'          => $i->post('alamat'),
    ];
    $this->Crud_model->add('tbl_order', $dataOrder);

    foreach ($cart as $row) {
      $data = [
        'id_order'      => $dataOrder['id_order'],
        'status'            => 'order'
      ];
      $this->Crud_model->edit('tbl_keranjang', 'id_keranjang', $row->id_keranjang, $data);
    }

    $this->session->set_flashdata('msg', 'Order anda dibuat');
    redirect('home/order/invoice/' . $dataOrder['id_order']);
  }

  function invoice($id_order)
  {
    $order = $this->Crud_model->listingOne('tbl_order', 'id_order', $id_order);
    $produk = $this->HM->listOrderFromKeranjang($id_order);

    $data = [
      'order'    => $order,
      'produk'    => $produk,
      'content'  => 'home/order/invoice'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function print($id_order)
  {
    $order = $this->Crud_model->listingOne('tbl_order', 'id_order', $id_order);
    $produk = $this->HM->listOrderFromKeranjang($id_order);
    $data = [
      'order'    => $order,
      'produk'    => $produk,
    ];
    $this->load->view('home/order/cetak', $data, FALSE);
  }

  function uploadBukti()
  {
    $id_order = $this->input->post('id_order');
    $order = $this->Crud_model->listingOne('tbl_order', 'id_order', $id_order);
    if (!empty($_FILES['bukti_pembayaran']['name'])) {
      $config['upload_path']   = './assets/uploads/images/bukti/';
      $config['allowed_types'] = 'gif|jpg|png|PNG|svg|jpeg|JPEG|JPG';
      $config['max_size']      = '1000000'; // KB 
      $this->upload->initialize($config);

      if (!$this->upload->do_upload('bukti_pembayaran')) {
        $this->upload->display_errors();
        redirect('home/order/invoice/' . $id_order);
      } else {

        if ($order->bukti_pembayaran != "") {
          unlink($order->bukti_pembayaran);
        }

        $upload_data = ['uploads' => $this->upload->data()];
        $data = [
          'status'                => 'Menunggu',
          'bukti_pembayaran'        => $config['upload_path'] . $upload_data['uploads']['file_name']
        ];
        $this->Crud_model->edit('tbl_order', 'id_order', $id_order, $data);
        $this->session->set_flashdata('msg', 'Bukti pembayaran diupload');
        redirect('home/order/invoice/' . $id_order);
      }
    }
  }

  function is_valid($id_order, $value)
  {
    __is_boolean('tbl_order', 'id_order', $id_order, 'status', $value);
    $this->session->set_flashdata('msg', 'Status diubah');
    redirect('home/order/invoice/' . $id_order);
  }
}

/* End of file Controllername.php */
