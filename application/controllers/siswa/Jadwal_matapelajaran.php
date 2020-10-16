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
        if ($this->session->userdata('role_id') != '3') {
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

        $this->template->load('layouts/template', 'content/siswa/jadwal_matapelajaran/home', $x);
    }

    //Selasa
    public function selasa()
    {
        $x['user'] = $this->session->userdata('id_user');
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['matpel_selasa'] = $this->Jadwal_matapelajaran_model->get_data_selasa();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/siswa/jadwal_matapelajaran/home', $x);
    }

    //Rabu
    public function rabu()
    {
        $x['user'] = $this->session->userdata('id_user');
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['matpel_rabu'] = $this->Jadwal_matapelajaran_model->get_data_rabu();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/siswa/jadwal_matapelajaran/home', $x);
    }

    //Kamis
    public function kamis()
    {
        $x['user'] = $this->session->userdata('id_user');
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['matpel_kamis'] = $this->Jadwal_matapelajaran_model->get_data_kamis();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/siswa/jadwal_matapelajaran/home', $x);
    }

    //Jumat
    public function jumat()
    {
        $x['user'] = $this->session->userdata('id_user');
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['matpel_jumat'] = $this->Jadwal_matapelajaran_model->get_data_jumat();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/siswa/jadwal_matapelajaran/home', $x);
    }

    //Sabtu
    public function sabtu()
    {
        $x['user'] = $this->session->userdata('id_user');
        $x['jadwal_matapelajaran'] = $this->Jadwal_matapelajaran_model->get_data();
        $x['matpel_sabtu'] = $this->Jadwal_matapelajaran_model->get_data_sabtu();
        $x['kelas'] = $this->Kelas_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/siswa/jadwal_matapelajaran/home', $x);
    }
}
