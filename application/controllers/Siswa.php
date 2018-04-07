<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('option');
    $this->load->model('statistik');
    $this->load->model('m_db');
    $this->load->model('m_validate');
    $this->m_validate->validate_session();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    if(!$_SESSION['level'] == 2)
    {
        redirect('login');
    }
    $data['title'] = 'Dashboard Siswa';
    $data['page'] = 'user_dash';
    $data['jumlah_siswa'] = $this->statistik->jumlah_siswa();
    $data['jumlah_siswa_ipa'] = $this->statistik->jumlah_siswa_ipa();
    $data['jumlah_siswa_ips'] = $this->statistik->jumlah_siswa_ips();
    $data['jumlah_login'] = $this->statistik->jumlah_login();
    $data['jumlah_nilai_un'] = $this->statistik->jumlah_nilai_un();
    $data['jumlah_unduh'] = $this->statistik->jumlah_unduh();
    $data['jalan_pintas'] = $this->option->get_jalan_pintas();
    $data['himbuan'] = $this->option->get_himbauan_petugas();
    $data['pesan'] = $this->option->get_pesan();
    $this->load->view('v_core/core_container.php', $data);
  }
  function petugas()
  {
    $data['title'] = 'Daftar Petugas';
    $data['page'] = 'user_petugas';
    $this->load->view('v_core/core_container.php', $data);
  }
  function faq()
  {
    $data['title'] = 'Bantuan Siswa';
    $data['page'] = 'user_faq';
    $this->load->view('v_core/core_container', $data);
  }
  function prosedur()
  {
    $data['title'] = 'Prosedur Siswa';
    $data['page'] = 'user_prosedur';
    $this->load->view('v_core/core_container', $data);
  }
  function profil()
  {
    $data['title'] = 'Profil Siswa';
    $data['page'] = 'user_profil';
    $this->load->model('m_validate');
    $this->m_validate->validate_session();
    $data['message'] = '';
    $data['pesan'] ='';
    $this->load->view('v_core/core_container', $data);

  }

  function update_profil()
  {
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('password-baru', 'password', 'required');
    $this->form_validation->set_rules('password-ulangi', 'password', 'required');
    $this->form_validation->set_rules('avatar', 'avatar', 'required');
    if ($this->form_validation->run())
    {
      $unique_id = $_SESSION['unique_id'];
      $username = $this->input->post('username', TRUE);
      $get_pass = $this->input->post('password', TRUE);
      $password = md5($get_pass);
      $passbaru = $this->input->post('password-baru', TRUE);
      $ulangi = $this->input->post('password-ulangi', TRUE);
      $postavatar = $this->input->post('avatar', TRUE);
      $q = $this->db->query("SELECT * FROM `user` WHERE `unique_id` = '$unique_id'");
      $dn = $q->row();
      if($postavatar == ''){
        $avatar= $dn->avatar_url;
      }else if($postavatar == 'default'){
          $avatar = 'images/img.jpg';
      }else if($postavatar == 'hijab'){
          $avatar = 'images/img1.png';
      }else if($postavatar == 'women'){
          $avatar = 'images/img2.png';
      }else if($postavatar == 'hijab1'){
          $avatar = 'images/img3.png';
      }else if($postavatar == 'hijab2'){
          $avatar = 'images/img4.png';
      }else if($postavatar == 'man'){
          $avatar = 'images/img5.png';
      }
      if($passbaru == $ulangi){
      $baru = md5($passbaru);
          if($dn->password == $password)
          {
              $data = array('username' => $username, 'password' => $baru, 'avatar_url' =>$avatar);
              $this->db->where('unique_id', $unique_id);
              $this->db->update('user', $data);
              $data['title'] = 'Profil Siswa';
              $data['page'] = 'user_profil';
              $data['message'] = 'benar';
              $data['pesan'] = 'data berhasil di input!';
              $this->load->view('v_core/core_container', $data);
          }
          else{
              $data['title'] = 'Profil Siswa';
              $data['page'] = 'user_profil';
              $data['message'] = 'salah';
              $data['pesan'] = 'password anda salah';
              $this->load->view('v_core/core_container', $data);
          }
      }else{
        $data['title'] = 'Profil Siswa';
        $data['page'] = 'user_profil';
        $data['message'] = 'salah';
        $data['pesan'] = 'password baru anda harus sama!';
        $this->load->view('v_core/core_container', $data);
      }

    }
    else
    {
      $data['title'] = 'Profil Siswa';
      $data['page'] = 'user_profil';
      $data['message'] = 'kosong';
      $data['pesan'] ='';
      $this->load->view('v_core/core_container', $data);
    }

  }

  function biodata()
  {
    $data['title'] = 'Biodata Siswa';
    $data['page'] = 'user_bio';
    $data['message'] = '';
    $data['pesan'] = '';
    $this->load->view('v_core/core_container', $data);
  }

  function update_biodata()
  {
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('tempat_lhr', 'tempat lahir', 'required');
    $this->form_validation->set_rules('tanggal_lhr', 'tanggal lahir', 'required');
    $this->form_validation->set_rules('nisn', 'NISN', 'required');
    if ($this->form_validation->run())
    {
      $nama = $this->input->post('nama', TRUE);
      $alamat = $this->input->post('alamat', TRUE);
      $tempat_lhr = $this->input->post('tempat_lhr', TRUE);
      $tanggal_lhr = $this->input->post('tanggal_lhr', TRUE);
      $nisn = $this->input->post('nisn', TRUE);
      $unique_id = $_SESSION['unique_id'];
      $bio = array('nama_lengkap' => $nama,'alamat'=>$alamat,'tempat_lhr'=>$tempat_lhr, 'tanggal_lhr'=>$tanggal_lhr,'nisn'=>$nisn);
      $this->db->where('unique_id', $unique_id);
      $this->db->update('biodata', $bio);
      $data['title'] = 'Biodata Siswa';
      $data['page'] = 'user_bio';
      $data['message'] = 'benar';
      $data['pesan'] = 'biodata anda telah diupdate';
      $this->load->view('v_core/core_container', $data);
    }
    else {
        $data['title'] = 'Biodata Siswa';
        $data['page'] = 'user_bio';
        $data['message'] = 'kosong';
        $data['pesan'] = '';
        $this->load->view('v_core/core_container', $data);
    }
  }
  function nilaiun()
  {
    $unique_id = $_SESSION['unique_id'];
    $this->db->query("UPDATE `Statistik` SET `sum_nilai_un` = `sum_nilai_un` +1 WHERE `unique_id`= '$unique_id'");
    $data['title'] = 'Nilai UN Siswa';
    $data['page'] = 'user_nilai';
    $this->load->view('v_core/core_container', $data);
  }
  function surat()
  {
    $data['title'] = 'Surat Keterangan';
    $data['page'] = 'user_surat';
    $this->load->view('v_core/core_container', $data);
  }

}
