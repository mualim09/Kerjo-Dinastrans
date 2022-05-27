<?php
session_start();
include "koneksi.php";

$ni = $_GET['ref'];

$sql = mysqli_query($konek,"DELETE FROM tb_pegawai WHERE nip='$ni'");

if($sql){
	$_SESSION['pesan']='Udpate Data BERHASIL !!!';
	header("location:kepala_bidang");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!!';
	header("location:kepala_bidang");
}
?>