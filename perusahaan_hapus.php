<?php
session_start();
include "koneksi.php";

$id = $_GET['ref'];
$sql = mysqli_query($konek,"DELETE FROM tb_perusahaan WHERE id_perusahaan='$id'");
if($sql){
	$_SESSION['pesan']='Hapus Data Berhasil !!';
	header("location:perusahaan");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!';
	header("location:perusahaan");
}
?>