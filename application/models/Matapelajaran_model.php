<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matapelajaran_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('matapelajaran');
        $this->db->order_by('matapelajaran', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "matapelajaran" => $this->input->post('matapelajaran'),
        ];

        $this->db->insert('matapelajaran', $data);
    }

    public function detail_data($id)
    {
        // $this->db->join('materi', 'materi.matapelajaran_id = matapelajaran.id_matapelajaran');
        return $this->db->get_where('matapelajaran', ['id_matapelajaran' => $id])->row_array();
    }

    public function edit_data($id)
    {
        return $this->db->get_where('matapelajaran', ['id_matapelajaran' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "matapelajaran" => $this->input->post('matapelajaran'),
        ];

        $this->db->where('id_matapelajaran', $this->input->post('id_matapelajaran'));
        $this->db->update('matapelajaran', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_matapelajaran', $id);
        $this->db->delete('matapelajaran');
    }
}
