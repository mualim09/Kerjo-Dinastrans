<?php
session_start();
include "koneksi.php";

$id = $_GET['ref'];
$sql = mysqli_query($konek,"DELETE FROM tb_info WHERE id='$id'");
if($sql){
	$_SESSION['pesan']='Hapus Data Berhasil !!';
	header("location:lowongan?bln=ALL");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!';
	header("location:lowongan?bln=ALL");
}
?>