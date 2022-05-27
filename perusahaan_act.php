<?php
session_start();
include "koneksi.php";

$id = $_POST['id'];
$nm = strtoupper($_POST['nama']);
$al = ucwords($_POST['alm']);
$pi = strtoupper($_POST['pic']);
$jb = strtoupper($_POST['jbtn']);
$kt = $_POST['con'];
$ds = $_POST['des'];

$sql = mysqli_query($konek,"INSERT INTO tb_perusahaan VALUES ('$id','$nm','$al','$pi','$jb','$kt','$ds')");

if($sql){
	$_SESSION['pesan']='Simpan Data BERHASIL !!!';
	header("location:perusahaan_tambah");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!!';
	header("location:perusahaan_tambah");
}
?>