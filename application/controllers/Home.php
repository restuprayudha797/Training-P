<?php 


class Home extends CI_Controller{



    public function index(){



$this->load->view('templates/headerHome');
$this->load->view('Home/index');
$this->load->view('templates/footerHome');

    }

    public function lo(){


        $data = ['nik' => '', 'is_active' => ''];
        $this->session->unset_userdata($data);
        
        $this->session->sess_destroy();
        
    
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
       Anda Telah Berhasil Logout
      </div>');
    
        redirect('auth');
    
    
    
    }





}
