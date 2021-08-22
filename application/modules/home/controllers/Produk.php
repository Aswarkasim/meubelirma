<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in_user();
    $this->load->model('home/Home_model', 'HM');
  }


  public function index($id_kategori = null)
  {
    $id_user = $this->session->userdata('id_user');
    $role = $this->session->userdata('role');
    $kategori  = $this->Crud_model->listing('tbl_kategori');


    $this->load->library('pagination');

    if ($role === 'Pemasok') {
      $count = $this->Crud_model->listingOneAll('tbl_produk', 'id_user', $id_user);
    } else if ($role === 'Pembeli') {
      $count = $this->HM->getProdukByType('Pemasok');
    } else {
      $count = $this->HM->getProdukByType('Umum');
    }

    $config['base_url']     = base_url('home/produk/index/');
    $config['total_rows']   = count($count);
    $config['per_page']     = 12;

    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);

    if ($role === 'Pemasok') {
      $produk = $this->HM->listByUser('tbl_produk', $id_user, $config['per_page'], $from);
    } else if ($role === 'Pembeli') {
      $produk = $this->HM->listAll('tbl_produk', 'Pemasok', $config['per_page'], $from);
    } else {
      $produk = $this->HM->listAll('tbl_produk', 'Umum', $config['per_page'], $from);
    }

    $data = [
      'kategori'  => $kategori,
      'produk'  => $produk,
      'pagination' => $this->pagination->create_links(),
      'id_active' => $id_kategori,
      'content'  => 'home/produk/index'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function kategori($id_kategori)
  {
    $id_user = $this->session->userdata('id_user');
    $kategori = $this->Crud_model->listing('tbl_kategori');
    $role = $this->session->userdata('role');

    if ($role === 'Pemasok') {
      $produk = $this->HM->listProductByPemasok($id_user, $id_kategori);
    } else if ($role === 'Pembeli') {
      $produk = $this->HM->listProductByKategori('Pemasok', $id_kategori);
    } else {
      $produk = $this->HM->listProductByKategori('Umum', $id_kategori);
    }
    $data = [
      'kategori'  => $kategori,
      'produk'  => $produk,
      'id_active' => $id_kategori,
      'content'  => 'home/produk/index'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }
  function detail($id_produk)
  {
    $id_user = $this->session->userdata('id_user');
    $produk = $this->Crud_model->listingOne('tbl_produk', 'id_produk', $id_produk);
    $cekKeranjang = $this->HM->cekKeranjang($id_user, $id_produk);
    $data = [
      'produk'   => $produk,
      'cekKeranjang'   => $cekKeranjang,
      'content'  => 'home/produk/detail'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function add()
  {
    $this->load->helper('string');

    $id_user = $this->session->userdata('id_user');

    $kategori = $this->Crud_model->listing('tbl_kategori');

    $valid = $this->form_validation;

    $valid->set_rules(
      'nama_produk',
      'Nama Tugas',
      'required',
      array('required' => ' %s harus diisi')
    );
    if ($valid->run()) {
      if (!empty($_FILES['gambar']['name'])) {
        $config['upload_path']   = './assets/uploads/images/';
        $config['allowed_types'] = 'PNG|png|jpg|jpeg|JPG|JPEG';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('gambar')) {
          $data = [
            'kategori'      => $kategori,
            'error'             => $this->upload->display_errors(),
            'content'  => 'home/layout/wrapper_user'
          ];
          $this->load->view('home/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;

          $data = [
            'id_produk'   => random_string(),
            'id_user'     => $id_user,
            'id_kategori'   => $i->post('id_kategori'),
            'nama_produk'   => $i->post('nama_produk'),
            'deskripsi'   => $i->post('deskripsi'),
            'harga'   => $i->post('harga'),
            'stok'   => $i->post('stok'),
            'type'      => 'Pemasok',
            'gambar'          => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->add('tbl_produk', $data);
          $this->session->set_flashdata('msg', ' Tugas telah ditambah');
          redirect('home/produk', 'refresh');
        }
      }
    }
    $data = [
      'kategori'      => $kategori,
      'content'  => 'home/produk/add'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }
}

/* End of file Controllername.php */
