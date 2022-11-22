<?php

class User_model extends CI_Model
{



    public function updateProfile($data)
    {


        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $notlp = $this->input->post('notlp');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');


        // cek apakah ada gambar yang di upload

        $upload_gambar =   $_FILES['gambar']['name'];

        if ($upload_gambar) {

            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2024';
            $config['upload_path'] = './asset/images/profile';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $gambar_lama = $data['user']['gambar'];
                if ($gambar_lama != 'default.jpg') {

                    unlink(FCPATH . 'asset/images/profile/' . $gambar_lama);
                }

                $new_image = $this->upload->data('file_name');

                $this->db->set('gambar', $new_image);
            } else {

                echo $this->upload->display_errors();
            }
        }

        // akhir dari pengecakan gambar



        // update data ke data base
        $this->db->set('nama', $nama);
        $this->db->set('notlp', $notlp);
        $this->db->set('email', $email);
        $this->db->set('alamat', $alamat);
        $this->db->where('NIK', $nik);
        $this->db->update('user');
        // akhir dari update data ke database

    }




    // awal dari masukkan laporan

    public function MasukkanLaporan()
    {


        // Cek apakah user ada mengupload gambar
        $upload_bukti =   $_FILES['bukti']['name'];

        $bukti = 'kosong';

        if ($upload_bukti) {

            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2024';
            $config['upload_path'] = './asset/images/pelaporan';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bukti')) {

                $bukti = $this->upload->data('file_name');
            } else {

                echo $this->upload->display_errors();
            }
        }

        // akhir dari pengecekan gambar

        $data = [

            'id_pelaporan' => null,
            'judulLaporan' => $this->input->post('judulLaporan'),
            'laporan' => $this->input->post('laporan'),
            'bukti' => $bukti,
            'status' => 1,
            'NIK_user' => $this->session->userdata('nik'),
            'l_masuk' => time()


        ];

        $this->db->insert('pelaporan', $data);


        // $nik = $this->session->userdata('nik');

        // $tes = [

        //     'id_notifikasi' => null,
        //     'notif' => 'Terimakasih, Laporan anda sudah terkirim',
        //     'logo' => 'done',
        //     'title' => 'Terkirim',
        //     'warna' => 'success',
        //     'id_pelaporan' => 1,
        //     'NIK_user' => $nik,
        //     'n_masuk' => time()
        // ];

        // $this->db->insert('notifikasi', $tes);
    }

    // akhir dari laporan



    // awal dari ambil data notifikasi

    public function getNotif()
    {

        $nik = $this->session->userdata('nik');

        $queryNotifikasi = "SELECT * FROM notifikasi, pelaporan WHERE  notifikasi.id_pelaporan = pelaporan.id_pelaporan AND notifikasi.NIK_user = $nik ";

        return $notifikasi =  $this->db->query($queryNotifikasi)->result_array();
    }


    public function Proses()
    {

        $nik = $this->session->userdata('nik');

        $queryNotifikasi = "SELECT * FROM notifikasi, pelaporan WHERE  notifikasi.id_pelaporan = pelaporan.id_pelaporan AND notifikasi.NIK_user = $nik AND pelaporan.status = 2 ";

        return $notifikasi =  $this->db->query($queryNotifikasi)->result_array();
    }

    public function Selesai()
    {

        $nik = $this->session->userdata('nik');

        $queryNotifikasi = "SELECT * FROM notifikasi, pelaporan WHERE  notifikasi.id_pelaporan = pelaporan.id_pelaporan AND notifikasi.NIK_user = $nik AND pelaporan.status = 4 ";

        return $notifikasi =  $this->db->query($queryNotifikasi)->result_array();
    }

    public function Ditolak()
    {

        $nik = $this->session->userdata('nik');

        $queryNotifikasi = "SELECT * FROM notifikasi, pelaporan WHERE  notifikasi.id_pelaporan = pelaporan.id_pelaporan AND notifikasi.NIK_user = $nik AND pelaporan.status = 3 ";

        return $notifikasi =  $this->db->query($queryNotifikasi)->result_array();
    }

    // akhir dari ambil data notifikasi




}
