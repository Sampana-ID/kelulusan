<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasitus extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_data($where)
  {
    return $this->db->select('isi_data')->where('nama_data',$where)->from('data')->get();
  }

  function jurusan()
  {
    return $this->get_data('jurusan');
  }
  function kelas()
  {
    return $this->get_data('kelas');
  }
  function peminatan()
  {
    return $this->get_data('peminatan');
  }

}
