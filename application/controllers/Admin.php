<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_validate');
    $this->load->model('statistik');
    $this->m_validate->validate_session();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
  }

  function dashboard()
  {
    $data['jumlah_siswa'] = $this->statistik->jumlah_siswa();
    $data['jumlah_siswa_ipa'] = $this->statistik->jumlah_siswa_ipa();
    $data['jumlah_siswa_ips'] = $this->statistik->jumlah_siswa_ips();
    $data['jumlah_login'] = $this->statistik->jumlah_login();
    $data['jumlah_nilai_un'] = $this->statistik->jumlah_nilai_un();
    $data['jumlah_unduh'] = $this->statistik->jumlah_unduh();
    $data['title'] = 'Dashboard Admin';
    $data['page'] = 'admin_dash';
    $this->load->view('v_core/core_container', $data);
  }

  function profil()
  {
    $data['title'] = 'Profil Admin';
    $data['page'] = 'admin_profil';
    $this->load->view('v_core/core_container', $data);
  }
}
