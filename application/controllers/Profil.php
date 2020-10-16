<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends MY_Controller
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
        $this->load->model('Profil_model');
        $this->load->model('Matapelajaran_model');
        $this->load->model('Pengumuman_model');

        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->time = date('Y-m-d H:i:s');
    }

    public function detail($id)
    {
        $x['siswa'] = $this->Profil_model->edit_data($id);
        $x['kelas'] = $this->Kelas_model->get_data();

        $this->template->load('layouts/template', 'content/profil', $x);
        //$this->load->view('content/sa/pengajar/edit_data', $x);
    }

    //detail pengajar
    public function detail_pengajar($id)
    {
        $x['pengajar'] = $this->Profil_model->edit_data_pengajar($id);

        $this->template->load('layouts/template', 'content/profil_pengajar', $x);
        //$this->load->view('content/sa/pengajar/edit_data', $x);
    }

    //edit profil siswa
    public function proses_edit_profil_siswa()
    {
        $id = $this->input->post('id_user');
        $x['siswa'] = $this->Profil_model->edit_data($id);
        $x['kelas'] = $this->Kelas_model->get_data();

        $this->Siswa_model->proses_edit_profil();
        redirect('home/siswa');
    }

    //edit profil pengajar
    public function proses_edit_profil_pengajar()
    {
        $this->Pengajar_model->proses_edit_profil();

        redirect('home/pengajar');
    }

    //edit foto siswa
    public function proses_edit_foto_siswa()
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
                redirect('home/siswa');
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
                redirect('home/siswa');
            }
        }
    }

    //edit foto pengajar
    public function proses_edit_foto_pengajar()
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
                redirect('home/pengajar');
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
                redirect('home/pengajar');
            }
        }
    }

    //edit user siswa
    public function proses_edit_user_siswa()
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
        redirect('home/siswa');
    }

    //edit user pengajar
    public function proses_edit_user_pengajar()
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
        redirect('home/pengajar');
    }
}
