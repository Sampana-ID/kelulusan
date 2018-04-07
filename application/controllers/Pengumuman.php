<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('m_validate');
    $this->m_validate->validate_session();
    $this->load->model('post');
  }

  function index()
  {
    $data['title'] = 'pengumuman sekolah';
    $data['page'] = 'user_pengumuman';
    $this->load->view('v_core/core_container', $data);
  }
  function error404()
  {
    $this->load->view('error404');
  }

  function admin()
  {
    $data['title'] = 'pengumuman sekolah';
    $data['page'] = 'pengumuman/admin_pengumuman';
    $data['message'] = '';
    $data['pesan'] = '';
    $this->load->view('v_core/core_container', $data);
  }
  function edit($id)
  {
    $table = $this->db->select('*')->from('post')->where('id_post',$id)->get();
    $row = $table->row();
    $data['title'] = 'pengumuman sekolah';
    $data['page'] = 'pengumuman/admin_edit_pengumuman';
    $data['message'] = '';
    $data['pesan'] = '';
    $data['id'] = $id;
    $data['gambar'] = $row->post_image;
    $data['tanggal'] = $row->tanggal;
    $data['judul'] = $row->post_title;
    $data['isi'] = $row->post_content;
    $this->load->view('v_core/core_container', $data);
  }
  function tambah()
  {
    $data['title'] = 'pengumuman sekolah';
    $data['page'] = 'pengumuman/admin_tambah_pengumuman';
    $data['message'] = '';
    $data['pesan'] = '';
    $this->load->view('v_core/core_container', $data);
  }
  function add()
  {
    $nama = $_SESSION['nama'];
    $isi = $this->input->post('konten', TRUE);
    $judul = $this->input->post('judul', TRUE);
    /*
    //TODO mengupload foto
    *if(!empty($_FILES['foto']['tmp_name']))
    {
        $ext=strtolower(substr($_FILES['foto']['name'],-3));
        if($ext=='gif')
            $ext=".gif";
        else
            $ext=".png";
        move_uploaded_file($_FILES['foto']['tmp_name'], "../images/" . basename($id).$ext));
    }**/
    $this->db->query("INSERT INTO `post` (`id_post`, `post_author`, `post_title`, `post_content`, `post_image`, `tanggal`) VALUES (NULL, '$nama', '$judul', '$isi', '1.png', CURRENT_TIMESTAMP)");
    $data['title'] = 'pengumuman sekolah';
    $data['page'] = 'pengumuman/admin_pengumuman';
    $data['message'] = 'benar';
    $data['pesan'] = 'data berhasil ditambah';
    redirect(base_url().'admin/pengumuman');
  }
  function update($id)
  {
    $table = $this->db->select('*')->from('post')->where('id_post',$id)->get();
    $row = $table->row();
    $gambar = $row->post_image;
    $judul=$this->input->post('judul', TRUE);
    $konten= $this->input->post('konten', TRUE);
    /*
    //TODO menghapus dan memindahkan foto
    if(!empty($_FILES['foto']['tmp_name']))
    {
        $ext=strtolower(substr($_FILES['foto']['name'],-3));
        if($ext=='gif')
            $ext=".gif";
        else
            $ext=".png";
        move_uploaded_file($_FILES['foto']['tmp_name'], base_url()."images/" . basename($id).$ext);
        $this->db->query("update post set post_title='$judul',gambar='$id.$ext',post_content='$konten' where id_post='$id'");
      }
    else
    {*/
      $this->db->query("update post set post_title='$judul',post_content='$konten' where id_post='$id'");
      $data['title'] = 'pengumuman sekolah';
      $data['page'] = 'pengumuman/admin_pengumuman';
      $data['message'] = 'benar';
      $data['pesan'] = 'data berhasil diubah';
      $this->load->view('v_core/core_container', $data);
    /*}*/
  }
  function post($id)
  {
    $data['id'] = $id;
    $data['title'] = $this->post->getpost($id, 'judul');;
    $data['judul'] = $this->post->getpost($id, 'judul');
    $data['isi'] = $this->post->getpost($id, 'isi');
    $data['gambar'] = $this->post->getpost($id,'gambar');
    $data['pengarang'] = $this->post->getpost($id,'pengarang');
    $data['tanggal'] = $this->post->getpost($id,'tanggal');
    $data['avatar'] = $this->post->getpost($id,'avatar');
    $data['jabatan'] = $this->post->getpost($id,'jabatan');
    $this->load->view('v_post', $data);
  }
  function hapus($id)
  {
    //TODO membuat pop up
    $this->db->where('id_post',$id)->delete('post');
    redirect(base_url().'admin/pengumuman');
  }
}
