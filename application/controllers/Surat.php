<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {

  }
  function coba()
  {
    $data['title'] = 'Cetak PDF Barang';
    $this->load->view('surat', $data);
    $paper_size='A4';
    $orientation='landscape';
    $html=$this->output->get_output();
    $this->dompdf->set_paper($paper_size,$orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporan.pdf",array('Attachment'=>0));
  }

  function kelulusan($id)
    {
      $data_setting = array();
      $this->load->helper('fpdf_helper');
      $a = new fpdf_helper();
      $row = $this->db->select('*')->where('user.unique_id',$id)->join('biodata','user.unique_id=biodata.unique_id')->from('user')->get()->result();
      $tempatlhr        = $row->tempat_lhr;
      $nama             = $row->nama_lengkap;
      $tgllhr           = $row->tanggal_lhr;
      $noujian          = $row->no_ujian;
      $kelas            = $row->kelas;
      $NISN             = $row->nisn;
      $jurusan          = $row->jurusan;
      $ket              = $row->ket;
      $data_setting = $this->db->select('*')->from('options');
      $sekolah          = $data_setting[2];
      $kabupaten        = $data_setting[6];
      $nomor            = $data_opsi[2];
      $text             = "Kepala ".$sekolah." ".$kabupaten."  menerangkan bahwa siswa:";
      $header_prov      = $data_opsi[0];
      $header_dinas     = $data_opsi[3];
      $header_sma       = $data_opsi[4];
      $header_tempat    = $data_opsi[1];
      $header_kontak    = $data_opsi[5];
      $a              ->SetTitle('Surat Keterangan Lulus');
      $a              ->AliasNbPages();
      $a              ->AddPage();
      $a              ->SetMargins(20, 25.4, 25.4);
      $a              ->SetFont('Times','',14);
      $a              ->Image("../images/logo.jpg",20,10,22);
      $a              ->Cell(92);
      $a              ->Cell(30,6,$header_prov,0,1,'C');
      	$a            ->SetFont('Times','',12);
        //Times bold 18
      	//Move to the right
      	$a->Cell(92);
      	//Title
      	$a->Cell(30,6,$header_dinas,0,1,'C');
      	//Times bold 18
      	$a->SetFont('Times','',12);
      	//Move to the right
      	$a->Cell(92);
      	//Title
      	$a->Cell(30,6,$header_sma,0,1,'C');
      	//Times bold 14
      	$a->SetFont('Times','',11);
      	//Move to the right
      	$a->Cell(92);
      	$a->Cell(30,6,$header_tempat,0,1,'C');
      	$a->SetFont('Times','',11);
      	//Move to the right
      	$a->Cell(92);
      	$a->Cell(30,6,$header_kontak,0,1,'C');
      	//Set Line
          $a->SetLineWidth(0.5);
          //Line
      	$a->Line(15,42,195,42);
      	//Line break
      	$a->Ln(10);
      $a->SetFont('Times','U',15);
      $a->MultiCell(0,5,"SURAT KETERANGAN",0,'C');
      $a->SetFont('Times','',11);
      $a->MultiCell(0,5,"Nomor : ".$nomor,0,'C');

      //Line break
      $a->Ln(5);
      $a->SetFont('Times','',12);
      $a->MultiCell(0,5,$text,0,'J');
      //Line break
      $a->Ln(5);
      //Move to the right
      $a->Cell(15.4);
      $a->MultiCell(0,5,"Nama                                 : ".$nama,0,'J');
      //Move to the right
      $a->Cell(15.4);
      $a->MultiCell(0,5,"Tempat, Tanggal lahir       : ".$tempatlhr .", " .$tgllhr,0,'J');
      //Move to the right
      $a->Cell(15.4);
      $a->MultiCell(0,5,"Kelas                                  : XII ".$jurusan ." " .$kelas,0,'J');
      $a->Cell(15.4);
      $a->MultiCell(0,5,"NISN                                  : ".$NISN,0,'J');
      //Move to the right
      $a->Cell(15.4);
      $a->MultiCell(0,5,"Nomor Ujian Nasional       : ".$noujian,0,'J');
      //Move to the right
      $a->Cell(15.4);
      $a->MultiCell(0,5,"Asal Sekolah                      : ".$sekolah,0,'J');
      //Line break
      $a->Ln(20);
      $a->Image("../images/".$ket.".jpg",80,108,60);
      $a->MultiCell(0,5,"Ujian Nasional / Ujian Sekolah Tahun Pelajaran 2016/2017",0,'J');
      //Move to the right
      $a->Ln(15);
      $a->Cell(100);
      $a->Image("../images/cap.jpg",112,148,50);
      $a->MultiCell(0,5,"Cirebon, Mei 2017",0,'J');
      $a->Cell(100);
      $a->MultiCell(0,5,"Kepala ".$sekolah.",",0,'J');
      $a->Ln(33);

      //Move to the right
      $a->Cell(100);
      $a->MultiCell(0,5,$data_setting[7],0,'J');
      $a->Cell(100);
      $a->MultiCell(0,5,"NIP. " .$data_setting[8],0,'J');
      $a->Output();
    }
}
