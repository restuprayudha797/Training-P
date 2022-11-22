<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{



    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');

        if ($this->session->userdata('is_active') == 1) {

            redirect('admin');
        } elseif ($this->session->userdata('is_active') == 2) {

            redirect('user');
        }
    }




    public function index()
    {

        $data['title'] = '';

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/head', $data);
            $this->load->view('templates/css');
            $this->load->view('Auth/login');
            $this->load->view('templates/foot');
        } else {


            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            // jika user ada


            if (password_verify($pass, $user['password'])) {

                if ($user['is_active'] == 1) {

                    $data = [
                        'nik' => $user['NIK'],
                        'is_active' => $user['is_active']
                    ];

                    $this->session->set_userdata($data);

                    redirect('admin');
                } else {

                    $data = [
                        'nik' => $user['NIK'],
                        'is_active' => $user['is_active']
                    ];
                    $this->session->set_userdata($data);

                    redirect('user');
                }
            } else {

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Password yang anda masukkan tidak sesuai
      </div>');


                redirect('auth');
            }
        } else {
            // jika user tidak ada

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Username tidak dapat di temukan!
      </div>');


            redirect('auth');
        }
    }


    public function register()
    {

        $data['title'] = 'Register';



        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|numeric|is_unique[user.NIK]', [

            'is_unique' => 'NIK SUDAH TERDAFTAR'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [

            'is_unique' => 'EMAIL SUDAH TERDAFTAR'
        ]);
        $this->form_validation->set_rules('notlp', 'Notlp', 'required|trim|numeric|is_unique[user.notlp]', [

            'is_unique' => 'NO TELEPHONE SUDAH TERDAFTAR'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password1]', [
            'matches' => 'password dont match!',

        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [

            'is_unique' => 'USERNAME SUDAH TERDAFTAR'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password]');



        if ($this->form_validation->run() == false) {

            $this->load->view('templates/head', $data);
            $this->load->view('templates/css');
            $this->load->view('Auth/register');
            $this->load->view('templates/foot');
        } else {



            $data = [

                'id' => null,
                'NIK' => $this->input->post('nik'),
                'nama' => $this->input->post('nama', true),
                'gambar' => 'default.jpg',
                'notlp' => $this->input->post('notlp', true),
                'email' => $this->input->post('email', true),
                'alamat' => $this->input->post('alamat', true),
                'username' => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 2,
                'tgl_daftar' => time()
            ];

            $this->db->insert('user', $data);


            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Akun baru berhasil dibuat
      </div>');
            redirect('auth');
        }
    }
}
