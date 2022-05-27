<?php
session_start();
include "koneksi.php";

$id = $_POST['id'];
$tm = $_POST['tgm'];
$ts = $_POST['tgs'];
$pr = $_POST['per'];
$pi = $_POST['pic'];
$hp = $_POST['hp'];
$al = $_POST['alm'];

$sql = mysqli_query($konek,"INSERT INTO tb_info VALUES ('$id','$tm','$ts','$pr','$pi','$hp','$al')");

if($sql){
	$_SESSION['pesan']='Simpan Data BERHASIL !!!';
	header("location:lowongan_tambah");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!!';
	header("location:lowongan_tambah");
}
?>