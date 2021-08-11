<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {

        $data = [
            'content'  => 'home/home/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        // $this->load->view('home/index');
    }
}
