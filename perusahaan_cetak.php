<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:index");
}
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header(){
    // Logo
    $this->Image('fpdf/banjar.png',10,8,17);
    // Arial bold 12
    $this->SetFont('Arial','B',12);
    // Geser Ke Kanan 30mm
    $this->Cell(120);
    // Judul
    $this->Cell(120,5,'PEMERINTAH KABUPATEN BANJAR',0,1,'C');
    $this->Cell(120);
    $this->SetFont('Arial','B',14);
    $this->Cell(120,5,'DINAS TENAGA KERJA & TRANSMIGRASI',0,1,'C');
    $this->Cell(120);
    $this->Cell(120,5,'',0,1,'C');
    $this->Cell(120);
    $this->SetFont('Arial','',11);
    $this->Cell(120,5,'Jl. A. Yani Km. 37,5 No. 119, Sei. Paring, Kec. Martapura, Kab. Banjar 70613 Telp: (0511) 4789009',0,1,'C');
    // Garis Bawah Double
    $this->SetLineWidth(1);
    $this->Line(10,31,342,31);
    $this->SetLineWidth(0);
    $this->Line(10,32,342,32);
    // Line break 5mm
    $this->Ln(6);
}


// Page footer
function Footer(){
    // Posisi 15 cm dari bawah
    $this->SetY(-15);
    

    // Arial italic 8
    $this->SetFont('Arial','',8);
    

    // Page number
    $this->Cell(0,10,'Halaman '.$this->PageNo().' / {nb}',0,0,'R');
}

function ttd(){
    $this->Ln(2);
    $this->SetFont('Arial','',12);
    $this->Cell(190);
    $this->Cell(190,5,'BANJARMASIN, '.tgl_indo(date('Y-m-d')),0,1,'C');
    $this->Cell(190);
    $this->Cell(190,5,'MENGETAHUI',0,1,'C');
    $this->Cell(190);
    $this->Cell(190,5,'KEPALA SUB.BAG UMUM & KEPEGAWAIAN',0,1,'C');
    $this->Ln(16);
    $this->Cell(190);
    $this->SetFont('Arial','U',12);
    $this->Cell(190,5,'Ir. Akhmad Hairin, MP',0,1,'C');
    $this->Cell(190);
    $this->SetFont('Arial','',12);
    $this->Cell(190,5,'NIP. 19680129 199303 1 007',0,1,'C');
}
}

function tgl_indo($tanggal){
  $bulan = array(
    1 => 'JANUARI',
          'FEBRUARI',
          'MARET',
          'APRIL',
          'MEI',
          'JUNI',
          'JULI',
          'AGUSTUS',
          'SEPTEMBER',
          'OKTOBER',
          'NOVEMBER',
          'DESEMBER'
    );
  $pecah = explode('-', $tanggal);
  return $pecah[2].' '.$bulan[(int)$pecah[1]].' '.$pecah[0];
}
//Membuat file PDF
$pdf = new PDF('L','mm','Legal');

//Alias total halaman dengan default {nb} (berhubungan dengan PageNo())
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(120);
$pdf->Cell(120,5,'LAPORAN DATA PERUSAHAAN',0,1,'C');
$pdf->Ln(4);
//Mencetak kalimat dengan perulangan
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',11);

$pdf->Cell(6,6,'NO',1,0,'C',0);
$pdf->Cell(20,6,'ID',1,0,'C',0);
$pdf->Cell(70,6,'NAMA PERUSAHAAN',1,0,'C',0);
$pdf->Cell(45,6,'PIC',1,0,'C',0);
$pdf->Cell(40,6,'JABATAN',1,0,'C',0);
$pdf->Cell(37,6,'KONTAK',1,0,'C',0);
$pdf->Cell(110,6,'ALAMAT',1,1,'C',0);

$pdf->SetFont('Arial','',10);
 
include 'koneksi.php';
$data = mysqli_query($konek,"SELECT*FROM tb_perusahaan");
$no =1;
while($hasil=mysqli_fetch_array($data)){
  $pdf->SetFont('Arial','',11);

  //pendidikan
  $Width=110; //lebar sel
  $Height=6; //tinggi sel satu baris normal
  
  //periksa apakah teksnya melibihi kolom?
  if($pdf->GetStringWidth($hasil['alamat']) < $Width){
    //jika tidak, maka tidak melakukan apa-apa
    $line=1;
  }else{
    //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
    //dengan memisahkan teks agar sesuai dengan lebar sel
    //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
    
    $textLength=strlen($hasil['alamat']);  //total panjang teks
    $errMargin=5;   //margin kesalahan lebar sel, untuk jaga-jaga
    $startChar=0;   //posisi awal karakter untuk setiap baris
    $maxChar=0;     //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
    $textArray=array(); //untuk menampung data untuk setiap baris
    $tmpString="";    //untuk menampung teks untuk setiap baris (sementara)
    
    while($startChar < $textLength){ //perulangan sampai akhir teks
      //perulangan sampai karakter maksimum tercapai
      while( 
      $pdf->GetStringWidth( $tmpString ) < ($Width-$errMargin) &&
      ($startChar+$maxChar) < $textLength ) {
        $maxChar++;
        $tmpString=substr($hasil['alamat'],$startChar,$maxChar);
      }
      //pindahkan ke baris berikutnya
      $startChar=$startChar+$maxChar;
      //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
      array_push($textArray,$tmpString);
      //reset variabel penampung
      $maxChar=0;
      $tmpString='';
      
    }
    //dapatkan jumlah baris
    $line=count($textArray);
  }
  
  //tulis selnya
  $pdf->SetFont('Arial','',11);
  $pdf->Cell(6,($line * $Height),$no++,1,0,'C',true);
  $pdf->Cell(20,($line * $Height),$hasil['id_perusahaan'],1,0,'C',0);
  $pdf->Cell(70,($line * $Height),$hasil['perusahaan'],1,0,'L',0);
  $pdf->Cell(45,($line * $Height),$hasil['nama_PIC'],1,0,'L',0);
  $pdf->Cell(40,($line * $Height),$hasil['jabatan'],1,0,'L',0);
  $pdf->Cell(37,($line * $Height),$hasil['kontak'],1,0,'L',0);
  //ingat posisi x dan y sebelum menulis MultiCell
  $xPo=$pdf->GetX();
  $yPo=$pdf->GetY();

  $pdf->MultiCell($Width,$Height,$hasil['alamat'],1);
  
  //kembalikan posisi untuk sel berikutnya di samping MultiCell 
  //$pdf->SetXY($xPo + $Width , $yPo);
  
  //$pdf->Cell(29,($line * $cellHeight),$hasil['sn_router'],1,1,'L',0); //sesuaikan ketinggian dengan jumlah garis
}
$pdf->Ln(5);
$pdf->ttd();
//Menutup dokumen dan dikirim ke browser
$pdf->Output();
?>
