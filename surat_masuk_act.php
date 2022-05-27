<?php
session_start();
include "koneksi.php";

$id = $_POST['id'];
$nm = $_POST['pic'];
$pr = $_POST['nama'];
$tg = $_POST['tgl'];
$pe = strtoupper($_POST['peng']);
$kt = $_POST['con'];
$fl = $_FILES['upd']['name'];
$tmp = $_FILES['upd']['tmp_name'];

move_uploaded_file($tmp, 'lampiran/'.$fl);

$sql = mysqli_query($konek,"INSERT INTO tb_surat_masuk VALUES ('$id','$nm','$pr','$tg','$pe','$kt','$fl')");

if($sql){
	$_SESSION['pesan']='Simpan Data BERHASIL !!!';
	header("location:surat_masuk_tambah");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan !!!';
	header("location:surat_masuk_tambah");
}
?>