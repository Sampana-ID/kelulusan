<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasiswa extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_validate');
    $this->m_validate->validate_session();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Data Siswa';
    $data['page'] = 'siswa/admin_data_siswa';
    $data['message'] = '';
    $data['pesan'] ='';
    $this->load->view('v_core/core_container', $data);
  }
  function prosesimport()
  {
            $this->form_validation->set_rules('judul', 'judul', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                // jika validasi judul gagal
                $this->index();
            } else {
                // config upload
                $config['upload_path'] = './temp_upload/';
                $config['allowed_types'] = 'xls';
                $config['max_size'] = '10000';
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('gambar')) {
                    // jika validasi file gagal, kirim parameter error ke index
                    $error = array('error' => $this->upload->display_errors());
                    $this->index($error);
                } else {
                  // jika berhasil upload ambil data dan masukkan ke database
                  $upload_data = $this->upload->data();

                  // load library Excell_Reader
                  $this->load->library('Excel_reader');

                  //tentukan file
                  $this->excel_reader->setOutputEncoding('230787');
                  $file = $upload_data['full_path'];
                  $this->excel_reader->read($file);
                  error_reporting(E_ALL ^ E_NOTICE);

                  // array data
                  $data = $this->excel_reader->sheets[0];
                  $dataexcel = Array();
                  for ($i = 1; $i <= $data['numRows']; $i++) {
                       if ($data['cells'][$i][1] == '')
                           break;
                       $dataexcel[$i - 1]['nama'] = $data['cells'][$i][1];
                       $dataexcel[$i - 1]['tempat_lahir'] = $data['cells'][$i][2];
                       $dataexcel[$i - 1]['tanggal_lahir'] = $data['cells'][$i][3];
                  }

                  //load model
                  $this->load->model('Data_model');
                  $this->Data_model->loaddata($dataexcel);

                  //delete file
                  $file = $upload_data['file_name'];
                  $path = './temp_upload/' . $file;
                  unlink($path);
                }
            //redirect ke halaman awal
            redirect(site_url('datasiswa/import'));
            }
  }
  function import($error = NULL)
  {
    $data = array(
    'action' => site_url('datasiswa/prosesimport'),
    'judul' => set_value('judul'),
    'error' => $error['error'] // ambil parameter error
    );
    $data['title'] = 'Data Siswa';
    $data['page'] = 'siswa/admin_import';
    $this->load->view('v_core/core_container', $data);
  }
  function nilai()
  {
    $data['title'] = 'Data Nilai Siswa';
    $data['page'] = 'siswa/admin_nilai_siswa';
    $data['message'] = '';
    $data['pesan'] ='';
    $this->load->view('v_core/core_container', $data);
  }
  function detail($unique_id)
  {
    $data['title'] = 'Data Siswa';
    $data['unique_id'] = $unique_id;
    $data['page'] = 'siswa/admin_detail_siswa';
    $this->load->view('v_core/core_container', $data);
  }
  function edit($unique_id)
  {
    $data['title'] = 'Data Siswa';
    $data['unique_id'] = $unique_id;
    $data['page'] = 'siswa/admin_edit_siswa';
    $data['message'] = '';
    $data['pesan'] ='';
    $this->load->view('v_core/core_container', $data);
  }
  function update($unique_id)
  {
    $username = $this->input->post('username', TRUE);
    $nama = $this->input->post('nama', TRUE);
    $tempat_lhr = $this->input->post('tempat_lhr', TRUE);
    $tanggal_lhr = $this->input->post('tanggal_lhr', TRUE);
    $nisn = $this->input->post('nisn', TRUE);
    $no_ujian = $this->input->post('no_ujian', TRUE);
    $jurusan = $this->input->post('jurusan', TRUE);
    $kelas = $this->input->post('kelas', TRUE);
    $peminatan = $this->input->post('peminatan', TRUE);
    $alamat = $this->input->post('alamat', TRUE);
    $indonesia = $this->input->post('indonesia', TRUE);
    $inggris = $this->input->post('inggris', TRUE);
    $matematika = $this->input->post('matematika', TRUE);
    $nilai_peminatan = $this->input->post('nilai_peminatan', TRUE);
    $akhir = $this->input->post('akhir', TRUE);
    $peringkat = $this->input->post('peringkat', TRUE);
    $postavatar = $this->input->post('avatar_url', TRUE);
    $q = $this->db->query("SELECT * FROM `user` WHERE `unique_id` = '$unique_id'");
    $dn = $q->row();
    if($postavatar == ''){
      $avatar= $dn->avatar_url;
    }else if($postavatar == 'default'){
        $avatar = 'images/img.jpg';
    }else if($postavatar == 'hijab'){
        $avatar = 'images/img1.png';
    }else if($postavatar == 'women'){
        $avatar = 'images/img2.png';
    }else if($postavatar == 'hijab1'){
        $avatar = 'images/img3.png';
    }else if($postavatar == 'hijab2'){
        $avatar = 'images/img4.png';
    }else if($postavatar == 'man'){
        $avatar = 'images/img5.png';
    }
    $statsql = "UPDATE `Statistik` SET `no_ujian`= '$no_ujian' WHERE `unique_id` = '$unique_id'";
    $usersql = "UPDATE `user` SET `username` = '$username', `nama` = '$nama', `avatar_url` = '$avatar' where `unique_id` = '$unique_id'";
    $biodatasql = "UPDATE `biodata` SET `nama_lengkap` = '$nama', `nisn` = '$nisn', `jurusan` = '$jurusan', `kelas` = '$kelas', `peminatan` = '$peminatan', `tempat_lhr` = '$tempat_lhr', `tanggal_lhr` = '$tanggal_lhr', `alamat` = '$alamat' WHERE `unique_id` = '$unique_id'";
    $nilaisql = "UPDATE `nilai` SET `indonesia` = '$indonesia', `inggris` ='$inggris', `matematika` = '$matematika', `nilai_peminatan` = '$nilai_peminatan', `peringkat` = '$peringkat', `akhir` ='$akhir' where `unique_id` = '$unique_id'";
    $this->db->query($statsql);
    $this->db->query($usersql);
    $this->db->query($biodatasql);
    $this->db->query($nilaisql);
    $data['title'] = 'Data Siswa';
    $data['unique_id'] = $unique_id;
    $data['page'] = 'siswa/admin_edit_siswa';
    $data['message'] = 'benar';
    $data['pesan'] = 'data berhasil diperbarui';
    $this->load->view('v_core/core_container', $data);
  }
  function tambah()
  {
    $this->load->model('Datasitus');
    $data['title'] = 'Data Siswa';
    $data['page'] = 'siswa/admin_add_siswa';
    $data['message'] = '';
    $data['jurusan'] = $this->Datasitus->jurusan();
    $data['pesan'] = '';
    $this->load->view('v_core/core_container', $data);
  }
  function add()
  {
    $username = $this->input->post('username', TRUE);
    $nama = $this->input->post('nama', TRUE);
    $tempat_lhr = $this->input->post('tempat_lhr', TRUE);
    $tanggal_lhr = $this->input->post('tanggal_lhr', TRUE);
    $pass = $this->input->post('password');
    $password = md5($pass);
    $nisn = $this->input->post('nisn', TRUE);
    $no_ujian = $this->input->post('no_ujian', TRUE);
    $jurusan = $this->input->post('jurusan', TRUE);
    $kelas = $this->input->post('kelas', TRUE);
    $peminatan = $this->input->post('peminatan', TRUE);
    $alamat = $this->input->post('alamat', TRUE);
    $indonesia = $this->input->post('indonesia', TRUE);
    $inggris = $this->input->post('inggris', TRUE);
    $matematika = $this->input->post('matematika', TRUE);
    $nilai_peminatan = $this->input->post('nilai_peminatan', TRUE);
    $akhir = $this->input->post('akhir', TRUE);
    $peringkat = $this->input->post('peringkat', TRUE);
    $unique_id = md5($username.$tanggal_lhr);
    $postavatar = $this->input->post('avatar_url', TRUE);
    if($postavatar == ''){
      $avatar = 'images/img.jpg';
    }else if($postavatar == 'default'){
        $avatar = 'images/img.jpg';
    }else if($postavatar == 'hijab'){
        $avatar = 'images/img1.png';
    }else if($postavatar == 'women'){
        $avatar = 'images/img2.png';
    }else if($postavatar == 'hijab1'){
        $avatar = 'images/img3.png';
    }else if($postavatar == 'hijab2'){
        $avatar = 'images/img4.png';
    }else if($postavatar == 'man'){
        $avatar = 'images/img5.png';
    }
    $this->db->query("INSERT INTO `user`(`id_user`, `username`, `password`, `nama`, `level`, `unique_id`, `avatar_url`) VALUES (NULL,'$username','$password','$nama','2','$unique_id','$avatar')");
    $this->db->query("INSERT INTO `biodata`(`unique_id`, `nama_lengkap`, `nisn`, `jurusan`, `kelas`, `peminatan`, `tempat_lhr`, `tanggal_lhr`, `alamat`) VALUES ('$unique_id','$nama','$nisn','$jurusan','$kelas','$peminatan','$tempat_lhr','$tanggal_lhr','$alamat')");
    $this->db->query("INSERT INTO `Statistik`(`unique_id`, `sum_login`, `sum_nilai_un`, `sum_unduh`, `no_ujian`) VALUES ('$unique_id',0,0,0,'$no_ujian')");
    $this->db->query("INSERT INTO `nilai`(`unique_id`, `indonesia`, `inggris`, `matematika`, `nilai_peminatan`, `akhir`, `peringkat`) VALUES ('$unique_id','$indonesia','$inggris','$matematika','$nilai_peminatan','$akhir','$peringkat')");
    redirect(base_url().'datasiswa/tambah');
  }

  function hapus($unique_id)
  {
    $usersql = "DELETE FROM `user` WHERE `unique_id` = '$unique_id'";
    $biodatasql = "DELETE FROM `biodata` WHERE `unique_id` = '$unique_id'";
    $nilaisql = "DELETE FROM `nilai` WHERE `unique_id` = '$unique_id'";
    $statistik = "DELETE FROM `Statistik` WHERE `unique_id` = '$unique_id'";
    $this->db->query($statistik);
    $this->db->query($biodatasql);
    $this->db->query($nilaisql);
    $this->db->query($usersql);
    $data['title'] = 'Data Siswa';
    $data['page'] = 'siswa/admin_data_siswa';
    $data['message'] = 'salah';
    $data['pesan'] = 'data berhasil dihapus';
    $this->load->view('v_core/core_container', $data);
  }

}
