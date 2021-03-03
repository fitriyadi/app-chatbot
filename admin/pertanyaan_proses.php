<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan Pertanyaan
	$stmt = $mysqli->prepare("INSERT INTO tb_pertanyaan 
		(idpertanyaan,jenis,pertanyaan,jawaban) 
		VALUES (?,?,?,?)");

	$stmt->bind_param("ssss",
		$_POST['idpertanyaan'],
		$_POST['jenis'],
		$_POST['pertanyaan'],
		$_POST['jawaban']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Pertanyaan Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=pertanyaan';</script>";	
	} else {
		echo "<script>alert('Data Pertanyaan Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_pertanyaan  SET 
		jenis=?,
		pertanyaan=?,
		jawaban=?
		where idpertanyaan=?");
	$stmt->bind_param("ssss",
		$_POST['jenis'],
		$_POST['pertanyaan'],
		$_POST['jawaban'],
		$_POST['idpertanyaan']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Pertanyaan Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=pertanyaan';</script>";	
	} else {
		echo "<script>alert('Data Pertanyaan Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_pertanyaan where idpertanyaan=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Pertanyaan Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=pertanyaan';</script>";	
	} else {
		echo "<script>alert('Data Pertanyaan Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>