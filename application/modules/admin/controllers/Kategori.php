<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // is_logged_in_admin();
  }


  public function index()
  {
    $tombol  = [
      'add'     => 'admin/kategori/add',
      'edit'    => 'admin/kategori/edit/',
      'delete'  => 'admin/kategori/delete/'
    ];

    $kategori = $this->Crud_model->listing('tbl_kategori');
    $data = [

      'kategori' => $kategori,
      'tombol'   => $tombol,
      'content' => 'admin/kategori/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function add()
  {

    $this->load->helper('string');

    $valid = $this->form_validation;
    $valid->set_rules('id_kategori', 'Kode Kaategori', 'macthes[tbl_kategori.id_kategori]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    $valid->set_rules('nama_kategori', 'Nama Kaategori', 'macthes[tbl_kategori.nama_kategori]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_kategori'   => $i->post('nama_kategori'),
        'id_kategori'   => random_string()
      ];
      $this->Crud_model->add('tbl_kategori', $data);
      $this->session->set_flashdata('msg', 'kategori berhasil ditambah');
      redirect('admin/kategori');
    }
  }
  function edit($id_kategori)
  {
    $valid = $this->form_validation;
    // $valid->set_rules('id_kategori', 'Kode Kaategori', 'macthes[tbl_kategori.id_kategori]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
    // $valid->set_rules('nama_kategori', 'Nama Kaategori', 'macthes[tbl_kategori.nama_kategori]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


    if ($valid->run() === TRUE) {
      $this->index();
    } else {
      $i = $this->input;
      $data = [
        'nama_kategori'   => $i->post('nama_kategori'),
        'id_kategori'   => $id_kategori,
      ];
      $this->Crud_model->edit('tbl_kategori', 'id_kategori', $id_kategori, $data);
      $this->session->set_flashdata('msg', 'kategori berhasil diedit');
      redirect('admin/kategori');
    }
  }

  function delete($id_kategori)
  {
    $this->Crud_model->delete('tbl_kategori', 'id_kategori', $id_kategori);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('admin/kategori');
  }
}
