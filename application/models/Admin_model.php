<?php


class Admin_model extends CI_Model
{





    public function getPelaporan()
    {


        $queryLaporanMasuk = "SELECT * FROM pelaporan, user WHERE pelaporan.NIK_user = user.NIK AND pelaporan.status = 1 ";

        return $laporan =  $this->db->query($queryLaporanMasuk)->result_array();
    }
    public function getPelaporanproses()
    {


        $queryLaporanMasuk = "SELECT * FROM pelaporan, user WHERE pelaporan.NIK_user = user.NIK AND pelaporan.status = 2 ";

        return $laporan =  $this->db->query($queryLaporanMasuk)->result_array();
    }

    public function getPelaporanselesai()
    {


        $queryLaporanMasuk = "SELECT * FROM pelaporan, user WHERE pelaporan.NIK_user = user.NIK AND pelaporan.status = 4 ";

        return $laporan =  $this->db->query($queryLaporanMasuk)->result_array();
    }
    public function getPelaporantolak()
    {


        $queryLaporanMasuk = "SELECT * FROM pelaporan, user WHERE pelaporan.NIK_user = user.NIK AND pelaporan.status = 3 ";

        return $laporan =  $this->db->query($queryLaporanMasuk)->result_array();
    }







    // awal dari update status 1 ke status 2

    // awal dari proses data pelaporan
    public function Proses($id)
    {

        $getp = $this->db->get_where('pelaporan', ['id_pelaporan' => $id])->row_array();



        $this->db->set('status', '2');
        $this->db->where('id_pelaporan', $id);
        $this->db->update('pelaporan');


        // Cek apakah user ada mengupload gambar
        $upload_bukti =   $_FILES['bukti']['name'];

        $bukti = 'kosong';

        if ($upload_bukti) {

            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2024';
            $config['upload_path'] = './asset/images/bukti';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bukti')) {

                $bukti = $this->upload->data('file_name');
            } else {

                echo $this->upload->display_errors();
            }
        }

        // akhir dari pengecekan gambar

        $data = [

            'id_notifikasi' => null,
            'notif' => 'Terimakasih atas laporan nya, laporan anda saat ini sedang di proses',
            'logo' => 'sync',
            'title' => 'Proses',
            'warna' => 'info',
            'id_pelaporan' => $id,
            'NIK_user' => $getp['NIK_user'],
            'n_masuk' => time(),
            'progres' => $bukti
        ];

        $this->db->insert('notifikasi', $data);

        redirect('admin/laporan_masuk');
    }
    // akhir dari proses data pelaporan



    // awal dari Tolak data pelaporan

    public function Tolak($id)
    {
        $getp = $this->db->get_where('pelaporan', ['id_pelaporan' => $id])->row_array();

        $this->db->set('status', '3');
        $this->db->where('id_pelaporan', $id);
        $this->db->update('pelaporan');

        $data = [

            'id_notifikasi' => null,
            'notif' => 'Terimakasih atas laporan nya, sayangnya laporan anda saat ini tidak dapat kami terima',
            'logo' => 'not_interested',
            'title' => 'Ditolak',
            'warna' => 'danger',
            'id_pelaporan' => $id,
            'NIK_user' => $getp['NIK_user'],
            'n_masuk' => time()
        ];

        $this->db->insert('notifikasi', $data);

        redirect('admin/laporan_masuk');
    }

    // akhir dari Tolak data pelaporan


    // awal dari selesaikan laporan 

    public function Selesai($id)
    {

        $getp = $this->db->get_where('pelaporan', ['id_pelaporan' => $id])->row_array();


        $this->db->set('status', '4');
        $this->db->where('id_pelaporan', $id);
        $this->db->update('pelaporan');


        // Cek apakah user ada mengupload gambar
        $upload_bukti =   $_FILES['bukti']['name'];

        $bukti = 'kosong';

        if ($upload_bukti) {

            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2024';
            $config['upload_path'] = './asset/images/bukti';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bukti')) {

                $bukti = $this->upload->data('file_name');
            } else {

                echo $this->upload->display_errors();
            }
        }

        // akhir dari pengecekan gambar

        $data = [

            'id_notifikasi' => null,
            'notif' => 'Terimakasih atas kerja samanya, Laporan anda saat ini sudah selesai di proses',
            'logo' => 'done',
            'title' => 'Selesai',
            'warna' => 'success',
            'id_pelaporan' => $id,
            'NIK_user' => $getp['NIK_user'],
            'n_masuk' => time(),
            'progres' => $bukti
        ];

        $this->db->insert('notifikasi', $data);

        redirect('admin/laporan_proses');
    }

    // akhir dari selesaikan laporan






    // akhir dari update status 1 ke status 2




}
