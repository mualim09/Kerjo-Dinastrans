<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:index");
}
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('fpdf/banjar.png',10,7,17);
    // Arial bold 12
    $this->SetFont('Arial','B',12);
    // Geser Ke Kanan 30mm
    $this->Cell(70);
    // Judul
    $this->Cell(70,5,'PEMERINTAH KABUPATEN BANJAR',0,1,'C');
    $this->Cell(70);
    $this->SetFont('Arial','B',14);
    $this->Cell(70,5,'DINAS TENAGA KERJA & TRANSMIGRASI',0,1,'C');
    $this->Cell(70);
    $this->Cell(70,5,'',0,1,'C');
    $this->Cell(70);
    $this->SetFont('Arial','',11);
    $this->Cell(70,5,'Jl. A. Yani Km. 37,5 No. 119, Sei. Paring, Kec. Martapura, Kab. Banjar 70613 Telp: (0511) 4789009',0,1,'C');
    // Garis Bawah Double
    $this->SetLineWidth(1);
    $this->Line(10,31,203,31);
    $this->SetLineWidth(0);
    $this->Line(10,32,203,32);
    // Line break 5mm
    $this->Ln(6);
}

// Page footer
function Footer()
{
    // Posisi 15 cm dari bawah
    $this->SetY(-15);
    

    // Arial italic 8
    $this->SetFont('Arial','I',8);
    

    // Page number
    $this->Cell(0,10,'Halaman '.$this->PageNo().' / {nb}',0,0,'R');
}

function ttd(){
    $this->Ln(2);
    $this->SetFont('Arial','',10);
    $this->Cell(100);
    $this->Cell(100,5,'BANJARMASIN, '.tgl_indo(date('Y-m-d')),0,1,'C');
    $this->Cell(100);
    $this->Cell(100,5,'MENGETAHUI',0,1,'C');
    $this->Cell(100);
    $this->Cell(100,5,'KEPALA SUB.BAG UMUM & KEPEGAWAIAN',0,1,'C');
    $this->Ln(16);
    $this->Cell(100);
    $this->SetFont('Arial','U',12);
    $this->Cell(100,5,'Ir. Akhmad Hairin, MP',0,1,'C');
    $this->Cell(100);
    $this->SetFont('Arial','',12);
    $this->Cell(100,5,'NIP. 19680129 199303 1 007',0,1,'C');
}
}

//Membuat file PDF
$pdf = new PDF('P','mm','A4');

//Alias total halaman dengan default {nb} (berhubungan dengan PageNo())
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(70);
$pdf->Cell(70,5,'KARTU TANDA PENCARI KERJA',0,1,'C');
$pdf->Ln(4);

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
 
 include 'koneksi.php';

$id = $_GET['ref'];
$sql = mysqli_query($konek, "SELECT*FROM tb_pencaker WHERE id_pencaker='$id'");
$row = mysqli_fetch_array($sql);
$date = explode('-',$row['tanggal_pendaftar']);
$tm = $date[0].$date[1].$date[2];
$acak = rand(1000,9999);
//Mencetak kalimat dengan perulangan
$pdf->SetFillColor(24,224,23);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'NO PENCAKER',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(50,6,$row['id_pencaker'].$tm.$acak,0,1,'L',0);

$pdf->Cell(30,6,'NO. PENDUDUK',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(85,6,$row['no_ktp'],0,1,'L',0);
$pdf->Ln(6);

$pdf->Cell(40,60,'Pas Foto',1,0,'C',0);

$pdf->Cell(5,6,'',0,0,'C',0);
$pdf->Cell(40,6,'Nama ',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(85,6,$row['nama'],0,1,'L',0);

$pdf->Cell(45,6,'',0,0,'C',0);
$pdf->Cell(40,6,'Tempat, Tanggal Lahir',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(85,6,$row['tempat_lahir'].', '.tgl_indo($row['tanggal_lahir']),0,1,'L',0);

$pdf->Cell(45,6,'',0,0,'C',0);
$pdf->Cell(40,6,'Jenis Kelamin',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(85,6,$row['jenis_kelamin'],0,1,'L',0);

$pdf->Cell(45,6,'',0,0,'C',0);
$pdf->Cell(40,6,'Agama',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(85,6,$row['agama'],0,1,'L',0);

$pdf->Cell(45,6,'',0,0,'C',0);
$pdf->Cell(40,6,'Status',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(85,6,$row['status'],0,1,'L',0);

$pdf->Cell(45,6,'',0,0,'C',0);
$pdf->Cell(40,6,'Telepon',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(85,6,$row['no_hp'],0,1,'L',0);

$pdf->Cell(45,6,'',0,0,'C',0);
$pdf->Cell(40,6,'Email',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(85,6,$row['email'],0,1,'L',0);

$pdf->Cell(45,6,'',0,0,'C',0);
$pdf->Cell(40,6,'Tinggi Badan',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(85,6,$row['tinggi_badan'].' cm',0,1,'L',0);

$pdf->Cell(45,6,'',0,0,'C',0);
$pdf->Cell(40,6,'Berat Badan',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(85,6,$row['berat_badan'].' kg',0,1,'L',0);

//pendidikan
  $Width=100; //lebar sel
  $Height=6; //tinggi sel satu baris normal
  
  //periksa apakah teksnya melibihi kolom?
  if($pdf->GetStringWidth($row['alamat']) < $Width){
    //jika tidak, maka tidak melakukan apa-apa
    $line=1;
  }else{
    
    $textLength=strlen($row['alamat']);  //total panjang teks
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
        $tmpString=substr($row['alamat'],$startChar,$maxChar);
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
  $xPo=$pdf->GetX();
  $yPo=$pdf->GetY();
  $pdf->Cell(45,6,'',0,0,'C',0);
  $pdf->Cell(40,6,'Alamat',0,0,'L',0);
  $pdf->Cell(5,6,':',0,0,'C',0);
  $pdf->MultiCell($Width,$Height,$row['alamat'],0);

$pdf->Ln(5);
$pdf->Cell(30,6,'Pendidikan',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(50,6,$row['pendidikan'],0,1,'L',0);

$pdf->Cell(30,6,'Jurusan',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(50,6,$row['jurusan'],0,1,'L',0);

$pdf->Cell(30,6,'Tahun Lulus',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(50,6,$row['tahun'],0,1,'L',0);

$pdf->Cell(30,6,'Nilai / IPK',0,0,'L',0);
$pdf->Cell(5,6,':',0,0,'C',0);
$pdf->Cell(50,6,$row['nilai'],0,1,'L',0);
$pdf->Ln(12);
$pdf->Line(10,167,203,167);
$pdf->ttd();
//Menutup dokumen dan dikirim ke browser
$pdf->Output();
?>
