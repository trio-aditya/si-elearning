<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Kelas_model');

        $this->check_login();
        if ($this->session->userdata('role_id') != '1') {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $x['kelas'] = $this->Kelas_model->get_data();

        $this->template->load('layouts/template', 'content/sa/kelas/home', $x);
    }

    public function tambah_data()
    {
        $x['kelas'] = $this->Kelas_model->get_data();

        $this->template->load('layouts/template', 'content/sa/kelas/tambah_data', $x);
    }

    public function proses_tambah_data()
    {
        $this->Kelas_model->proses_tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/kelas');
    }

    public function edit_data($id)
    {
        $x['kelas'] = $this->Kelas_model->edit_data($id);

        $this->template->load('layouts/template', 'content/sa/kelas/edit_data', $x);
    }

    public function proses_edit_data()
    {
        $this->Kelas_model->proses_edit_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/kelas');
    }

    public function hapus_data($id)
    {
        $this->Kelas_model->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/kelas');
    }
}
