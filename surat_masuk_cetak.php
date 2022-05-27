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
    $this->Image('fpdf/banjar.png',10,8,17);
    // Arial bold 12
    $this->SetFont('Arial','B',12);
    // Geser Ke Kanan 30mm
    // Judul
    $this->Cell(100);
    // Judul
    $this->Cell(100,5,'PEMERINTAH KABUPATEN BANJAR',0,1,'C');
    $this->Cell(100);
    $this->SetFont('Arial','B',14);
    $this->Cell(100,5,'DINAS TENAGA KERJA & TRANSMIGRASI',0,1,'C');
    $this->Cell(100);
    $this->Cell(100,5,'',0,1,'C');
    $this->Cell(100);
    $this->SetFont('Arial','',11);
    $this->Cell(100,5,'Jl. A. Yani Km. 37,5 No. 119, Sei. Paring, Kec. Martapura, Kab. Banjar 70613 Telp: (0511) 4789009',0,1,'C');
    // Garis Bawah Double
    $this->SetLineWidth(1);
    $this->Line(10,31,285,31);
    $this->SetLineWidth(0);
    $this->Line(10,32,285,32);
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
    $this->SetFont('Arial','',12);
    $this->Cell(150);
    $this->Cell(150,5,'BANJARMASIN, '.tgl_indo(date('Y-m-d')),0,1,'C');
    $this->Cell(150);
    $this->Cell(150,5,'MENGETAHUI',0,1,'C');
    $this->Cell(150);
    $this->Cell(150,5,'KEPALA SUB.BAG UMUM & KEPEGAWAIAN',0,1,'C');
    $this->Ln(16);
    $this->Cell(150);
    $this->SetFont('Arial','U',12);
    $this->Cell(150,5,'Ir. Akhmad Hairin, MP',0,1,'C');
    $this->Cell(150);
    $this->SetFont('Arial','',12);
    $this->Cell(150,5,'NIP. 19680129 199303 1 007',0,1,'C');
}}

//Membuat file PDF
$pdf = new PDF('L','mm','A4');

//Alias total halaman dengan default {nb} (berhubungan dengan PageNo())
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(100);
$pdf->Cell(100,5,'LAPORAN DATA CUTI TENAGA HONORER',0,1,'C');
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
//Mencetak kalimat dengan perulangan
$pdf->SetFillColor(24,224,23);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(7,6,'NO',1,0,'C',0);
$pdf->Cell(15,6,'ID',1,0,'C',0);
$pdf->Cell(35,6,'PENERIMA',1,0,'C',0);
$pdf->Cell(75,6,'NAMA PERUSAHAAN',1,0,'C',0);
$pdf->Cell(47,6,'TANGGAL SURAT',1,0,'C',0);
$pdf->Cell(40,6,'PENGIRIM',1,0,'C',0);
$pdf->Cell(50,6,'KONTAK',1,1,'C',0);
 
$pdf->SetFont('Arial','',10);
 
include 'koneksi.php';

if($_GET['bln']=='ALL'){
    $sql = mysqli_query($konek,"SELECT*FROM tb_surat_masuk");        
}else{
$bln = explode('-', $_GET['bln']);
$th = $bln[0];
$bl = $bln[1];
$sql = mysqli_query($konek,"SELECT*FROM tb_surat_masuk WHERE month(tanggal_surat)='$bl' AND year(tanggal_surat)='$th'");
}

$no =1;
while($row = mysqli_fetch_array($sql)){
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(7,6,$no,1,0,'C',0);
    $pdf->Cell(15,6,$row['id_penerima'],1,0,'C',0);
    $pdf->Cell(35,6,strtoupper($row['nama_penerima']),1,0,'C',0);
    $pdf->Cell(75,6,$row['perusahaan'],1,0,'L',0);
    $pdf->Cell(47,6,tgl_indo($row['tanggal_surat']),1,0,'C',0);
    $pdf->Cell(40,6,$row['nama_pengirim'],1,0,'C',0);
    $pdf->Cell(50,6,$row['kontak'],1,1,'L',0); 
    $no++;
}
$pdf->Ln(6);
$pdf->ttd();
//Menutup dokumen dan dikirim ke browser
$pdf->Output();
?>
