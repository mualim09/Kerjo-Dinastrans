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

$sql = mysqli_query($konek,"UPDATE tb_perusahaan SET perusahaan='$nm',alamat='$al',nama_PIC='$pi',jabatan='$jb',kontak='$kt',deskripsi='$ds' WHERE id_perusahaan='$id' ");

if($sql){
	$_SESSION['pesan']='Update Data BERHASIL !!!';
	header("location:perusahaan");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!!';
	header("location:perusahaan");
}
?>