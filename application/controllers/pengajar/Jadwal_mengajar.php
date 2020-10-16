<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_mengajar extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Kelas_model');
        $this->load->model('Matapelajaran_model');
        $this->load->model('Jadwal_mengajar_model');

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
        $x['jadwal_mengajar'] = $this->Jadwal_mengajar_model->get_data();
        $x['mengajar_senin'] = $this->Jadwal_mengajar_model->get_data_senin($id);
        $x['mengajar_selasa'] = $this->Jadwal_mengajar_model->get_data_selasa($id);
        $x['mengajar_rabu'] = $this->Jadwal_mengajar_model->get_data_rabu($id);
        $x['mengajar_kamis'] = $this->Jadwal_mengajar_model->get_data_kamis($id);
        $x['mengajar_jumat'] = $this->Jadwal_mengajar_model->get_data_jumat($id);
        $x['mengajar_sabtu'] = $this->Jadwal_mengajar_model->get_data_sabtu($id);
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/pengajar/jadwal_mengajar/home', $x);
    }

    public function tambah_data()
    {
        $x['jadwal_mengajar'] = $this->Jadwal_mengajar_model->get_data();

        $this->template->load('layouts/template', 'content/pengajar/jadwal_mengajar/tambah_data', $x);
    }

    public function proses_tambah_data()
    {
        $this->Jadwal_mengajar_model->proses_tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/jadwal_mengajar');
    }

    public function edit_data($id)
    {
        $x['jadwal_mengajar'] = $this->Jadwal_mengajar_model->edit_data($id);

        $this->template->load('layouts/template', 'content/pengajar/jadwal_mengajar/edit_data', $x);
    }

    public function proses_edit_data()
    {
        $this->Jadwal_mengajar_model->proses_edit_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/jadwal_mengajar');
    }

    public function hapus_data($id)
    {
        $this->Jadwal_mengajar_model->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pengajar/jadwal_mengajar');
    }
}
