<?php
session_start();
include "koneksi.php";

$id = $_POST['id'];
$td = $_POST['tgl_cari'];
$kt = $_POST['ktp'];
$nm = strtoupper($_POST['nama']);
$tl = strtoupper($_POST['tmp']);
$tg = $_POST['tgl'];
$jk = $_POST['jk'];
$ag = $_POST['agama'];
$al = ucwords($_POST['alm']);
$st = $_POST['status'];
$tb = $_POST['tb'];
$bb = $_POST['bb'];
$hp = $_POST['hp'];
$em = strtolower($_POST['email']);
$pd = strtoupper($_POST['pend']);
$jr = strtoupper($_POST['jrs']);
$th = $_POST['thn'];
$ni = $_POST['nilai'];

$sql = mysqli_query($konek,"UPDATE tb_pencaker SET tanggal_pendaftar='$td',no_ktp='$kt',nama='$nm',tempat_lahir='$tl',tanggal_lahir='$tg',jenis_kelamin='$jk',agama='$ag',alamat='$al',status='$st',tinggi_badan='$tb',berat_badan='$bb',no_hp='$hp',email='$em',pendidikan='$pd',jurusan='$jr',tahun='$th',nilai='$ni' WHERE id_pencaker='$id'");

if($sql){
	$_SESSION['pesan']='Update Data BERHASIL !!!';
	header("location:pencari_kerja");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!!';
	header("location:pencari_kerja");
}
?>