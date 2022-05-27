<?php
session_start();
include "koneksi.php";

$id = $_GET['ref'];
$sql = mysqli_query($konek,"DELETE FROM tb_pencaker WHERE id_pencaker='$id'");
if($sql){
	$_SESSION['pesan']='Hapus Data Berhasil !!';
	header("location:pencari_kerja");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!';
	header("location:pencari_kerja");
}
?>