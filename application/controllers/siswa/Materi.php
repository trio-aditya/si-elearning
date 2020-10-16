<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends MY_Controller
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
        $this->load->model('Materi_model');
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

        $this->template->load('layouts/template', 'content/siswa/materi/home', $x);
    }


    public function detail_data()
    {

        $matapelajaran = $this->input->post('matapelajaran_id');
        $kelas = $this->input->post('kelas_id');
        $x['materi'] = $this->Materi_model->data($matapelajaran, $kelas);

        $this->template->load('layouts/template', 'content/siswa/materi/detail_data', $x);
        //$this->load->view('content/sa/pengajar/edit_data', $x);
    }


    public function detail($id)
    {
        $matapelajaran = $this->input->post('matapelajaran_id');
        $kelas = $this->input->post('kelas_id');
        $x['matapelajaran'] = $this->Materi_model->data($matapelajaran, $kelas);
        $x['materi'] = $this->Materi_model->edit_data($id);

        $this->template->load('layouts/template', 'content/siswa/materi/detail', $x);
    }

    public function download($materi)
    {

        $fileinfo = $this->Materi_model->download($materi);
        $file = 'assets/upload/materi/' . $fileinfo['materi'];
        force_download($file, NULL);
    }
}
