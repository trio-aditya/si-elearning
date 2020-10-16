<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('User_model');
        $this->load->model('Auth_model');
        $this->load->model('Core_model');
        $this->load->model('Kelas_model');

        $this->check_login();
        if ($this->session->userdata('role_id') != '1') {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function semua_user()
    {
        $x['user'] = $this->User_model->get_data();
        $x['role'] = $this->Core_model->get_role();
        $x['pengajar'] = $this->Core_model->get_pengajar();
        $x['siswa'] = $this->Core_model->get_siswa();
        $this->template->load('layouts/template', 'content/sa/user/home', $x);
    }

    public function tambah_data()
    {
        $x['user'] = $this->User_model->get_data();
        $x['role'] = $this->Core_model->get_role();
        $this->template->load('layouts/template', 'content/sa/user/tambah_data', $x);
    }

    public function proses_tambah_data()
    {
        $this->User_model->proses_tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/user/semua_user');
    }

    public function edit_data($id)
    {
        $x['user'] = $this->User_model->edit_data($id);

        $this->template->load('layouts/template', 'content/sa/user/edit_data', $x);
    }

    public function proses_edit_data()
    {
        $this->User_model->proses_edit_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/user/semua_user');
    }

    public function hapus_data($id)
    {
        $this->User_model->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/user/semua_user');
    }
}
