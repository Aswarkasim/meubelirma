<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index($role)
    {
        $user = $this->Crud_model->listingOneAll('tbl_user', 'role', $role);
        $data = [
            'title'     => 'Manajemen ' . $role,
            'add'      => 'admin/user/add/' . $role,
            'edit'      => 'admin/user/edit/',
            'delete'      => 'admin/user/delete/',
            'user'      => $user,
            'content'   => 'admin/user/index'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }



    function add($role)
    {

        $valid = $this->form_validation;

        $valid->set_rules('username', 'Nama User', 'required');
        $valid->set_rules('email', 'Email', 'required|is_unique[tbl_user.email]|valid_email');
        $valid->set_rules('password', 'Password', 'required');
        $valid->set_rules('re_password', 'Retype Password', 'required|matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Tambah ' . $role,
                'add'       => 'admin/user/add',
                'back'      => 'admin/user/index/' . $role,
                'content'   => 'admin/user/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'username'     => $i->post('username'),
                'email'         => $i->post('email'),
                'password'      => sha1($i->post('password')),
                'role'          => $role,
                'is_active'     => $i->post('is_aktif')
            ];
            $this->Crud_model->add('tbl_user', $data);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('admin/user/add/' . $role, 'refresh');
        }
    }

    function edit($id_user)
    {
        $user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);

        $valid = $this->form_validation;

        $valid->set_rules('username', 'Nama User', 'required');
        $valid->set_rules('email', 'Email', 'required|valid_email');
        $valid->set_rules('password', 'Password', 'matches[re_password]');
        $valid->set_rules('re_password', 'Retype Password', 'matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Edit ' . $user->username,
                'edit'       => 'admin/user/edit/',
                'back'      => 'admin/user/index/' . strtolower($user->role),
                'user'      => $user,
                'content'   => 'admin/user/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;

            $password = "";
            if ($i->post('password') != "") {
                $password = sha1($i->post('password'));
            } else {
                $password = $user->password;
            }
            $data = [
                'id_user'       => $id_user,
                'username'     => $i->post('username'),
                'email'         => $i->post('email'),
                'password'      => $password,
                'role'          => $user->role,
                'is_active'     => $i->post('is_aktif')
            ];
            $this->Crud_model->edit('tbl_user', 'id_user', $id_user, $data);
            $this->session->set_flashdata('msg', 'diedit');
            redirect('admin/user/edit/' . $id_user, 'refresh');
        }
    }

    function delete($id_user)
    {
        $role = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user)->role;
        $this->Crud_model->delete('tbl_user', 'id_user', $id_user);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/user/index/' . strtolower($role));
    }

    public function role()
    {
        $role = $this->Crud_model->listing('tbl_user_role');
        $data = [
            'add'       => 'roleAdd',
            'edit'      => 'roleEdit/',
            'delete'    => 'roleDelete/',
            'role'      => $role,
            'content'   => 'admin/role/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
