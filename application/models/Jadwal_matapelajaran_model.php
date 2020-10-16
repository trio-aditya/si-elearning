<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_matapelajaran_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('jadwal_matapelajaran');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_matapelajaran.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_matapelajaran.kelas_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Senin
    public function get_data_senin()
    {
        $this->db->select('*');
        $this->db->from('jadwal_matapelajaran');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_matapelajaran.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_matapelajaran.kelas_id');
        $this->db->where('hari', 'senin');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Senin
    public function senin($kelas)
    {
        $this->db->select('*');
        $this->db->from('jadwal_matapelajaran');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_matapelajaran.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_matapelajaran.kelas_id');
        // $this->db->join('user', 'user.id_user = siswa.user_id');
        //$this->db->join('siswa', 'siswa.kelas_id = kelas.id_kelas');

        //$this->db->where('id_user', $id);
        $this->db->where('id_kelas', $kelas);
        $this->db->where('hari', 'senin');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Selasa
    public function get_data_selasa()
    {
        $this->db->select('*');
        $this->db->from('jadwal_matapelajaran');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_matapelajaran.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_matapelajaran.kelas_id');
        $this->db->where('hari', 'selasa');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Rabu
    public function get_data_rabu()
    {
        $this->db->select('*');
        $this->db->from('jadwal_matapelajaran');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_matapelajaran.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_matapelajaran.kelas_id');
        $this->db->where('hari', 'rabu');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Kamis
    public function get_data_kamis()
    {
        $this->db->select('*');
        $this->db->from('jadwal_matapelajaran');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_matapelajaran.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_matapelajaran.kelas_id');
        $this->db->where('hari', 'kamis');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Jum'at
    public function get_data_jumat()
    {
        $this->db->select('*');
        $this->db->from('jadwal_matapelajaran');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_matapelajaran.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_matapelajaran.kelas_id');
        $this->db->where('hari', 'jumat');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Sabtu
    public function get_data_sabtu()
    {
        $this->db->select('*');
        $this->db->from('jadwal_matapelajaran');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = jadwal_matapelajaran.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_matapelajaran.kelas_id');
        $this->db->where('hari', 'sabtu');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data_id($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_matapelajaran');
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

        $this->db->insert('jadwal_matapelajaran', $data);
    }

    public function edit_data($id)
    {
        return $this->db->get_where('jadwal_matapelajaran', ['id_jadwal_matapelajaran' => $id])->row_array();
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

        $this->db->where('id_jadwal_matapelajaran', $this->input->post('id_jadwal_matapelajaran'));
        $this->db->update('jadwal_matapelajaran', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id_jadwal_matapelajaran', $id);
        $this->db->delete('jadwal_matapelajaran');
    }
}
