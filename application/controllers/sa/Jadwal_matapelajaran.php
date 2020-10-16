<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_matapelajaran extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Kelas_model');
        $this->load->model('Matapelajaran_model');
        $this->load->model('Jadwal_matapelajaran_model');

        $this->check_login();
        if ($this->session->userdata('role_id') != '1') {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    //Senin
    public function index()
    {
        //$id = $this->session->userdata('id_user');
        $x['user'] = $this->session->userdata('id_user');
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['matpel_senin'] = $this->Jadwal_matapelajaran_model->get_data_senin();
        $x['matpel_selasa'] = $this->Jadwal_matapelajaran_model->get_data_selasa();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/sa/jadwal_matapelajaran/home', $x);
    }

    //Selasa
    public function selasa()
    {
        $x['user'] = $this->session->userdata('id_user');
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['matpel_selasa'] = $this->Jadwal_matapelajaran_model->get_data_selasa();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/sa/jadwal_matapelajaran/home', $x);
    }

    //Rabu
    public function rabu()
    {
        $x['user'] = $this->session->userdata('id_user');
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['matpel_rabu'] = $this->Jadwal_matapelajaran_model->get_data_rabu();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/sa/jadwal_matapelajaran/home', $x);
    }

    //Kamis
    public function kamis()
    {
        $x['user'] = $this->session->userdata('id_user');
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['matpel_kamis'] = $this->Jadwal_matapelajaran_model->get_data_kamis();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/sa/jadwal_matapelajaran/home', $x);
    }

    //Jumat
    public function jumat()
    {
        $x['user'] = $this->session->userdata('id_user');
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['matpel_jumat'] = $this->Jadwal_matapelajaran_model->get_data_jumat();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/sa/jadwal_matapelajaran/home', $x);
    }

    //Sabtu
    public function sabtu()
    {
        $x['user'] = $this->session->userdata('id_user');
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['matpel_sabtu'] = $this->Jadwal_matapelajaran_model->get_data_sabtu();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/sa/jadwal_matapelajaran/home', $x);
    }

    public function tambah_data()
    {
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data_selasa();
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data_rabu();
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data_kamis();
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data_jumat();
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data_sabtu();

        $this->template->load('layouts/template', 'content/sa/jadwal_matapelajaran/tambah_data', $x);
    }

    public function proses_tambah_data()
    {
        $this->Jadwal_matapelajaran_model->proses_tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        $hari = $this->input->post('hari');
        if ($hari == 'senin') {
            redirect('sa/jadwal_matapelajaran');
        } elseif ($hari == 'selasa') {
            redirect('sa/jadwal_matapelajaran/selasa');
        } elseif ($hari == 'rabu') {
            redirect('sa/jadwal_matapelajaran/rabu');
        } elseif ($hari == 'kamis') {
            redirect('sa/jadwal_matapelajaran/kamis');
        } elseif ($hari == 'jumat') {
            redirect('sa/jadwal_matapelajaran/jumat');
        } else {
            redirect('sa/jadwal_matapelajaran/sabtu');
        }
    }

    public function edit_data($id)
    {
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->edit_data($id);

        $this->template->load('layouts/template', 'content/sa/jadwal_matapelajaran/edit_data', $x);
    }

    public function proses_edit_data()
    {
        $this->Jadwal_matapelajaran_model->proses_edit_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/jadwal_matapelajaran');
    }

    public function hapus_data($id)
    {
        $this->Jadwal_matapelajaran_model->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/jadwal_matapelajaran');
    }
}
