<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Kelas_model');
        $this->load->model('Matapelajaran_model');
        $this->load->model('Materi_model');

        $this->check_login();
        if ($this->session->userdata('role_id') != '2') {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['materi'] = $this->Materi_model->get_data($id);
        $x['kelas'] = $this->Kelas_model->get_data($id);
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data($id);

        $this->template->load('layouts/template', 'content/pengajar/materi/home', $x);
    }

    public function tambah_data()
    {
        $x['materi'] = $this->Materi_model->get_data();

        $this->template->load('layouts/template', 'content/pengajar/materi/tambah_data', $x);
    }

    //Tambah Data Tertulis
    public function proses_tambah_data()
    {

        $user_id = $this->session->userdata('id_user');
        $matapelajaran_id = $this->input->post('matapelajaran_id');
        $kelas_id = $this->input->post('kelas_id');
        $judul_materi = $this->input->post('judul_materi');
        $materi = $this->input->post('materi');
        $tipe_materi = $this->input->post('tipe_materi');

        $kelas = array();
        foreach ($kelas_id as $key) {
            array_push($kelas, array(
                'user_id' => $user_id,
                'matapelajaran_id' => $matapelajaran_id,
                'kelas_id' => $key,
                'judul_materi' => $judul_materi,
                'materi' => $materi,
                'tipe_materi' => $tipe_materi
            ));
        }

        $data = $this->db->insert_batch('materi', $kelas);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/materi');
    }

    //Tambah Data berupa File
    public function proses_tambah_data_file()
    {

        $user_id = $this->session->userdata('id_user');
        $matapelajaran_id = $this->input->post('matapelajaran_id');
        $kelas_id = $this->input->post('kelas_id');
        $judul_materi = $this->input->post('judul_materi');
        $tipe_materi = $this->input->post('tipe_materi');

        $config['upload_path']          = './assets/upload/materi/';
        $config['allowed_types']        = 'doc|docx|rar|zip|txt|xls|xlsx|jpg|jpeg|JPG|JPEG|png|ppt|pptx|pdf';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('materi')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('pengajar/materi');
        } else {
            $data = array('upload_data' => $this->upload->data());

            $kelas = array();
            foreach ($kelas_id as $key) {
                array_push($kelas, array(
                    'user_id' => $user_id,
                    'matapelajaran_id' => $matapelajaran_id,
                    'kelas_id' => $key,
                    'judul_materi' => $judul_materi,
                    'materi' => $data['upload_data']['file_name'],
                    'tipe_materi' => $tipe_materi
                ));
            }
        }

        $data = $this->db->insert_batch('materi', $kelas);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/materi');
    }

    public function edit_data($id)
    {
        $x['materi'] = $this->Materi_model->edit_data($id);

        $this->template->load('layouts/template', 'content/pengajar/materi/edit_data', $x);
    }

    //edit data tertulis
    public function proses_edit_data()
    {
        $this->Materi_model->proses_edit_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/materi');
    }

    //proses edit data file
    public function proses_edit_data_file()
    {
        $id = $this->input->post('id_materi');
        $data = $this->Materi_model->editmateri($id);
        $nama = 'assets/upload/materi/' . $data['materi'];

        if (is_readable($nama) && unlink($nama)) {
            $matapelajaran_id = $this->input->post('matapelajaran_id');
            $kelas_id = $this->input->post('kelas_id');
            $judul_materi = $this->input->post('judul_materi');

            $config['upload_path']          = './assets/upload/materi/';
            $config['allowed_types']        = 'doc|docx|rar|zip|txt|xls|xlsx|jpg|jpeg|JPG|JPEG|png|ppt|pptx|pdf';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('materi')) {
                $data['error_upload'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', ' ');
                redirect('pengajar/materi');
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $name = $upload_data['materi'];

                $data = array(
                    'materi' => $name
                );

                $update = $this->Materi_model->proses_edit_file();

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('pengajar/materi');
            }
        }
    }

    //hapus data tertulis
    public function hapus_data($id)
    {
        $this->Materi_model->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/materi');
    }

    //hapus data file
    public function hapus_data_file($id)
    {
        $data = $this->Materi_model->hapus($id);
        $nama = 'assets/upload/materi/' . $data['materi'];

        if (is_readable($nama) && unlink($nama)) {
            $delete = $this->Materi_model->hapus_data($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('pengajar/materi');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('pengajar/materi');
        }
    }
}
