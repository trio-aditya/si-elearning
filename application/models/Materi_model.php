<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data($id)
    {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = materi.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = materi.kelas_id');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data($matapelajaran, $kelas)
    {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = materi.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = materi.kelas_id');
        // $this->db->join('pengajar', 'pengajar.user_id = materi.user_id');
        $this->db->where('matapelajaran_id', $matapelajaran);
        $this->db->where('kelas_id', $kelas);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail_data($id)
    {
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = materi.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = materi.kelas_id');
        $this->db->join('user', 'user.id_user = materi.user_id');
        return $this->db->get_where('materi', ['user_id' => $id])->result_array();
    }

    public function get_data_id($id)
    {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function edit_data($id)
    {
        $this->db->join('kelas', 'kelas.id_kelas = materi.kelas_id');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = materi.matapelajaran_id');
        return $this->db->get_where('materi', ['id_materi' => $id])->row_array();
    }

    //proses edit data tertulis
    public function proses_edit_data()
    {
        $user_id = $this->session->userdata('id_user');
        $data = [
            "user_id" => $user_id,
            "matapelajaran_id" => $this->input->post('matapelajaran_id'),
            "kelas_id" => $this->input->post('kelas_id'),
            "judul_materi" => $this->input->post('judul_materi'),
            "materi" => $this->input->post('materi'),
        ];

        $this->db->where('id_materi', $this->input->post('id_materi'));
        $this->db->update('materi', $data);
    }

    //digunakan untuk menampilkan data file
    public function editmateri($id)
    {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->where('id_materi', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //proses edit data file
    public function proses_edit_file()
    {
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            'matapelajaran_id' => $this->input->post('matapelajaran_id'),
            'kelas_id' => $this->input->post('kelas_id'),
            'judul_materi' => $this->input->post('judul_materi'),
            'materi' => $nama['upload_data']['file_name']
        ];

        $this->db->where('id_materi', $this->input->post('id_materi'));
        $this->db->update('materi', $data);
    }

    //digunakan untuk menampilkan data foto
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->where('id_materi', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_materi', $id);
        $this->db->delete('materi');
    }

    public function download($materi)
    {
        $query = $this->db->get_where('materi', array('materi' => $materi));
        return $query->row_array();
    }
}
