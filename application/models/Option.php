<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Option extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_jalan_pintas()
  {
    $q_jalan = $this->db->query("SELECT * FROM options WHERE nama_option = 'petunjuk_jalan_pintas'");
    $jalan_pintas = $q_jalan->row();
    return $jalan_pintas->isi_option;
  }

  public function get_himbauan_petugas()
  {
    $q_himbauan = $this->db->query("SELECT * FROM options WHERE nama_option = 'himbauan_petugas'");
    $himbauan_petugas = $q_himbauan->row();
    return $himbauan_petugas->isi_option;
  }

  public function get_pesan()
  {
    $q_pesan = $this->db->query("SELECT * FROM options WHERE nama_option = 'pesan_untuk_siswa'");
    $pesan_untuk_siswa = $q_pesan->row();
    return $pesan_untuk_siswa->isi_option;
  }
}
