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

$sql = mysqli_query($konek,"UPDATE tb_info SET tgl_mulai='$tm',tgl_selesai='$ts',perusahaan='$pr',pic='$pi',kontak='$hp',alamat='$al' WHERE id='$id'");

if($sql){
	$_SESSION['pesan']='Simpan Data BERHASIL !!!';
	header("location:lowongan");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!!';
	header("location:lowongan");
}
?>