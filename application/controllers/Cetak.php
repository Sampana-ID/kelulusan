<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('m_validate');
    $this->m_validate->validate_session();
  }

  function index()
  {
    echo "cannot get any parameter";
  }

  function kelulusan($id)
  {
    
    $sql = "SELECT * FROM `user` JOIN `statistik` ON `user`.`unique_id` = `statistik`.`unique_id` JOIN `biodata` ON `biodata`.`unique_id` = `user`.`unique_id` WHERE `user`.`unique_id` = '$id'";
    $d   = $this->db->query($sql);
    $data = $d->row();
    if($data->ket == 1){
        $ket = 'lulus';
    }
    else{
        $ket='tidaklulus';
    }
    $tempatlhr        = $data->tempat_lhr;
    $nama        = $data->nama_lengkap;
    $tgllhr        = $data->tanggal_lhr;
    $noujian     = $data->no_ujian;
    $sekolah = "SMA Negeri 1 Jamblang";
    $kelas = $data->kelas;
    $NISN = $data->nisn;
    $jurusan = $data->jurusan;
    $text = "Kepala SMA Negeri 1 Jamblang Kabupaten Cirebon menerangkan bahwa siswa:";
    //Instanciation of inherited class
    $pdf=new cetakSurat();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(20, 25.4, 25.4);
    $pdf->SetFont('Times','U',15);
    $pdf->SetTitle('Surat keterangan lulus '.$nama);
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"SURAT KETERANGAN",0,'C');
    $pdf->SetFont('Times','',11);
    $pdf->MultiCell(0,5,"Nomor : 422.1/114/SMANJA",0,'C');
    //Line break
    $pdf->Ln(5);
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,5,$text,0,'J');
    //Line break
    $pdf->Ln(5);
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"Nama                                 : ".$nama,0,'J');
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"Tempat, Tanggal lahir       : ".$tempatlhr .", " .$tgllhr,0,'J');
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"Kelas                                  : XII ".$jurusan ." " .$kelas,0,'J');
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"NISN                                  : ".$NISN,0,'J');
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"Nomor Ujian Nasional       : ".$noujian,0,'J');
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"Asal Sekolah                      : ".$sekolah,0,'J');
    //Line break
    $pdf->Ln(20);
    $pdf->Image("images/".$ket.".jpg",80,108,60);
    $pdf->MultiCell(0,5,"Ujian Nasional / Ujian Sekolah Tahun Pelajaran 2016/2017",0,'J');
    //Move to the right
    $pdf->Ln(15);
    $pdf->Cell(100);
    $pdf->MultiCell(0,5,"Cirebon, Mei 2017",0,'J');
    $pdf->Cell(100);
    $pdf->MultiCell(0,5,"Kepala SMA Negeri 1 Jamblang,",0,'J');
    $pdf->Ln(33);
    //$pdf->Image('https://c1.staticflickr.com/5/4168/34183760721_8625b2e43d_b.jpg',106,155,50);
    //Move to the right
    $pdf->Cell(100);
    $pdf->MultiCell(0,5,"H.Aply Rochmana, S.Pd",0,'J');
    $pdf->Cell(100);
    $pdf->MultiCell(0,5,"NIP. 19601019 198403 1 002",0,'J');
    $pdf->Output('I',"surat kelulusan ".$nama.".pdf");
  }
  function un($id)
  {

    $sql = "SELECT * FROM `user` JOIN `statistik` ON `user`.`unique_id` = `statistik`.`unique_id` JOIN `biodata` ON `biodata`.`unique_id` = `user`.`unique_id` JOIN `nilai` ON `user`.`unique_id` = `nilai`.`unique_id` WHERE `user`.`unique_id` = '$id'";
    $d   = $this->db->query($sql);
    $data = $d->row();
    if($data->ket == 1){
        $ket = 'lulus';
    }
    else{
        $ket='tidaklulus';
    }
    $matematika = $data->matematika;
    $indonesia = $data->indonesia;
    $inggris = $data->inggris;
    $peminatan = $data->nilai_peminatan;
    $peringkat = $data->peringkat;
    $akhir = $matematika + $indonesia + $inggris + $peminatan;
    $tempatlhr        = $data->tempat_lhr;
    $nama        = $data->nama_lengkap;
    $tgllhr        = $data->tanggal_lhr;
    $noujian     = $data->no_ujian;
    $sekolah = "SMA Negeri 1 Jamblang";
    $kelas = $data->kelas;
    $NISN = $data->nisn;
    $jurusan = $data->jurusan;
    $text = "Kepala SMA Negeri 1 Jamblang Kabupaten Cirebon menerangkan bahwa siswa:";
    //Instanciation of inherited class
    $pdf=new cetakSurat();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(20, 25.4, 25.4);
    $pdf->SetFont('Times','U',15);
    $pdf->SetTitle('Surat keterangan lulus '.$nama);
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"SURAT KETERANGAN",0,'C');
    $pdf->SetFont('Times','',11);
    $pdf->MultiCell(0,5,"Nomor : 422.1/114/SMANJA",0,'C');
    //Line break
    $pdf->Ln(5);
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,5,$text,0,'J');
    //Line break
    $pdf->Ln(5);
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"Nama                                 : ".$nama,0,'J');
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"Tempat, Tanggal lahir       : ".$tempatlhr .", " .$tgllhr,0,'J');
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"Kelas                                  : XII ".$jurusan ." " .$kelas,0,'J');
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"NISN                                  : ".$NISN,0,'J');
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"Nomor Ujian Nasional       : ".$noujian,0,'J');
    //Move to the right
    $pdf->Cell(15.4);
    $pdf->MultiCell(0,5,"Asal Sekolah                      : ".$sekolah,0,'J');
    //Line break
    $pdf->Ln(20);
    $pdf->Image("images/".$ket.".jpg",80,108,60);
    $pdf->MultiCell(0,5,"Ujian Nasional / Ujian Sekolah Tahun Pelajaran 2016/2017, dengan rincian nilai sebagai berikut :",0,'J');
    //Move to the right
    $pdf->Cell(40,6,'Matematika',1);
    $pdf->Ln(15);
    $pdf->Cell(100);
    $pdf->MultiCell(0,5,"Cirebon, Mei 2017",0,'J');
    $pdf->Cell(100);
    $pdf->MultiCell(0,5,"Kepala SMA Negeri 1 Jamblang,",0,'J');
    $pdf->Ln(33);
    //$pdf->Image('https://c1.staticflickr.com/5/4168/34183760721_8625b2e43d_b.jpg',106,155,50);
    //Move to the right
    $pdf->Cell(100);
    $pdf->MultiCell(0,5,"H.Aply Rochmana, S.Pd",0,'J');
    $pdf->Cell(100);
    $pdf->MultiCell(0,5,"NIP. 19601019 198403 1 002",0,'J');
    $pdf->Output('I',"surat kelulusan ".$nama.".pdf");
  }
}
