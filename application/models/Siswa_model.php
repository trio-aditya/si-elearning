<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_count()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id');
        $this->db->join('user', 'user.id_user = siswa.user_id');
        //   $this->db->join('materi', 'materi.kelas_id = siswa.kelas_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data_kelas($id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id');
        $this->db->join('matapelajaran_kelas', 'matapelajaran_kelas.kelas_id = siswa.kelas_id');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = matapelajaran_kelas.matapelajaran_id');
        //  $this->db->join('materi', 'materi.matapelajaran_id = matapelajaran.id_matapelajaran');
        $this->db->join('user', 'user.id_user = siswa.user_id');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_active()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id');
        $this->db->join('user', 'user.id_user = siswa.user_id');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_disable()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id');
        $this->db->join('user', 'user.id_user = siswa.user_id');
        $this->db->where('status', 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "siswa" => $this->input->post('siswa'),
        ];

        $this->db->insert('siswa', $data);
    }

    public function edit_data($id)
    {
        $this->db->join('user', 'user.id_user = siswa.user_id');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id');
        return $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
    }

    public function proses_edit_profil()
    {
        $data = [
            "nipd" => $this->input->post('nipd'),
            "nisn" => $this->input->post('nisn'),
            "nama" => $this->input->post('nama'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "tahun_masuk" => $this->input->post('tahun_masuk'),
            "kelas_id" => $this->input->post('kelas_id'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "agama" => $this->input->post('agama'),
            "alamat" => $this->input->post('alamat'),
            "no_telp" => $this->input->post('no_telp'),
        ];

        $this->db->where('id_siswa', $this->input->post('id_siswa'));
        $this->db->update('siswa', $data);
    }

    public function proses_edit_foto()
    {
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            'foto' => $nama['upload_data']['file_name']
        ];

        $this->db->where('id_siswa', $this->input->post('id_siswa'));
        $this->db->update('siswa', $data);
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
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //digunakan untuk menampilkan data foto
    public function hapusfoto($id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('siswa');
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
}
