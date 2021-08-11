<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'AM');
  }


  public function index()
  {
    $produk = $this->AM->listProduk();
    $data = [
      'title'    => 'List Produk',
      'add'    => 'admin/produk/add',
      'edit'    => 'admin/produk/edit/',
      'produk'   => $produk,
      'content'  => 'admin/produk/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function detail($id_produk)
  {


    // $produk = $this->AM->detailProduk($id_produk)->row();
    $produk = $this->Crud_model->listingOne('tbl_produk', 'id_produk', $id_produk);
    $data =
      [
        'produk'   =>  $produk,
        'content'  => 'admin/produk/detail'
      ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function add()
  {

    $this->load->helper('string');

    $kategori = $this->Crud_model->listing('tbl_kategori');

    $required = '%s tidak boleh kosong';
    $valid = $this->form_validation;
    $valid->set_rules('nama_produk', 'Nama Produk', 'required', ['required' => $required]);
    if ($valid->run()) {
      if (!empty($_FILES['gambar']['name'])) {
        $config['upload_path']   = './assets/uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('gambar')) {
          $data = [
            'title'    => 'Tambah Produk',
            'add'    => 'admin/produk/add',
            'edit'    => 'admin/produk/edit/',
            'back'    => 'admin/produk',
            'kategori'    => $kategori,
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/produk/add'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;

          $data = [
            'id_produk'       => random_string(),
            'id_kategori'     => $i->post('id_kategori'),
            'nama_produk'     => $i->post('nama_produk'),
            'deskripsi'       => $i->post('deskripsi'),
            'stok'            => $i->post('stok'),
            'harga'           => $i->post('harga'),
            'type'           => 'Umum',
            'gambar'          => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->add('tbl_produk', $data);

          $dataPenc = [
            'id_pencatatan'   => random_string(),
            'tanggal'         => date('Y-m-d'),
            'id_produk'       => $data['id_produk'],
            'nama_produk'     => $data['nama_produk'],
            'jumlah'          => $data['stok'],
            'type'            => 'Masuk',
            'total_harga'     => $data['stok'] * $data['harga']
          ];
          $this->Crud_model->add('tbl_pencatatan', $dataPenc);

          $konfigurasi = $this->Crud_model->listingOne('tbl_konfigurasi', 'id_konfigurasi', '1');
          __is_boolean('tbl_konfigurasi', 'id_konfigurasi', '1', 'saldo', $konfigurasi->saldo - $dataPenc['total_harga']);

          $this->session->set_flashdata('msg', 'Produk ditambahkan');
          redirect('admin/produk/detail/' . $data['id_produk']);
        }
      }
    }
    $data = [
      'title'    => 'Tambah Produk',
      'add'    => 'admin/produk/add',
      'edit'    => 'admin/produk/edit/',
      'back'    => 'admin/produk',
      'kategori'    => $kategori,
      'content'  => 'admin/produk/add'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function edit($id_produk)
  {

    $this->load->helper('string');

    $kategori = $this->Crud_model->listing('tbl_kategori');
    $produk = $this->Crud_model->listingOne('tbl_produk', 'id_produk', $id_produk);

    $required = '%s tidak boleh kosong';
    $valid = $this->form_validation;
    $valid->set_rules('nama_produk', 'Nama Produk', 'required', ['required' => $required]);
    if ($valid->run()) {
      if (!empty($_FILES['gambar']['name'])) {
        $config['upload_path']   = './assets/uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('gambar')) {
          $data = [
            'title'    => 'Edit Produk',
            'add'    => 'admin/produk/add',
            'edit'    => 'admin/produk/edit/',
            'back'    => 'admin/produk',
            'kategori'    => $kategori,
            'produk'    => $produk,
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/produk/add'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          if ($produk->gambar != '') {
            unlink($produk->gambar);
          }
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;

          $data = [
            'id_produk'       => $id_produk,
            'id_kategori'     => $i->post('id_kategori'),
            'nama_produk'     => $i->post('nama_produk'),
            'deskripsi'       => $i->post('deskripsi'),
            'stok'            => $i->post('stok'),
            'harga'           => $i->post('harga'),
            'type'           => 'Umum',
            'gambar'          => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->edit('tbl_produk', 'id_produk', $id_produk, $data);
          $this->session->set_flashdata('msg', 'Produk diedit');
          redirect('admin/produk/detail/' . $id_produk);
        }
      } else {
        $i = $this->input;

        $data = [
          'id_produk'       => $id_produk,
          'id_kategori'     => $i->post('id_kategori'),
          'nama_produk'     => $i->post('nama_produk'),
          'deskripsi'       => $i->post('deskripsi'),
          'stok'            => $i->post('stok'),
          'harga'           => $i->post('harga'),
          'type'           => 'Umum',
        ];
        $this->Crud_model->edit('tbl_produk', 'id_produk', $id_produk, $data);
        $this->session->set_flashdata('msg', 'Produk diedit');
        redirect('admin/produk/detail/' . $id_produk);
      }
    }
    $data = [
      'title'    => 'Edit Produk',
      'edit'    => 'admin/produk/edit/',
      'back'    => 'admin/produk',
      'kategori'    => $kategori,
      'produk'    => $produk,
      'content'  => 'admin/produk/add'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function delete($id_produk)
  {
    $d = $this->Crud_model->listingOne('tbl_produk', 'id_produk', $id_produk);
    if ($d->gambar != '') {
      unlink($d->gambar);
    }
    $this->Crud_model->delete('tbl_produk', 'id_produk', $id_produk);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('admin/produk');
  }
}
