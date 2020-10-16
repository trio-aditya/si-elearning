<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Kelas_model');
        $this->load->model('Matapelajaran_model');
        $this->load->model('Tugas_model');

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
        $x['tugas'] = $this->Tugas_model->get_data($id);
        $x['kelas'] = $this->Kelas_model->get_data($id);
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data($id);

        $this->template->load('layouts/template', 'content/pengajar/tugas/home', $x);
    }

    public function tambah_data()
    {
        $x['tugas'] = $this->Tugas_model->get_data();

        $this->template->load('layouts/template', 'content/pengajar/tugas/tambah_data', $x);
    }

    public function proses_tambah_data()
    {
        $user_id = $this->session->userdata('id_user');
        $matapelajaran_id = $this->input->post('matapelajaran_id');
        $kelas_id = $this->input->post('kelas_id');
        $judul_tugas = $this->input->post('judul_tugas');
        $tugas = $this->input->post('tugas');
        $waktu_terbit = $this->input->post('waktu_terbit');
        $waktu_tutup = $this->input->post('waktu_tutup');
        $tipe_tugas = $this->input->post('tipe_tugas');

        $kelas = array();
        foreach ($kelas_id as $key) {
            array_push($kelas, array(
                'user_id' => $user_id,
                'matapelajaran_id' => $matapelajaran_id,
                'kelas_id' => $key,
                'judul_tugas' => $judul_tugas,
                'tugas' => $tugas,
                'waktu_terbit' => $waktu_terbit,
                'waktu_tutup' => $waktu_tutup,
                'tipe_tugas' => $tipe_tugas
            ));
        }

        $data = $this->db->insert_batch('tugas', $kelas);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/tugas');
    }

    //Tambah Data berupa File
    public function proses_tambah_data_file()
    {

        $user_id = $this->session->userdata('id_user');
        $matapelajaran_id = $this->input->post('matapelajaran_id');
        $kelas_id = $this->input->post('kelas_id');
        $judul_tugas = $this->input->post('judul_tugas');
        $waktu_terbit = $this->input->post('waktu_terbit');
        $waktu_tutup = $this->input->post('waktu_tutup');
        $tipe_tugas = $this->input->post('tipe_tugas');

        $config['upload_path']          = './assets/upload/tugas/';
        $config['allowed_types']        = 'doc|docx|rar|zip|txt|xls|xlsx|jpg|jpeg|JPG|JPEG|png|ppt|pptx|pdf';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('tugas')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('pengajar/tugas');
        } else {
            $data = array('upload_data' => $this->upload->data());

            $kelas = array();
            foreach ($kelas_id as $key) {
                array_push($kelas, array(
                    'user_id' => $user_id,
                    'matapelajaran_id' => $matapelajaran_id,
                    'kelas_id' => $key,
                    'judul_tugas' => $judul_tugas,
                    'tugas' => $data['upload_data']['file_name'],
                    'waktu_terbit' => $waktu_terbit,
                    'waktu_tutup' => $waktu_tutup,
                    'tipe_tugas' => $tipe_tugas
                ));
            }
        }

        $data = $this->db->insert_batch('tugas', $kelas);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/tugas');
    }

    public function edit_data($id)
    {
        $x['tugas'] = $this->Tugas_model->edit_data($id);

        $this->template->load('layouts/template', 'content/pengajar/tugas/edit_data', $x);
    }

    //Proses edit data tertulis
    public function proses_edit_data()
    {
        $this->Tugas_model->proses_edit_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/tugas');
    }

    //proses edit data file
    public function proses_edit_file()
    {
        $id = $this->input->post('id_tugas');
        $data = $this->Tugas_model->edittugas($id);
        $nama = 'assets/upload/tugas/' . $data['tugas'];

        if (is_readable($nama) && unlink($nama)) {

            $config['upload_path']          = './assets/upload/tugas/';
            $config['allowed_types']        = 'doc|docx|rar|zip|txt|xls|xlsx|jpg|jpeg|JPG|JPEG|png|ppt|pptx|pdf';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('tugas')) {
                $data['error_upload'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', ' ');
                redirect('pengajar/tugas');
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $name = $upload_data['tugas'];

                $data = array(
                    'tugas' => $name
                );

                $update = $this->Tugas_model->proses_edit_file();

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('pengajar/tugas');
            }
        }
    }

    public function list_jawaban($id)
    {

        $x['jawaban'] = $this->Tugas_model->list_jawaban($id);
        $x['nilai'] = $this->Tugas_model->list_nilai($id);
        $x['count'] = $this->Tugas_model->count_nilai($id);
        $this->template->load('layouts/template', 'content/pengajar/tugas/lihat_jawaban', $x);
    }

    public function download_jawaban($jawaban)
    {

        $fileinfo = $this->Tugas_model->download_jawaban($jawaban);
        $file = 'assets/upload/jawaban/' . $fileinfo['jawaban'];
        force_download($file, NULL);
    }

    public function input_nilai_siswa()
    {
        $id = $this->input->post('tugas_id');
        $this->Tugas_model->input_nilai_siswa();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Nilai siswa berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/tugas/list_jawaban/' . $id);
    }

    //edit nilai siswa
    public function edit_nilai()
    {
        $id = $this->input->post('tugas_id');

        $this->Tugas_model->edit_nilai();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Nilai berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/tugas/list_jawaban/' . $id);
    }

    //hapus data tertulis
    public function hapus_data_tertulis($id)
    {
        $this->Tugas_model->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/tugas');
    }

    //hapus data file
    public function hapus_data($id)
    {
        $data = $this->Tugas_model->hapus($id);
        $nama = 'assets/upload/tugas/' . $data['tugas'];

        if (is_readable($nama) && unlink($nama)) {
            $delete = $this->Tugas_model->hapus_data($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('pengajar/tugas');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('pengajar/tugas');
        }
    }
}
