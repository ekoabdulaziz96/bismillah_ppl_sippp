<?php
require_once 'connect.php';

$idjlama = $_GET['idjlama'];
$nimlama = $_GET['nimlama'];

$idj= $_POST['idj'];
$status = $_POST['status'];
$semester = $_POST['semester'];


if ($idjlama != $idj){

$resultt = $con->query( "SELECT nim FROM praktikum where  id_jadwal <> '$idjlama' and nim ='$nimlama' "); 
$rows = mysqli_num_rows($resultt);
}else $rows =0;
if ($rows ==0) { 

	$updateasprak = $con->query("UPDATE praktikum SET id_jadwal='$idj',semester='$semester',status='$status' WHERE nim = '$nimlama' and id_jadwal = '$idjlama'");

	if($updateasprak){
	  header('location:../admin_praktikum.php?alert=3');
	}
	else{
	   header('location:../admin_praktikum.php?alert=4');
	}
}else 
	  header('location:../admin_praktikum.php?alert=14');
 ?>
