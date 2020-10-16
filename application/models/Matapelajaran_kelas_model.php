<?php
defined('BASEPATH') or exit('No direct script access allowed');

class matapelajaran_kelas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('matapelajaran_kelas');
        $this->db->join('kelas', 'kelas.id_kelas = matapelajaran_kelas.kelas_id');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = matapelajaran_kelas.matapelajaran_id');
        $this->db->order_by('kelas_id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }



    //Tampilkan matapelajaran sesuai dengan kelas
    public function get_data_kls()
    {
        $this->db->select('*');
        $this->db->from('matapelajaran_kelas');
        // $this->db->join('kelas', 'kelas.id_kelas = matapelajaran_kelas.kelas_id');
        //$this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = matapelajaran_kelas.matapelajaran_id');
        //$this->db->join('siswa', 'siswa.kelas_id = matapelajaran_kelas.kelas_id');
        //  $this->db->order_by('kelas_id', 'asc');
        $this->db->where('kelas_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function edit_data($id)
    {
        return $this->db->get_where('matapelajaran_kelas', ['id_matapelajaran_kelas' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "kelas_id" => $this->input->post('kelas_id'),
            "matapelajaran_id" => $this->input->post('matapelajaran_id'),
        ];

        $this->db->where('id_matapelajaran_kelas', $this->input->post('id_matapelajaran_kelas'));
        $this->db->update('matapelajaran_kelas', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_matapelajaran_kelas', $id);
        $this->db->delete('matapelajaran_kelas');
    }
}
