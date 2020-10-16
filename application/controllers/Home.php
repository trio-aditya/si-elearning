<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{



  public function __construct()
  {
    parent::__construct();
    $this->check_login();

    $this->load->model('Auth_model');
    $this->load->model('User_model');
    $this->load->model('Kelas_model');
    $this->load->model('Pengajar_model');
    $this->load->model('Siswa_model');
    $this->load->model('Matapelajaran_model');
    $this->load->model('Pengumuman_model');

    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->time = date('Y-m-d H:i:s');
  }

  public function index()
  {


    $pengajar = $this->Pengajar_model->get_count();
    $siswa = $this->Siswa_model->get_count();
    $user = $this->User_model->get_count();
    $kelas = $this->Kelas_model->get_data();
    $matapelajaran = $this->Matapelajaran_model->get_data();

    $x['title'] = "E-Learning | SMANSATARA";
    $x['kelas'] = count($kelas);
    $x['pengajar'] = count($pengajar);
    $x['siswa'] = count($siswa);
    $x['user'] = count($user);
    $x['matapelajaran'] = count($matapelajaran);
    $this->template->load('layouts/template', 'content/home', $x);
  }

  public function pengajar()
  {

    $x['title'] = "E-Learning | SMANSATARA";
    $x['pengumuman'] = $this->Pengumuman_model->get_data();
    $this->template->load('layouts/template', 'content/home', $x);
  }

  public function siswa()
  {

    $x['title'] = "E-Learning | SMANSATARA";
    $x['pengumuman'] = $this->Pengumuman_model->get_data();
    $this->template->load('layouts/template', 'content/home', $x);
  }
}
