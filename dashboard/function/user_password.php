<?php
require_once 'connect.php';

$idu = $_GET['idu'];
$akses = $_GET['akses'];



$passlama = $_POST['passlama'];
$passbaru = $_POST['passbaru'];
$result = $con->query( "SELECT * FROM user where id_user ='$idu'"); 
$rows = $result->fetch_object();
	if ($passlama == $rows->password){

	$update = $con->query("UPDATE user SET password='$passbaru' WHERE id_user = '$idu'");

	if($update){
	  header('location:../index.php?alert=15');
	}
	else{
	   header('location:../index.php?alert=16');
	}
}
else 
	   header('location:../index.php?alert=16');

 ?>
