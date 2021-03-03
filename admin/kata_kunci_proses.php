<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan sdm
	$stmt = $mysqli->prepare("INSERT INTO tb_kata_kunci 
		(idkatakunci,katakunci) 
		VALUES (?,?)");

	$stmt->bind_param("ss",
		$_POST['idkatakunci'],
		$_POST['katakunci']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Kata Kunci Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=kata_kunci';</script>";	
	} else {
		echo "<script>alert('Data Kata Kunci Gagal Disimpan')</script>";
		//echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_kata_kunci  SET 
		katakunci=?
		where idkatakunci=?");
	$stmt->bind_param("ss",
		$_POST['katakunci'],
		$_POST['idkatakunci']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Kata Kunci Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=kata_kunci';</script>";	
	} else {
		echo "<script>alert('Data Kata Kunci Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_kata_kunci where idkatakunci=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Kata Kunci Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=sdm';</script>";	
	} else {
		echo "<script>alert('Data Kata Kunci Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>