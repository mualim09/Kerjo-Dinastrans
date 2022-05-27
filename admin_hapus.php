<?php
session_start();
include "koneksi.php";

$id = $_GET['ref'];
$sql = mysqli_query($konek,"DELETE FROM tb_admin WHERE id_admin='$id'");
if($sql){
	$_SESSION['pesan']='Hapus Data Berhasil !!';
	header("location:admin");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!';
	header("location:admin");
}
?>