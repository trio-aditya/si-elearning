<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matapelajaran_kelas extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Kelas_model');
        $this->load->model('Matapelajaran_model');
        $this->load->model('Matapelajaran_kelas_model');

        $this->check_login();
        if ($this->session->userdata('role_id') != '1') {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $x['matapelajaran_kelas'] = $this->Matapelajaran_kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();
        $x['kelas'] = $this->Kelas_model->get_data();

        $this->template->load('layouts/template', 'content/sa/matapelajaran_kelas/home', $x);
    }

    public function tambah_data()
    {
        $x['matapelajaran_kelas'] = $this->Matapelajaran_kelas_model->get_data();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/sa/matapelajaran_kelas/tambah_data', $x);
    }

    public function proses_tambah_data()
    {
        $matapelajaran_id = $this->input->post('matapelajaran_id');
        $kelas_id = $this->input->post('kelas_id');

        $kelas = array();
        foreach ($kelas_id as $key) {
            array_push($kelas, array(
                'matapelajaran_id' => $matapelajaran_id,
                'kelas_id' => $key
            ));
        }

        $data = $this->db->insert_batch('matapelajaran_kelas', $kelas);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/matapelajaran_kelas');
    }

    public function edit_data($id)
    {
        $x['matapelajaran_kelas'] = $this->Matapelajaran_kelas_model->edit_data($id);
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/sa/matapelajaran_kelas/edit_data', $x);
    }

    public function proses_edit_data()
    {
        $this->Matapelajaran_kelas_model->proses_edit_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/matapelajaran_kelas');
    }

    public function hapus_data($id)
    {
        $this->Matapelajaran_kelas_model->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/matapelajaran_kelas');
    }
}
