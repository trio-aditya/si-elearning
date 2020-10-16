<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Pengajar_model');
        $this->load->model('Matapelajaran_model');
        $this->load->model('Auth_model');

        $this->check_login();
        if ($this->session->userdata('role_id') != '1') {
            redirect('', 'refresh');
        }

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $x['pengajar'] = $this->Pengajar_model->get_data();
        $x['matapelajaran'] = $this->Matapelajaran_model->get_data();

        $this->template->load('layouts/template', 'content/sa/pengajar/home', $x);
    }

    public function active()
    {
        $x['pengajar'] = $this->Pengajar_model->get_active();

        $this->template->load('layouts/template', 'content/sa/pengajar/home', $x);
    }

    public function disable()
    {
        $x['pengajar'] = $this->Pengajar_model->get_disable();

        $this->template->load('layouts/template', 'content/sa/pengajar/home', $x);
    }

    public function tambah_data()
    {
        $x['pengajar'] = $this->Pengajar_model->data_matpel();

        $this->template->load('layouts/template', 'content/sa/pengajar/tambah_data', $x);
    }

    public function proses_tambah_data()
    {
        $role_id = 2;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $session = $this->input->post('password');

        $this->form_validation->set_rules('role_id', 'required');
        $this->form_validation->set_rules('username', 'required');
        $this->form_validation->set_rules('password', 'required');

        $config['upload_path']          = './assets/upload/pengajar/';
        $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

        $cek = $this->Auth_model->cek_user($username);
        if ($cek > 0) {
            $response_array['status'] = 'error';
            $this->output->set_status_header(500);
            echo json_encode($response_array);
        } else {
            $tambah_pengajar = array(
                'role_id' => $role_id,
                'username' => $username,
                'password' => get_hash($password),
                'session' => base64_encode($session),
                'status' => "1"
            );
        }

        $dataa = $this->Auth_model->insert($tambah_pengajar);

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('sa/pengajar');
        } else {
            $data = array('upload_data' => $this->upload->data());

            if ($role_id == "2") {
                $detail_pengajar = array(
                    'user_id' => $dataa,
                    'nip' => $this->input->post('nip'),
                    'nama' => $this->input->post('nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    //'matapelajaran_id' => $this->input->post('matapelajaran_id'),
                    'agama' => $this->input->post('agama'),
                    'alamat' => $this->input->post('alamat'),
                    'foto' => $data['upload_data']['file_name']
                );
                $this->db->insert('pengajar', $detail_pengajar);
            }
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pengajar');
    }


    public function detail_data($id)
    {
        $x['pengajar'] = $this->Pengajar_model->edit_data($id);

        $this->template->load('layouts/template', 'content/sa/pengajar/detail_data', $x);
        //$this->load->view('content/sa/pengajar/edit_data', $x);
    }

    public function proses_edit_profil()
    {
        $this->Pengajar_model->proses_edit_profil();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pengajar');
    }

    public function proses_edit_foto()
    {
        $id = $this->input->post('id_pengajar');
        $data = $this->Pengajar_model->editfoto($id);
        $nama = 'assets/upload/pengajar/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {
            $config['upload_path']          = './assets/upload/pengajar/';
            $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';
            $config['max_size']             = '2048';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $data['error_upload'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', ' ');
                redirect('sa/pengajar');
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $name = $upload_data['foto'];

                $data = array(
                    'foto' => $name
                );
                $update = $this->Pengajar_model->proses_edit_foto();

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('sa/pengajar');
            }
        }
    }

    public function proses_edit_status()
    {
        $this->Pengajar_model->proses_edit_status();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pengajar');
    }

    public function proses_edit_user()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $session = $this->input->post('password');

        $this->form_validation->set_rules('username', 'required');
        $this->form_validation->set_rules('password', 'required');

        $cek = $this->Auth_model->cek_user($username);
        if ($cek > 0) {
            $response_array['status'] = 'error';
            $this->output->set_status_header(500);
            echo json_encode($response_array);
        } else {
            $edit_user = array(
                'username' => $username,
                'password' => get_hash($password),
                'session' => base64_encode($session)
            );
        }

        $this->db->where('id_user', $this->input->post('user_id'));
        $this->db->update('user', $edit_user);


        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/pengajar');
    }

    public function hapus_data($id)
    {
        $data = $this->Pengajar_model->hapusfoto($id);
        $nama = 'assets/upload/pengajar/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {
            $delete = $this->Pengajar_model->hapus_data($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/pengajar');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/pengajar');
        }
    }
}
