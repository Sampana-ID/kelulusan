<?php
define('FPDF_FONTPATH', 'font/');
require('fpdf.php');

class cetakSurat extends FPDF
{
  var $widths;
  var $aligns;

function SetWidths($w)
{
  $this->widths=$w;
}

function SetAligns($a)
{
  $this->aligns=$a;
}

function Row($data)
{
  $nb=0;
  for($i=0;$i<count($data);$i++)
    $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
  $h=(4*$nb);
  $this->CheckPageBreak($h);
  for($i=0;$i<count($data);$i++)
  {
   $w=$this->widths[$i];
   $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
   $x=$this->GetX();
   $y=$this->GetY();
   $this->Rect($x,$y,$w,$h);
   $this->MultiCell($w,4,$data[$i],0,$a);
   $this->SetXY($x+$w,$y);
  }
  $this->Ln($h);
}

function CheckPageBreak($h)
{
  if($this->GetY()+$h>$this->PageBreakTrigger)
  $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
  $cw=&$this->CurrentFont['cw'];
  if($w==0)
   $w=$this->w-$this->rMargin-$this->x;
  $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
  $s=str_replace("r",'',$txt);
  $nb=strlen($s);
  if($nb>0 and $s[$nb-1]=="n")
   $nb--;
  $sep=-1;
  $i=0;
  $j=0;
  $l=0;
  $nl=1;
  while($i<$nb)
  {
   $c=$s[$i];
   if($c=="n")
   {
    $i++;
    $sep=-1;
    $j=$i;
    $l=0;
    $nl++;
    continue;
   }
   if($c==' ')
    $sep=$i;
   $l+=$cw[$c];
   if($l>$wmax)
   {
    if($sep==-1)
    {
     if($i==$j)
      $i++;
    }
    else
     $i=$sep+1;
    $sep=-1;
    $j=$i;
    $l=0;
    $nl++;
   }
   else
   $i++;
 }
 return $nl;
}

function Header()
{
	//Logo
	$this->Image('https://c1.staticflickr.com/4/3749/10579464895_4d53102b04_b.jpg',17,8,29);
	//Times bold 18
	$this->SetFont('Times','',14);
	//Move to the right
	$this->Cell(92);
	//Title
	$this->Cell(30,6,'PEMERINTAH DAERAH PROVINSI JAWA BARAT',0,1,'C');
	//Times bold 18
	$this->SetFont('Times','',12);
	//Move to the right
	$this->Cell(92);
	//Title
	$this->Cell(30,6,'DINAS PENDIDIKAN',0,1,'C');
	//Times bold 18
	$this->SetFont('Times','',12);
	//Move to the right
	$this->Cell(92);
	//Title
	$this->Cell(30,6,'SMA NEGERI 1 JAMBLANG KABUPATEN CIREBON',0,1,'C');
	//Times bold 14
	$this->SetFont('Times','',11);
	//Move to the right
	$this->Cell(92);
	$this->Cell(30,6,'Jl. Nyi Mas Rarakerta No.33 Tlp(0231)8825069 Jamblang - Cirebon 45156',0,1,'C');
	$this->SetFont('Times','',11);
	//Move to the right
	$this->Cell(92);
	$this->Cell(30,6,'web: sman1jamblang.sch.id  email: sman_1_jamblangcirebon@ymail.com',0,1,'C');
	//Set Line
    $this->SetLineWidth(0.5);
    //Line
	$this->Line(15,42,195,42);
	//Line break
	$this->Ln(10);
    
}
}
?>