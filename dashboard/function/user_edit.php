<?php
require_once 'connect.php';

$idlama = $_GET['idlama'];


$nama = $_POST['nama'];
$pass = $_POST['pass'];
$hak = $_POST['hak'];
$kep = $_POST['kep'];


$resultt = $con->query( "SELECT username FROM user where username = '$nama' and id_user <> '$idlama'"); 
$rows = mysqli_num_rows($resultt);
if ($rows ==0) { 

	$update = $con->query("UPDATE user SET username='$nama',password='$pass',hakAkses='$hak',kepentingan='$kep' WHERE id_user = '$idlama'");

	if($update){
	  header('location:../admin_user.php?alert=3');
	}
	else{
	   header('location:../admin_user.php?alert=4');
	}
}else 
	  header('location:../admin_user.php?alert=11');

 ?>
