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
        $this->load->model('Pengajar_model');

        $this->check_login();
        if ($this->session->userdata('role_id') != '2') {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $x['pengajar'] = $this->Pengajar_model->get_data();

        $this->template->load('layouts/template', 'content/sa/pengajar/home', $x);
    }
}
