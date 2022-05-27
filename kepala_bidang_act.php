<?php
session_start();
include "koneksi.php";

$ni = $_POST['nip'];
$nm = $_POST['nama'];
$jb = $_POST['jbtn'];

$sql = mysqli_query($konek,"INSERT INTO tb_pegawai VALUES ('$ni','$nm','$jb')");

if($sql){
	$_SESSION['pesan']='Simpan Data BERHASIL !!!';
	header("location:kepala_bidang_tambah");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!!';
	header("location:kepala_bidang_tambah");
}
?>