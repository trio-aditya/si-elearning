<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data($id)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('user', 'user.kelas_id = kelas.id_kelas');
        $this->db->where('id_kelas', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "kelas" => $this->input->post('kelas'),
        ];

        $this->db->insert('kelas', $data);
    }

    public function edit_data($id)
    {
        return $this->db->get_where('kelas', ['id_kelas' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "kelas" => $this->input->post('kelas'),
        ];

        $this->db->where('id_kelas', $this->input->post('id_kelas'));
        $this->db->update('kelas', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_kelas', $id);
        $this->db->delete('kelas');
    }
}
