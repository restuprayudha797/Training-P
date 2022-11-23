<?php



class Auth extends CI_Controller
{



    public function index()
    {


        $this->load->view('Templates/header');
        $this->load->view('Auth/login');
        $this->load->view('Templates/footer');
    }

    public function Register()
    {
        $this->load->view('Templates/header');
        $this->load->view('Auth/register');
        $this->load->view('Templates/footer');
    }
}
