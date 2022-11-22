<?php

class User extends CI_Controller
{




    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('User_model');

        if ($this->session->userdata('is_active') == 1) {

            redirect('admin');
        } elseif ($this->session->userdata('nik') == null) {

            redirect('auth');
        }
    }


    public function index()
    {

        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('user/user_side/index');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function laporkan()
    {

        $data['title'] = 'Laporkan';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();


        $this->form_validation->set_rules('judulLaporan', 'Judullaporan', 'required|trim');
        $this->form_validation->set_rules('laporan', 'Laporan', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('user/user_side/laporkan');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/laporkan');
            $this->load->view('templates/footer');
        } else {



            $this->User_model->MasukkanLaporan($data);
            redirect('user/laporkan');
        }
    }

    public function profile()
    {

        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();



        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('notlp', 'Notlp', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');



        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('user/user_side/profile');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer');
        } else {


            $this->User_model->updateProfile($data);
            redirect('user/profile');
        }
    }



















    // awal dari fitur


    // notifikasi
    public function notifikasi()
    {

        $data['title'] = 'Notifikasi';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();

        $data['notifikasi'] = $this->User_model->getNotif();






        $this->load->view('templates/header', $data);
        $this->load->view('user/user_side/notifikasi');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/notifikasi', $data);
        $this->load->view('templates/footer');
    }

    // akhir dari notifikasi


    // awal dari proses
    public function Proses()
    {

        $data['title'] = 'Proses';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();

        $data['notifikasi'] = $this->User_model->Proses();

        $this->load->view('templates/header', $data);
        $this->load->view('user/user_side/proses');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/proses', $data);
        $this->load->view('templates/footer');
    }
    // akhir dari proses



    // awal dari selesai
    public function Laporan_selesai()
    {

        $data['title'] = 'Selesai';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();

        $data['notifikasi'] = $this->User_model->Selesai();

        // awal dari display

        $this->load->view('templates/header', $data);
        $this->load->view('user/user_side/selesai');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/selesai', $data);
        $this->load->view('templates/footer');

        // akhir dari display
    }
    // akhir dari selesai 




    // awal dari laporan di tolak
    public function Laporan_ditolak()
    {

        $data['title'] = 'Ditolak';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();
        $data['notifikasi'] = $this->User_model->Ditolak();



        $this->load->view('templates/header', $data);
        $this->load->view('user/user_side/ditolak');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/ditolak', $data);
        $this->load->view('templates/footer');
    }
    // akhir dari laporan di tolak


    // akhir dari fitur



    // awal dari fitur ganti password


    public function ganti()
    {

        $pwlama = $this->input->post('passwordlama');
        $pwbaru = $this->input->post('passwordbaru');
        $konfirmasi = $this->input->post('konfirmasi');




        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();

        $nik = $data['user']['NIK'];

        $username = $data['user']['username'];


        $userdata = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($userdata) {

            if (password_verify($pwlama, $userdata['password'])) {

                if ($pwbaru == $konfirmasi) {

                    $this->db->set('password', password_hash($pwbaru, PASSWORD_DEFAULT));
                    $this->db->where('NIK', $nik);
                    $this->db->update('user');
                    redirect('user');
                } else {

                    echo '<a href="http://localhost/pengaduan/user">Konfirmasi password salah</a>
                    ';
                }
            } else {

                echo '<a href="http://localhost/pengaduan/user">Password Lama Tidak Sesuai</a>';
            }
        } else {

            echo '<a href="http://localhost/pengaduan/user">Username Tidak dapat di temukan</a>';
        }
    }

    // akhir dari fitur ganti password
}
