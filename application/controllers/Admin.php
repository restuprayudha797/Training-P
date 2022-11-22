<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class Admin extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('Admin_model');

        if ($this->session->userdata('is_active') == 2) {

            redirect('user');
        } elseif ($this->session->userdata('is_active') == null) {

            redirect('auth');
        }
    }



    public function index()
    {







        $data['title'] = 'Home';

        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();
        $data['masuk'] = $this->Admin_model->getPelaporan();
        $data['proses'] = $this->Admin_model->getPelaporanproses();
        $data['tolak'] = $this->Admin_model->getPelaporantolak();
        $data['selesai'] = $this->Admin_model->getPelaporanselesai();





        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin_side/home');
        $this->load->view('templates/topbar');
        $this->load->view('Admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function laporan_proses()
    {

        $data['title'] = 'Proses';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();
        $data['laporan'] = $this->Admin_model->getPelaporanproses();


        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin_side/proses');
        $this->load->view('templates/topbar');
        $this->load->view('Admin/proses');
        $this->load->view('templates/footer');
    }



    public function Laporan_masuk()
    {
        $data['title'] = 'Laporan';

        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();

        $data['laporan'] = $this->Admin_model->getPelaporan();


        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin_side/masuk');
        $this->load->view('templates/topbar');
        $this->load->view('Admin/Laporan_masuk');
        $this->load->view('templates/footer');
    }

    public function Laporan_selesai()
    {


        $data['title'] = 'Laporan Selesai';

        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();
        $data['laporan'] = $this->Admin_model->getPelaporanselesai();


        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin_side/selesai');
        $this->load->view('templates/topbar');
        $this->load->view('Admin/selesai');
        $this->load->view('templates/footer');
    }

    public function Laporan_ditolak()
    {

        $data['title'] = 'Laporan Ditolak';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('nik')])->row_array();

        $data['laporan'] = $this->Admin_model->getPelaporantolak();



        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin_side/ditolak');
        $this->load->view('templates/topbar');
        $this->load->view('Admin/ditolak');
        $this->load->view('templates/footer');
    }

























    // awal dari action

    public  function Proses_action($id)
    {


        $this->Admin_model->Proses($id);
        die;
    }

    public  function Tolak_action($id)
    {


        $this->Admin_model->Tolak($id);
    }

    public  function Selesai_action($id)
    {


        $this->Admin_model->Selesai($id);
    }








    // awal dari function print


    // akhir dari function print

    // akhir dari action


    public function print()
    {

        $queryLaporanMasuk = "SELECT * FROM pelaporan, user WHERE pelaporan.NIK_user = user.NIK";

        $pelaporan =  $this->db->query($queryLaporanMasuk)->result_array();





        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach (range('A', 'F') as $columID) {
        }

        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'NIK');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'LAPORAN');
        $sheet->setCellValue('E1', 'STATUS');
        $sheet->setCellValue('F1', 'MASUK');



        $i = 1;
        $x = 2;


        foreach ($pelaporan as $laporan) {

            if ($laporan['status'] == 1) {

                $status = 'Menunggu';
            } elseif ($laporan['status'] == 2) {
                $status = 'Proses';
            } elseif ($laporan['status'] == 3) {
                $status = 'Ditolak';
            } elseif ($laporan['status'] == 4) {
                $status = 'Selesai';
            }


            $sheet->setCellValue('A' . $x, $i++);
            $sheet->setCellValue('B' . $x, $laporan['NIK']);
            $sheet->setCellValue('C' . $x, $laporan['nama']);
            $sheet->setCellValue('D' . $x, $laporan['laporan']);
            $sheet->setCellValue('E' . $x, $status);
            $sheet->setCellValue('F' . $x, date('d F Y', $laporan['l_masuk']));

            $x++;
        }







        $writer = new Xlsx($spreadsheet);
        $fileName = 'laporanPengaduan.xlsx';


        header('Content-Type: apliction/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        $writer->save('php://output');


        redirect('admin');
        exit;
    }
}
