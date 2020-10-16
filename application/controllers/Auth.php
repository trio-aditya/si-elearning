<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('Auth_model');
    $this->load->model('Pengajar_model');
    $this->load->model('Siswa_model');
    $this->load->model('Kelas_model');
    $this->load->model('User_model');
    $this->load->model('Kelas_model');
    $this->load->model('Matapelajaran_model');
    $this->load->model('Pengumuman_model');
    $this->load->helper('tgl_indo');
  }

  public function check_account()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $query = $this->Auth_model->check_account($username, $password);

    if ($query === 1) {
      $this->session->set_flashdata(
        'alert',
        '<div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            Username tidak terdaftar
        </div>'
      );
    } elseif ($query === 2) {
      $this->session->set_flashdata(
        'alert',
        '<div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            Akun anda tidak dapat diakses hubungi admin
        </div>'
      );
    } elseif ($query === 3) {
      $this->session->set_flashdata(
        'alert',
        '<div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            Password yang anda masukan salah
        </div>'
      );
    } else {
      $userdata = array(
        'is_login'    => true,
        'id_user'     => $query->id_user,
        'role_id'     => $query->role_id,
        'password'    => $query->password,
        'username'    => $query->username,
        'status'      => $query->status,
        'session'     => $query->session
      );
      $this->session->set_userdata($userdata);
      return true;
    }
  }

  public function login()
  {

    if ($this->session->userdata('role_id') == '1') {
      redirect('home');
    }
    if ($this->session->userdata('role_id') == '2') {
      redirect('pengajar/home');
    }
    if ($this->session->userdata('role_id') == '3') {
      redirect('siswa/home');
    }

    if ($this->input->post('submit')) {
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
      $error = $this->check_account();

      if ($this->session->userdata() > 0) {
        $update_data = array(
          "masuk" => date('Y-m-d H:i:s'),
          "session" => base64_encode($_POST['password']),
        );
        $update_status  = $this->Auth_model->update_data('user', 'username', $username, $update_data);
      }

      if ($this->form_validation->run() && $error === true) {
        $data = $this->Auth_model->check_account($this->input->post('username'), $this->input->post('password'));

        //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
        if ($data->role_id == '1') {
          redirect('home');
        } elseif ($data->role_id == '2') {
          redirect('home/pengajar');
        } elseif ($data->role_id == '3') {
          redirect('home/siswa');
        }
      } else {
        $this->load->view('welcome');
      }
    } else {
      $this->load->view('welcome');
    }
  }

  public function register_pengajar()
  {
    $x['pengajar'] = $this->Pengajar_model->get_data();

    $this->load->view('register_pengajar');
  }

  public function register_siswa()
  {
    $x['siswa'] = $this->Siswa_model->get_data();
    $x['kelas'] = $this->Kelas_model->get_data();

    $this->load->view('register_siswa', $x);
  }

  public function proses_register_pengajar()
  {
    $role_id = 2;
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $session = $this->input->post('password');

    $this->form_validation->set_rules('role_id', 'required');
    $this->form_validation->set_rules('username', 'required');
    $this->form_validation->set_rules('password', 'required');

    $config['upload_path']          = './assets/upload/pengajar/';
    $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

    $cek = $this->Auth_model->cek_user($username);
    if ($cek > 0) {
      $response_array['status'] = 'error';
      $this->output->set_status_header(500);
      echo json_encode($response_array);
    } else {
      $tambah_pengajar = array(
        'role_id' => $role_id,
        'username' => $username,
        'password' => get_hash($password),
        'session' => base64_encode($session),
        'status' => "0"
      );
    }

    $dataa = $this->Auth_model->insert($tambah_pengajar);

    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('foto')) {
      $data['error_upload'] = array('error' => $this->upload->display_errors());
      $this->session->set_flashdata('error', ' ');
      redirect('auth/login');
    } else {
      $data = array('upload_data' => $this->upload->data());

      if ($role_id == "2") {
        $detail_pengajar = array(
          'user_id' => $dataa,
          'nip' => $this->input->post('nip'),
          'nama' => $this->input->post('nama'),
          'jenis_kelamin' => $this->input->post('jenis_kelamin'),
          'tempat_lahir' => $this->input->post('tempat_lahir'),
          'tanggal_lahir' => $this->input->post('tanggal_lahir'),
          //'matapelajaran_id' => $this->input->post('matapelajaran_id'),
          'agama' => $this->input->post('agama'),
          'alamat' => $this->input->post('alamat'),
          'foto' => $data['upload_data']['file_name']
        );
        $this->db->insert('pengajar', $detail_pengajar);
      }
    }

    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Register anda berhasil! Harap menunggu pengaktifan akun oleh admin!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    redirect('auth/login');
  }

  public function proses_register_siswa()
  {
    $role_id = 3;
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $session = $this->input->post('password');

    $this->form_validation->set_rules('username', 'required');
    $this->form_validation->set_rules('password', 'required');

    $config['upload_path']          = './assets/upload/siswa/';
    $config['allowed_types']        = 'jpg|jpeg|JPG|JPEG|png';

    $cek = $this->Auth_model->cek_user($username);
    if ($cek > 0) {
      $response_array['status'] = 'error';
      $this->output->set_status_header(500);
      echo json_encode($response_array);
    } else {
      $tambah_siswa = array(
        'role_id' => $role_id,
        'username' => $username,
        'password' => get_hash($password),
        'session' => base64_encode($session),
        'status' => "0"
      );
    }

    $dataa = $this->Auth_model->insert($tambah_siswa);

    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('foto')) {
      $data['error_upload'] = array('error' => $this->upload->display_errors());
      $this->session->set_flashdata('error', ' ');
      redirect('auth/login');
    } else {
      $data = array('upload_data' => $this->upload->data());

      if ($role_id == "3") {
        $detail_siswa = array(
          'user_id' => $dataa,
          'nipd' => $this->input->post('nipd'),
          'nisn' => $this->input->post('nisn'),
          'nama' => $this->input->post('nama'),
          'jenis_kelamin' => $this->input->post('jenis_kelamin'),
          'tahun_masuk' => $this->input->post('tahun_masuk'),
          'kelas_id' => $this->input->post('kelas_id'),
          'tempat_lahir' => $this->input->post('tempat_lahir'),
          'tanggal_lahir' => $this->input->post('tanggal_lahir'),
          'agama' => $this->input->post('agama'),
          'alamat' => $this->input->post('alamat'),
          'no_telp' => $this->input->post('no_telp'),
          'foto' => $data['upload_data']['file_name']
        );
        $this->db->insert('siswa', $detail_siswa);
      }
    }

    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Register anda berhasil! Harap menunggu pengaktifan akun oleh admin!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    redirect('auth/login');
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth/login');
  }
}
