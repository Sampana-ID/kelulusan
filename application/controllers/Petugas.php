<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_validate');
    $this->m_validate->validate_session();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Daftar Petugas';
    $data['page'] = 'petugas/admin_petugas';
    $data['message'] = '';
    $data['pesan'] ='';
    $this->load->view('v_core/core_container', $data);
  }
  function tambah()
  {
    $data['title'] = 'Tambah Petugas';
    $data['page'] = 'petugas/admin_tambah_petugas';
    $data['message'] = '';
    $data['pesan'] ='';
    $this->load->view('v_core/core_container', $data);
  }
  function edit($id)
  {
    $data['unique_id'] = $id;
    $data['title'] = 'Daftar Petugas';
    $data['page'] = 'petugas/admin_edit_petugas';
    $data['message'] = '';
    $data['pesan'] ='';
    $this->load->view('v_core/core_container', $data);
  }
  function hapus($id)
  {
    $unique_id = $_SESSION['unique_id'];
    if ($id == $unique_id) {
      echo 'tidak bisa menghapus akun yang sedang digunakan';
    }
    else {
      $this->db->where('unique_id',$id)->delete('admin');
      $this->db->where('unique_id', $id)->delete('user');
    }
  }

}
