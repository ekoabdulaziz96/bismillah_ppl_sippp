<?php
  ob_start();
  error_reporting(0);

	require_once('connect.php');

	$site_name="SIPPP";

	date_default_timezone_set("Asia/Jakarta");

	
	session_start();
	if(isset($_SESSION['user'])){
	  $id_user = $_SESSION['user'];
	   $status = $con->query("SELECT * FROM user WHERE id_user='$id_user'");
	   $statuss = $status->fetch_object();
	}
	else header("Location:./login.php");

?>