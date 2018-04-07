<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfmaster extends CI_Controller{
    public function __construct()
    {
      parent::__construct();
    }
    function pdf()
    {
        $this->load->helper('pdf_helper');
        $this->load->view('pdfreport');
    }
  }