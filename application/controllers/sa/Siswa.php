<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Core_model');
        $this->load->model('Siswa_model');
        $this->load->model('Auth_model');
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
        $x['siswa'] = $this->Siswa_model->get_data();
        $x['kelas'] = $this->Kelas_model->get_data();

        $this->template->load('layouts/template', 'content/sa/siswa/home', $x);
    }

    public function active()
    {
        $x['siswa'] = $this->Siswa_model->get_active();

        $this->template->load('layouts/template', 'content/sa/siswa/home', $x);
    }

    public function disable()
    {
        $x['siswa'] = $this->Siswa_model->get_disable();

        $this->template->load('layouts/template', 'content/sa/siswa/home', $x);
    }

    public function tambah_data()
    {
        $x['siswa'] = $this->Siswa_model->get_data();
        $x['kelas'] = $this->Kelas_model->get_data();

        $this->template->load('layouts/template', 'content/sa/siswa/tambah_data', $x);
    }

    public function proses_tambah_data()
    {
        $role_id = 3;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $session = $this->input->post('password');

        $this->form_validation->set_rules('username', 'required');
        $this->form_validation->set_rules('password', 'required');

        $config['upload_path']          = './assets/upload/siswa/';
        $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

        $cek = $this->Auth_model->cek_user($username);
        if ($cek > 0) {
            $response_array['status'] = 'error';
            $this->output->set_status_header(500);
            echo json_encode($response_array);
        } else {
            $tambah_siswa = array(
                'role_id' => $role_id,
                'username' => $username,
                'password' => get_hash($password),
                'session' => base64_encode($session),
                'status' => "1"
            );
        }

        $dataa = $this->Auth_model->insert($tambah_siswa);

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $data['error_upload'] = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', ' ');
            redirect('sa/siswa');
        } else {
            $data = array('upload_data' => $this->upload->data());

            if ($role_id == "3") {
                $detail_siswa = array(
                    'user_id' => $dataa,
                    'nipd' => $this->input->post('nipd'),
                    'nisn' => $this->input->post('nisn'),
                    'nama' => $this->input->post('nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'tahun_masuk' => $this->input->post('tahun_masuk'),
                    'kelas_id' => $this->input->post('kelas_id'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'agama' => $this->input->post('agama'),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this->input->post('no_telp'),
                    'foto' => $data['upload_data']['file_name']
                );
                $this->db->insert('siswa', $detail_siswa);
            }
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/siswa');
    }

    public function detail_data($id)
    {
        $x['siswa'] = $this->Siswa_model->edit_data($id);
        $x['kelas'] = $this->Kelas_model->get_data();

        $this->template->load('layouts/template', 'content/sa/siswa/detail_data', $x);
        //$this->load->view('content/sa/siswa/edit_data', $x);
    }

    public function proses_edit_profil()
    {
        $this->Siswa_model->proses_edit_profil();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/siswa');
    }

    public function proses_edit_foto()
    {
        $id = $this->input->post('id_siswa');
        $data = $this->Siswa_model->editfoto($id);
        $nama = 'assets/upload/siswa/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {
            $config['upload_path']          = './assets/upload/siswa/';
            $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';
            $config['max_size']             = '2048';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $data['error_upload'] = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', ' ');
                redirect('sa/siswa');
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $name = $upload_data['foto'];

                $data = array(
                    'foto' => $name
                );
                $update = $this->Siswa_model->proses_edit_foto();

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('sa/siswa');
            }
        }
    }

    public function proses_edit_status()
    {
        $this->Siswa_model->proses_edit_status();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sa/siswa');
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
        redirect('sa/siswa');
    }

    public function hapus_data($id)
    {
        $data = $this->Siswa_model->hapusfoto($id);
        $nama = 'assets/upload/siswa/' . $data['foto'];

        if (is_readable($nama) && unlink($nama)) {
            $delete = $this->Siswa_model->hapus_data($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/siswa');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('sa/siswa');
        }
    }
}
