<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in_user();
    // __is_complete_data_profile($id_user);
  }


  public function index()
  {
    $id_user = $this->session->userdata('id_user');
    $user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);

    $i = $this->input;

    $pass = sha1($i->post('password_lama'));
    $new_password = $i->post('password');
    $re_password = $i->post('re_password');


    if ($pass != $user->password) {
      $this->session->set_flashdata('msg_er', 'Password lama tidak sama');
      redirect('user/profile', 'refresh');
    } else if ($new_password != $re_password) {
      $this->session->set_flashdata('msg_er', 'Konfirmasi password tidak sama');
      redirect('user/profile', 'refresh');
    } else {
      $data = [
        'password'      => sha1($i->post('password'))
      ];
      $this->Crud_model->edit('tbl_user', 'id_user', $id_user, $data);
      $this->session->set_flashdata('msg', 'Password diubah');
      redirect('user/profile', 'refresh');
    }
  }
}

//VALIDASI PASSWORD

/* End of file Password.php */
