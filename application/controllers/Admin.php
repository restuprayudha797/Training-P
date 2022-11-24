<?php

class Admin extends CI_Controller
{



    public function index()
    {


        $this->load->view('Templates/header-admin');
        $this->load->view('admin/index');
        $this->load->view('Templates/footer-admin');
    }
}
