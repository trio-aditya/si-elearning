<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_mengajar_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('jadwal_mengajar');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_mengajar.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_mengajar.kelas_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Senin
    public function get_data_senin($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_mengajar');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_mengajar.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_mengajar.kelas_id');
        $this->db->where('hari', 'senin');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Selasa
    public function get_data_selasa($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_mengajar');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_mengajar.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_mengajar.kelas_id');
        $this->db->where('hari', 'selasa');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Rabu
    public function get_data_rabu($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_mengajar');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_mengajar.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_mengajar.kelas_id');
        $this->db->where('hari', 'rabu');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Kamis
    public function get_data_kamis($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_mengajar');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_mengajar.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_mengajar.kelas_id');
        $this->db->where('hari', 'kamis');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Jum'at
    public function get_data_jumat($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_mengajar');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_mengajar.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_mengajar.kelas_id');
        $this->db->where('hari', 'jumat');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Sabtu
    public function get_data_sabtu($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_mengajar');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_mengajar.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_mengajar.kelas_id');
        $this->db->where('hari', 'sabtu');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data_id($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_mengajar');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $user_id = $this->session->userdata('id_user');
        $data = [
            "user_id" => $user_id,
            "kelas_id" => $this->input->post('kelas_id'),
            "matapelajaran_id" => $this->input->post('matapelajaran_id'),
            "hari" => $this->input->post('hari'),
            "jam_mulai" => $this->input->post('jam_mulai'),
            "jam_selesai" => $this->input->post('jam_selesai'),
        ];

        $this->db->insert('jadwal_mengajar', $data);
    }

    public function edit_data($id)
    {
        return $this->db->get_where('jadwal_mengajar', ['id_jadwal_mengajar' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $user_id = $this->session->userdata('id_user');
        $data = [
            "user_id" => $user_id,
            "kelas_id" => $this->input->post('kelas_id'),
            "matapelajaran_id" => $this->input->post('matapelajaran_id'),
            "jam_mulai" => $this->input->post('jam_mulai'),
            "jam_selesai" => $this->input->post('jam_selesai'),
        ];

        $this->db->where('id_jadwal_mengajar', $this->input->post('id_jadwal_mengajar'));
        $this->db->update('jadwal_mengajar', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_jadwal_mengajar', $id);
        $this->db->delete('jadwal_mengajar');
    }
}
