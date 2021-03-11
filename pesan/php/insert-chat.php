<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if(!empty($message)){
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
            VALUES ('$incoming_id', '$outgoing_id', '$message')") or die();
    }

        //Rule Data
    if($message=='tanya'){
        $pesan='jawaban tanya';
        $sql = mysqli_query($conn, "INSERT INTO messages (outgoing_msg_id, incoming_msg_id, msg)
            VALUES ('$incoming_id', '$outgoing_id', '$pesan')") or die();

    }else if($message=='program'){
     $pesan='jawaban program';
     $sql = mysqli_query($conn, "INSERT INTO messages (outgoing_msg_id, incoming_msg_id, msg)
        VALUES ('$incoming_id', '$outgoing_id', '$pesan')") or die();

 }else{
    $pesan='Maaf kata kunci tidak ditemukan, silakan bertanya untuk pertanyaan yang lain';
    $sql = mysqli_query($conn, "INSERT INTO messages (outgoing_msg_id, incoming_msg_id, msg)
        VALUES ('$incoming_id', '$outgoing_id', '$pesan')") or die();
}
}



?>