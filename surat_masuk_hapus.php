<?php
session_start();
include "koneksi.php";

$id = $_GET['ref'];
$sql = mysqli_query($konek,"SELECT upload FROM tb_surat_masuk WHERE id_penerima='$id'");
foreach($sql as $hs);
$foto = $hs['upload'];

$qry = mysqli_query($konek,"DELETE FROM tb_surat_masuk WHERE id_penerima='$id'");
unlink('lampiran/'.$foto);

if($qry){
	$_SESSION['pesan']='Hapus Data Berhasil!!';
	header("location:surat_masuk");
}else{
	$_SESSION['pesan']='Terjadi Kesalahan!!';
	header("location:surat_masuk");
}
?>