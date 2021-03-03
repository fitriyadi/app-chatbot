<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['ubah']))
{	
	//Proses Hapus Terlebih dahulu
	mysqli_query($mysqli,"delete from tb_pertanyaan_rule where idpertanyaan='".$_POST['idpertanyaan']."'");
	
	//Proses penambahan Aturan
	foreach ($_POST['katakunci'] as $key => $value) {
		simpan($mysqli,$_POST['idpertanyaan'],$key);
	}

	echo "<script>alert('Data Pertanyaan Kata Kunci Berhasil Disimpan')</script>";
	echo "<script>window.location='index.php?hal=aturan';</script>";	

}

function simpan($mysqli,$idpertanyaan,$idkatakunci){
	$stmt = $mysqli->prepare("INSERT INTO tb_pertanyaan_rule 
		(idpertanyaan,idkatakunci) 
		VALUES (?,?)");

	$stmt->bind_param("ss", 
		$idpertanyaan,
		$idkatakunci);	

	$stmt->execute();
}
?>