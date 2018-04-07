<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function jumlah_siswa()
  {
       $q_jumlah_siswa = $this->db->query("SELECT COUNT(*) AS `id_user` FROM `user` WHERE `level` = 2");
       $jumlah_siswa = $q_jumlah_siswa->row();
       return $jumlah_siswa->id_user;
  }

  public function jumlah_siswa_ipa()
  {
       $q_jumlah_ipa = $this->db->query("SELECT COUNT(*) AS `id_user` FROM `user` INNER JOIN `biodata` ON user.unique_id=biodata.unique_id WHERE biodata.jurusan = 'IPA'");
       $siswa_ipa = $q_jumlah_ipa->row();
       return $siswa_ipa->id_user;
  }

  public function jumlah_siswa_ips()
  {
       $q_jumlah_ips = $this->db->query("SELECT COUNT(*) AS `id_user` FROM `user` INNER JOIN `biodata` ON user.unique_id=biodata.unique_id WHERE biodata.jurusan = 'IPS'");
       $siswa_ips = $q_jumlah_ips->row();
       return $siswa_ips->id_user;
  }

  public function jumlah_login()
  {

       $q_jumlah_login = $this->db->query("SELECT SUM(`sum_login`) AS `sum_login` FROM `Statistik`");
       $jumlah_login = $q_jumlah_login->row();
       return $jumlah_login->sum_login;
  }

  public function jumlah_nilai_un()
  {
       $q_jumlah_nilai_un = $this->db->query("SELECT SUM(`sum_nilai_un`) AS `sum_nilai_un` FROM `Statistik`");
       $jumlah_nilai = $q_jumlah_nilai_un->row();
       return $jumlah_nilai->sum_nilai_un ;
  }

  public function jumlah_unduh()
  {
       $q_jumlah_unduh = $this->db->query("SELECT SUM(`sum_unduh`) AS `sum_unduh` FROM `Statistik`");
       $jumlah_unduh = $q_jumlah_unduh->row();
       return $jumlah_unduh->sum_unduh;
  }
}
