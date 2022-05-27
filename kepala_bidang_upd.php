<?php
session_start();
include "koneksi.php";

$ni = $_POST['nip'];
$nm = $_POST['nama'];
$jb = $_POST['jbtn'];

$sql = mysqli_query($konek,"UPDATE tb_pegawai SET nama_pegawai='$nm',jabatan='$jb' WHERE nip='$ni'");

if($sql){
	$_SESSION['pesan']='Udpate Data BERHASIL !!!';
	header("location:kepala_bidang");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!!';
	header("location:kepala_bidang");
}
?>