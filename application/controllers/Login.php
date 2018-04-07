<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pengumuman Kelulusan
 *
 *
 *
 * this content is part of Brackets Organization Software
 *
 * Copyright (c) 2017, Brackets Organization
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	Pengumuman Kelulusan
 * @author	Herman Sugiharto
 * @copyright	Copyright (c) 2017, Brackets Organization)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @since	Version 1.0.0
 * @filesource
 */

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_db');
	}
	public function index()
	{
		$data['title'] = "Akses Terbatas - Login";
		$data['username'] = "";
		$data['password'] = "";
		$data['message'] = "";
		$data['pesan'] = "";
		$this->load->view('login', $data);
	}
	public function masuk()
	{
		$this->form_validation->set_rules('user', 'username', 'required');
		$this->form_validation->set_rules('pass', 'password', 'required');
		if ($this->form_validation->run())
		{
			$data['username']=$this->input->post('user',TRUE);
			$data['password']=$this->input->post('pass',TRUE);
			$where = array(
				'username' 	=> $data['username'],
				'password' 	=> md5($data['password'])
			);
			$cek = $this->m_db->cek_login("user",$where)->num_rows();
			$get =$this->m_db->cek_login("user",$where);
			$row=$get->row();
			if($cek > 0)
			{
				$data_session = array('nama' => $row->nama,'unique_id' => $row->unique_id,'level' =>$row->level, 'status' => "login"  );
				$this->session->set_userdata($data_session);

				echo $row->nama;
				if($row->level == '1')
				{
					redirect('admin');
				}
				else
				{
					redirect('siswa');
				}
			}
			else
			{
				$data['username'] = '';
				$data['password'] = '';
				$data['message'] = "salah";
				$data['pesan'] = "password anda salah atau pengumuman belum di buka";
				$data['title'] = "Akses Terbatas - Login";
				$this->load->view('login', $data);
			}
		}
		else
		{
			$data['username'] = '';
			$data['password'] = '';
			$data['message'] = "kosong";
			$data['pesan'] = "";
			$data['title'] = "Akses Terbatas - Login";
			$this->load->view('login', $data);
		}
	}
	public function keluar()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
