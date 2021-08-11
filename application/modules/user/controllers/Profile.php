<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  protected $base  = 'user/profile';
  protected $table = 'tbl_user';


  public function __construct()
  {
    parent::__construct();
    is_logged_in_user();
  }


  public function index()
  {

    $id_user = $this->session->userdata('id_user');
    $profile = $this->Crud_model->listingOne($this->table, 'id_user', $id_user);
    $data = [
      'profile'           => $profile,
      'content'           => 'user/profile/index'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function update()
  {
    $id_user = $this->session->userdata('id_user');
    $i = $this->input;
    $data = [
      'namalengkap'   => $i->post('namalengkap'),
      'email'         => $i->post('email'),
      'tgl_lahir'  => $i->post('tgl_lahir'),
      'gender'        => $i->post('gender'),
      'agama'        => $i->post('agama'),

      'alamat'          => $i->post('alamat'),
      'wa'          => $i->post('wa'),
      'tw'          => $i->post('tw'),
      'nohp'          => $i->post('nohp'),
      'ig'     => $i->post('ig'),
      'fb'      => $i->post('fb'),
    ];
    $this->Crud_model->edit($this->table, 'id_user', $id_user, $data);
    $this->session->set_flashdata('msg', 'Data profil diperbaharui');
    redirect($this->base, 'refresh');
  }


  function uploadFoto()
  {
    $id_user = $this->session->userdata('id_user');
    $profil = $this->Crud_model->listingOne($this->table, 'id_user', $id_user);
    if (!empty($_FILES['foto']['name'])) {
      $config['upload_path']   = './assets/uploads/images/';
      $config['allowed_types'] = 'gif|jpg|png|PNG|svg|jpeg|JPG|JPEG';
      $config['max_size']      = '100000'; // KB 
      $this->upload->initialize($config);

      if (!$this->upload->do_upload('foto')) {
        $this->upload->display_errors();
        redirect($this->base);
      } else {

        if ($profil->foto != "") {
          unlink($profil->foto);
        }
        $upload_data = ['uploads' => $this->upload->data()];
        $data = [
          'foto'        => $config['upload_path'] . $upload_data['uploads']['file_name']
        ];
        $this->Crud_model->edit($this->table, 'id_user', $id_user, $data);
        $this->session->set_flashdata('msg', 'Foto diperbaharui');
        redirect($this->base);
      }
    }
  }
}
