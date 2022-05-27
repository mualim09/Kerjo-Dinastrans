<?php
session_start();
include "koneksi.php";

$id = $_POST['id'];
$nm = $_POST['nama'];
$un = $_POST['user'];
$pw = $_POST['pass'];
$em = $_POST['email'];
$hp = $_POST['hp'];

$sql = mysqli_query($konek,"INSERT INTO tb_admin VALUES ('$id','$nm','$un','$pw','$em','$hp')");

if($sql){
	$_SESSION['pesan']='Simpan Data BERHASIL !!!';
	header("location:admin");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!!';
	header("location:admin");
}
?>