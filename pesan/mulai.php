<?php
require_once 'php/config.php';
session_start();
$_SESSION['unique_id']=substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz"), 0, 8);
$_SESSION['dikirim']='622798916';
$id=$_SESSION['unique_id'];

$insert_query = mysqli_query($conn, "INSERT INTO users (unique_id)
	VALUES ('$id')");

if($insert_query){
	echo "Berhasil";
}else{
	echo "Gagal";
}

$outgoing_id = $_SESSION['unique_id'];
$incoming_id = '622798916';
$pesan='Selamat data di aplikasi Charbot UKDW, silakan tanyakan seputar Program Studi, Beasiswa dan Akreditasi';
$sql = mysqli_query($conn, "INSERT INTO messages (outgoing_msg_id, incoming_msg_id, msg)
	VALUES ('$incoming_id', '$outgoing_id', '$pesan')") or die();

echo "<script>window.location='chat.php?user_id=622798916';</script>";

?>