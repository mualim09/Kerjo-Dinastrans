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

$sql = mysqli_query($konek,"INSERT INTO tb_pencaker VALUES ('$id','$td','$kt','$nm','$tl','$tg','$jk','$ag','$al','$st','$tb','$bb','$hp','$em','$pd','$jr','$th','$ni')");

if($sql){
	$_SESSION['pesan']='Simpan Data BERHASIL !!!';
	header("location:pencari_kerja_tambah");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!!';
	header("location:pencari_kerja_tambah");
}
?>