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
$ff = $_POST['file'];

if(empty($tmp)){
	$sql = "UPDATE tb_surat_masuk SET nama_penerima='$nm',perusahaan='$pr',tanggal_surat='$tg',nama_pengirim='$pe',kontak='$kt' WHERE id_penerima='$id'";
	mysqli_query($konek,$sql);
	if($sql){
		$_SESSION['pesan']='Simpan Data BERHASIL !!!';
		header("location:surat_masuk?bln=ALL");
	}else{
		$_SESSION['pesan']='Terjadi Kesalahan !!!';
		header("location:surat_masuk?bln=ALL");
	}
}else{
	unlink('lampiran/'.$ff);
	
	move_uploaded_file($tmp,'lampiran/'.$fl);	
	$sql = "UPDATE tb_surat_masuk SET nama_penerima='$nm',perusahaan='$pr',tanggal_surat='$tg',nama_pengirim='$pe',kontak='$kt',upload='$fl' WHERE id_penerima='$id'";
	mysqli_query($konek,$sql);
	if($sql){
		$_SESSION['pesan']='Simpan Data BERHASIL !!!';
		header("location:surat_masuk?bln=ALL");
	}else{
		$_SESSION['pesan']='Terjadi Kesalahan !!!';
		header("location:surat_masuk?bln=ALL");
	}
}
?>