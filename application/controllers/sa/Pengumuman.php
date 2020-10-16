<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Pengumuman_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['pengumuman'] = $this->Pengumuman_model->get_data_id($id);



        $this->template->load('layouts/template', 'content/sa/pengumuman/home', $x);
    }

    public function tambah_data()
    {
        $x['pengumuman'] = $this->Pengumuman_model->get_data();

        $this->template->load('layouts/template', 'content/sa/pengumuman/tambah_data', $x);
    }

    public function proses_tambah_data()
    {
        $this->Pengumuman_model->proses_tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pengumuman');
    }

    public function edit_data($id)
    {
        $x['pengumuman'] = $this->Pengumuman_model->edit_data($id);

        $this->template->load('layouts/template', 'content/sa/pengumuman/edit_data', $x);
    }

    public function proses_edit_data()
    {
        $this->Pengumuman_model->proses_edit_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pengumuman');
    }

    public function detail($id)
    {
        $x['pengumuman'] = $this->Pengumuman_model->edit_data($id);

        $this->template->load('layouts/template', 'content/sa/pengumuman/detail', $x);
    }

    public function hapus_data($id)
    {
        $this->Pengumuman_model->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pengumuman');
    }
}
