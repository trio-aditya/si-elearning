<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('pengajar');
        $this->db->join('user', 'user.id_user = pengajar.user_id');
        // $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = pengajar.matapelajaran_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data_matpel()
    {
        $this->db->select('*');
        $this->db->from('pengajar');
        $this->db->join('user', 'user.id_user = pengajar.user_id');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = pengajar.matapelajaran_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_count()
    {
        $this->db->select('*');
        $this->db->from('pengajar');
        $this->db->join('user', 'user.id_user = pengajar.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_active()
    {
        $this->db->select('*');
        $this->db->from('pengajar');
        $this->db->join('user', 'user.id_user = pengajar.user_id');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_disable()
    {
        $this->db->select('*');
        $this->db->from('pengajar');
        $this->db->join('user', 'user.id_user = pengajar.user_id');
        $this->db->where('status', 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function edit_data($id)
    {
        $this->db->join('user', 'user.id_user = pengajar.user_id');
        return $this->db->get_where('pengajar', ['id_pengajar' => $id])->row_array();
    }

    public function proses_edit_profil()
    {
        $data = [
            "nip" => $this->input->post('nip'),
            "nama" => $this->input->post('nama'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "agama" => $this->input->post('agama'),
            "alamat" => $this->input->post('alamat'),
        ];

        $this->db->where('id_pengajar', $this->input->post('id_pengajar'));
        $this->db->update('pengajar', $data);
    }

    public function proses_edit_foto()
    {
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            'foto' => $nama['upload_data']['file_name']
        ];

        $this->db->where('id_pengajar', $this->input->post('id_pengajar'));
        $this->db->update('pengajar', $data);
    }

    public function proses_edit_status()
    {
        $data = [
            "status" => $this->input->post('status'),
        ];

        $this->db->where('id_user', $this->input->post('user_id'));
        $this->db->update('user', $data);
    }

    //digunakan untuk menampilkan data foto
    public function editfoto($id)
    {
        $this->db->select('*');
        $this->db->from('pengajar');
        $this->db->where('id_pengajar', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //digunakan untuk menampilkan data foto
    public function hapusfoto($id)
    {
        $this->db->select('*');
        $this->db->from('pengajar');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_pengajar', $id);
        $this->db->delete('pengajar');
        $this->db->where('user_id', $id);
        $this->db->delete('pengajar');
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
}
