<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function edit_data($id)
    {
        $this->db->join('siswa', 'siswa.user_id = user.id_user');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id');
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function edit_data_pengajar($id)
    {
        $this->db->join('pengajar', 'pengajar.user_id = user.id_user');
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }
}
