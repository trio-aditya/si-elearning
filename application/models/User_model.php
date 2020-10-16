<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role', 'role.id_role = user.role_id');
        $this->db->join('siswa', 'siswa.user_id = user.id_user');
        $this->db->join('pengajar', 'pengajar.user_id = user.id_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_count()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role', 'role.id_role = user.role_id');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function cek_user($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();

        return $query->num_rows();
        # code...
    }

    public function proses_tambah_data()
    {
        $role_id = $this->input->post('role_id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $session = $this->input->post('password');

        $this->form_validation->set_rules('role_id', 'required');
        $this->form_validation->set_rules('username', 'required');
        $this->form_validation->set_rules('password', 'required');

        $cek = $this->User_model->cek_user($username);
        if ($cek > 0) {
            $response_array['status'] = 'error';
            $this->output->set_status_header(500);
            echo json_encode($response_array);
        } else {
            $tambah_user = array(
                'role_id' => $role_id,
                'username' => $username,
                'password' => get_hash($password),
                'session' => base64_encode($session),
                'status' => "1"
            );
        }

        $data = $this->db->insert('user', $tambah_user);

        if ($role_id == "2") {
            $detail_pengajar = array(
                'user_id' => $data,
            );
            $this->db->insert('pengajar', $detail_pengajar);
        }

        if ($role_id == "3") {
            $detail_siswa = array(
                'user_id' => $data,
            );
            $this->db->insert('siswa', $detail_siswa);
        }
    }

    public function edit_data($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "user" => $this->input->post('user'),
        ];

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
}
