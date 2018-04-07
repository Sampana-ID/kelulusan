<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	*
	*************************************************************
	*  	This file is assets of "Pengumuman Kelulusan Web"
	*	By Herman Sugiharto
	*	My e-mail is "ezioalzeusi@gmail.com"
	*	if any problem e-mail me soon
	*
	*
	*
	* File ini merupakan bagian dari "Web Pengumuman Kelulusan"
	*	oleh Herman Sugiharto
	*	email saya adalah "ezioalzeusi@gmail.com"
	*	jika ada masalah silahkan kirim email secepatnya
	*************************************************************
	*
	*/

class M_validate extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	function validate()
	{
		if($_SESSION['level']==1)
		{

			redirect('admin');

		}
		else
		if($_SESSION['level']==2)
		{

			redirect('siswa');

		}
		else
		{

			redirect('login');

		}
	}
	function validate_session()
	{
		if(!$_SESSION['level'])
		{
			redirect('login');
		}
		else
		{
			
		}
	}
}

/* End of file m_validate.php */
/* Location: ./application/models/m_validate.php */
