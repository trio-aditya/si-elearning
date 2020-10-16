<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data($id)
    {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = tugas.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = tugas.kelas_id');
        $this->db->where('user_id', $id);
        $this->db->order_by('id_tugas', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data($matapelajaran, $kelas)
    {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = tugas.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = tugas.kelas_id');
        $this->db->where('matapelajaran_id', $matapelajaran);
        $this->db->where('kelas_id', $kelas);
        $this->db->order_by('id_tugas', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data_id($id)
    {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data_hapus($id)
    {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->where('id_tugas', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function edit_data($id)
    {
        $this->db->join('kelas', 'kelas.id_kelas = tugas.kelas_id');
        $this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = tugas.matapelajaran_id');
        // $this->db->join('jawaban', 'jawaban.tugas_id = tugas.id_tugas');
        return $this->db->get_where('tugas', ['id_tugas' => $id])->row_array();
    }

    //data user
    public function data_user($user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('siswa', 'siswa.user_id = user.id_user');
        $this->db->where('id_user', $user);
        $query = $this->db->get();
        return $query->row_array();
    }

    //lihat jawaban siswa
    public function list_jawaban($id)
    {
        $this->db->select('*');
        $this->db->from('tugas');
        //$this->db->join('matapelajaran', 'matapelajaran.id_matapelajaran = tugas.matapelajaran_id');
        $this->db->join('kelas', 'kelas.id_kelas = tugas.kelas_id');
        $this->db->join('jawaban', 'jawaban.tugas_id = tugas.id_tugas');
        //$this->db->join('siswa', 'siswa.kelas_id = kelas.id_kelas');
        $this->db->join('siswa', 'siswa.id_siswa = jawaban.siswa_id');
        // $this->db->join('nilai', 'nilai.tugas_id = tugas.id_tugas');
        //$this->db->join('jawaban', 'jawaban.siswa_id = siswa.id_siswa');
        $this->db->where('id_tugas', $id);
        //$this->db->where('siswa_id', $id_siswa);
        $query = $this->db->get();
        return $query->result_array();
    }

    //lihat jawaban siswa
    public function list_nilai($id)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('tugas', 'tugas.id_tugas = nilai.tugas_id');
        $this->db->where('id_tugas', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //download jawaban
    public function download_jawaban($jawaban)
    {
        $query = $this->db->get_where('jawaban', array('jawaban' => $jawaban));
        return $query->row_array();
    }

    //input nilai siswa
    public function input_nilai_siswa()
    {
        $user_id = $this->session->userdata('id_user');
        $data = [
            "user_id_pengajar" => $user_id,
            "user_id_siswa" => $this->input->post('user_id_siswa'),
            "tugas_id" => $this->input->post('tugas_id'),
            "jawaban_id" => $this->input->post('jawaban_id'),
            "nilai" => $this->input->post('nilai'),
        ];

        $this->db->insert('nilai', $data);
    }

    //edit nilai siswa
    public function edit_nilai()
    {
        $user_id = $this->session->userdata('id_user');
        $data = [
            "nilai" => $this->input->post('nilai'),
        ];

        $this->db->where('id_jawaban', $this->input->post('id_jawaban'));
        $this->db->update('jawaban', $data);
    }

    //count
    public function count_nilai($id)
    {

        $this->db->select('*');
        $this->db->select('count(*) AS total');
        $this->db->join('tugas', 'tugas.id_tugas = nilai.tugas_id');
        return $this->db->get_where('nilai', ['tugas_id' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $user_id = $this->session->userdata('id_user');
        $data = [
            "user_id" => $user_id,
            "matapelajaran_id" => $this->input->post('matapelajaran_id'),
            "kelas_id" => $this->input->post('kelas_id'),
            "judul_tugas" => $this->input->post('judul_tugas'),
            "tugas" => $this->input->post('tugas'),
            "waktu_terbit" => $this->input->post('waktu_terbit'),
            "waktu_tutup" => $this->input->post('waktu_tutup'),
        ];

        $this->db->where('id_tugas', $this->input->post('id_tugas'));
        $this->db->update('tugas', $data);
    }

    //digunakan untuk menampilkan data file
    public function edittugas($id)
    {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->where('id_tugas', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //proses edit file
    public function proses_edit_file()
    {
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            'matapelajaran_id' => $this->input->post('matapelajaran_id'),
            'kelas_id' => $this->input->post('kelas_id'),
            'judul_tugas' => $this->input->post('judul_tugas'),
            'tugas' => $nama['upload_data']['file_name'],
            'waktu_terbit' => $this->input->post('waktu_terbit'),
            'waktu_tutup' => $this->input->post('waktu_tutup')
        ];

        $this->db->where('id_tugas', $this->input->post('id_tugas'));
        $this->db->update('tugas', $data);
    }

    //isi jawaban
    public function isi_tugas()
    {
        //$user_id = $this->session->userdata('id_user');
        $data = [
            "user_id" => $this->input->post('user_id'),
            "siswa_id" => $this->input->post('siswa_id'),
            "tugas_id" => $this->input->post('tugas_id'),
            "jawaban" => $this->input->post('jawaban'),
            "tipe_jawaban" => $this->input->post('tipe_jawaban'),
            "nilai" => 0,
            "waktu_pengumpulan" => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('jawaban', $data);
    }

    //digunakan untuk menampilkan data file jawaban
    public function editjawaban($id)
    {
        $this->db->select('*');
        $this->db->from('jawaban');
        $this->db->where('id_jawaban', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //Edit Jawaban Tertulis
    public function proses_edit_jawaban()
    {
        $user_id = $this->session->userdata('id_user');
        $data = [
            "jawaban" => $this->input->post('jawaban'),
            "waktu_pengumpulan" => date('Y-m-d H:i:s'),
        ];

        $this->db->where('id_jawaban', $this->input->post('id_jawaban'));
        $this->db->update('jawaban', $data);
    }

    //proses edit data file
    public function proses_edit_jawaban_file()
    {
        $nama = array('upload_data' => $this->upload->data());
        $data = [
            'jawaban' => $nama['upload_data']['file_name']
        ];

        $this->db->where('id_jawaban', $this->input->post('id_jawaban'));
        $this->db->update('jawaban', $data);
    }

    /*lihat jawaban
    public function lihat_jawaban($id)
    {
        $this->db->join('tugas', 'tugas.id_tugas = jawaban.tugas_id');
        $this->db->join('siswa', 'siswa.id_siswa = jawaban.siswa_id');
        $this->db->join('user', 'user.id_user = siswa.user_id');
        return $this->db->get_where('jawaban', ['tugas_id' => $id])->row_array();
    }
    */

    //Lihat Jawaban
    public function lihat_jawaban($id, $user)
    {
        $this->db->select('*');
        $this->db->from('jawaban');
        $this->db->where('tugas_id', $id);
        $this->db->where('user_id', $user);
        $query = $this->db->get();
        return $query->row_array();
    }

    //count
    public function count_data($id, $user)
    {

        $this->db->select('*');
        $this->db->select('count(*) AS total');
        $this->db->from('jawaban');
        $this->db->where('tugas_id', $id);
        $this->db->where('user_id', $user);
        $query = $this->db->get();
        return $query->row_array();
    }

    //lihat jawaban
    public function lihat_nilai($id)
    {
        $this->db->join('tugas', 'tugas.id_tugas = nilai.tugas_id');
        return $this->db->get_where('nilai', ['tugas_id' => $id])->row_array();
    }

    //digunakan untuk menampilkan data foto
    public function hapus($id)
    {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->where('id_tugas', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id_tugas', $id);
        $this->db->delete('tugas');
    }

    public function download($tugas)
    {
        $query = $this->db->get_where('tugas', array('tugas' => $tugas));
        return $query->row_array();
    }

    //Hapus Jawaban
    public function hapus_jawaban($id)
    {
        $this->db->where('id_jawaban', $id);
        $this->db->delete('jawaban');
    }
}
