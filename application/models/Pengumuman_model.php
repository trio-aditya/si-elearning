<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('pengumuman');
        $this->db->join('user', 'user.id_user = pengumuman.user_id');
        $this->db->limit(5);
        $this->db->order_by('id_pengumuman', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countAllPengumuman()
    {
        return $this->db->get('pengumuman')->num_rows();
    }

    public function get_data_id($id)
    {
        $this->db->select('*');
        $this->db->from('pengumuman');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $user_id = $this->session->userdata('id_user');
        $data = [
            "user_id" => $user_id,
            "judul" => $this->input->post('judul'),
            "tanggal_tampil" => $this->input->post('tanggal_tampil'),
            "tanggal_selesai" => $this->input->post('tanggal_selesai'),
            "konten" => $this->input->post('konten'),
        ];

        $this->db->insert('pengumuman', $data);
    }

    public function edit_data($id)
    {
        return $this->db->get_where('pengumuman', ['id_pengumuman' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $user_id = $this->session->userdata('id_user');
        $data = [
            "user_id" => $user_id,
            "judul" => $this->input->post('judul'),
            "tanggal_tampil" => $this->input->post('tanggal_tampil'),
            "tanggal_selesai" => $this->input->post('tanggal_selesai'),
            "konten" => $this->input->post('konten'),
        ];

        $this->db->where('id_pengumuman', $this->input->post('id_pengumuman'));
        $this->db->update('pengumuman', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_pengumuman', $id);
        $this->db->delete('pengumuman');
    }
}
