<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function getpost($id,$where)
  {
    $query = $this->db->query("SELECT * FROM `post` JOIN `admin` ON `post`.`post_author`=`admin`.`nama` JOIN `user` ON `post`.`post_author`=`user`.`nama` WHERE `id_post` = '$id'");
    $data = $query->row();
    if($where == 'judul')
    {
      $get = $data->post_title;
    }
    else if($where == 'isi')
    {
      $get = $data->post_content;
    }
    else if($where == 'pengarang')
    {
      $get = $data->post_author;
    }
    else if($where == 'gambar')
    {
      $get = $data->post_image;
    }
    else if($where == 'tanggal')
    {
      $get = $data->tanggal;
    }
    else if($where == 'avatar')
    {
      $get = $data->avatar_url;
    }
    else if($where == 'jabatan')
    {
      $get = $data->jabatan;
    }
    return $get;
  }

}
