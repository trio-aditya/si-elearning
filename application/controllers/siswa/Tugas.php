<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Kelas_model');
        $this->load->model('Siswa_model');
        $this->load->model('Matapelajaran_kelas_model');
        $this->load->model('Tugas_model');
        $this->load->model('Matapelajaran_model');

        $this->check_login();
        if ($this->session->userdata('role_id') != '3') {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $user = $this->session->userdata('id_user');
        $x['matapelajaran'] = $this->Siswa_model->get_data_kelas($user);

        $this->template->load('layouts/template', 'content/siswa/tugas/home', $x);
    }


    public function detail_data()
    {

        $matapelajaran = $this->input->post('matapelajaran_id');
        $kelas = $this->input->post('kelas_id');
        $x['tugas'] = $this->Tugas_model->data($matapelajaran, $kelas);

        $this->template->load('layouts/template', 'content/siswa/tugas/detail_data', $x);
        //$this->load->view('content/sa/pengajar/edit_data', $x);
    }


    public function detail($id)
    {

        $user = $this->session->userdata('id_user');
        $matapelajaran = $this->input->post('matapelajaran_id');
        $kelas = $this->input->post('kelas_id');
        $id_siswa = $this->input->post('id_siswa');

        //$judul = $this->input->post('judul_tugas');
        $x['matapelajaran'] = $this->Tugas_model->data($matapelajaran, $kelas);
        $x['tugas'] = $this->Tugas_model->edit_data($id);
        $x['data_user'] = $this->Tugas_model->data_user($user);
        $x['jawab'] = $this->Tugas_model->lihat_jawaban($id, $user);
        $x['count'] = $this->Tugas_model->count_data($id, $user);

        $this->template->load('layouts/template', 'content/siswa/tugas/detail', $x);
    }

    //Isi Jawaban
    public function isi_tugas()
    {
        $id = $this->input->post('id_tugas');

        $this->Tugas_model->isi_tugas();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Jawaban berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('siswa/tugas/detail/' . $id);
    }

    //Isi Jawaban File
    public function isi_tugas_file()
    {
        $id = $this->input->post('id_tugas');

        $user_id = $this->input->post('user_id');
        $siswa_id = $this->input->post('siswa_id');
        $tugas_id = $this->input->post('tugas_id');
        $tipe_jawaban = $this->input->post('tipe_jawaban');

        $config['upload_path']          = './assets/upload/jawaban/';
        $config['allowed_types']        = 'doc|docx|rar|zip|txt|xls|xlsx|jpg|jpeg|JPG|JPEG|png|ppt|pptx|pdf';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('jawaban')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('siswa/tugas/detail/' . $id);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $dataa = [
                "user_id" => $user_id,
                "siswa_id" => $siswa_id,
                "tugas_id" => $tugas_id,
                "jawaban" => $data['upload_data']['file_name'],
                "tipe_jawaban" => $tipe_jawaban,
                "waktu_pengumpulan" => date('Y-m-d H:i:s'),
            ];
        }

        $this->db->insert('jawaban', $dataa);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('siswa/tugas/detail/' . $id);
    }

    //Edit Jawaban
    public function edit_jawaban()
    {
        $id = $this->input->post('id_tugas');

        $this->Tugas_model->proses_edit_jawaban();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Jawaban berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('siswa/tugas/detail/' . $id);
    }

    //proses edit data file
    public function proses_jawaban_file()
    {
        $id = $this->input->post('id_jawaban');
        $id_tugas = $this->input->post('id_tugas');
        $data = $this->Tugas_model->editjawaban($id);
        $nama = 'assets/upload/jawaban/' . $data['jawaban'];

        if (is_readable($nama) && unlink($nama)) {

            $config['upload_path']          = './assets/upload/jawaban/';
            $config['allowed_types']        = 'doc|docx|rar|zip|txt|xls|xlsx|jpg|jpeg|JPG|JPEG|png|ppt|pptx|pdf';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('jawaban')) {
                $data['error_upload'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', ' ');
                redirect('siswa/tugas/detail/' . $id_tugas);
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $name = $upload_data['jawaban'];

                $data = array(
                    'jawaban' => $name
                );

                $update = $this->Tugas_model->proses_edit_jawaban_file();

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('siswa/tugas/detail/' . $id_tugas);
            }
        }
    }

    public function lihat_jawaban($id)
    {
        $matapelajaran = $this->input->post('matapelajaran_id');
        $kelas = $this->input->post('kelas_id');
        $tugas = $this->input->post('tugas_id');

        //$judul = $this->input->post('judul_tugas');
        $x['matapelajaran'] = $this->Tugas_model->data($matapelajaran, $kelas);
        $x['tugas'] = $this->Tugas_model->edit_data($id);
        $x['jawab'] = $this->Tugas_model->lihat_jawaban($id);

        $this->template->load('layouts/template', 'content/siswa/tugas/detail', $x);
    }

    public function download($tugas)
    {

        $fileinfo = $this->Tugas_model->download($tugas);
        $file = 'assets/upload/tugas/' . $fileinfo['tugas'];
        force_download($file, NULL);
    }

    //Hapus Jawaban
    public function hapus_jawaban($id)
    {
        $id_tugas = $this->input->post('id_tugas');

        $this->Tugas_model->hapus_jawaban($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('siswa/tugas/detail/' . $id_tugas);
    }
}
