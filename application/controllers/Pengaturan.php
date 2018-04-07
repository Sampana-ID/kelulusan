<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Pengaturan';
    $data['page'] = 'admin_setting';
    $this->load->view('v_core/core_container', $data);
  }

}
