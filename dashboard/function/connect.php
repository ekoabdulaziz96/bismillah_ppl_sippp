<?php
  $db_host="localhost";
  $db_username="root";
  $db_password="";
  $db_database="tawakal_sippp_v7";

  	$con = mysqli_connect($db_host, $db_username, $db_password, $db_database);
	if(mysqli_connect_errno()){
		die('Could not connect to database : <br/>'.$mysqli_connect_error());
	}

	ob_start();
  	error_reporting(0);

	$site_name="SIPPP";

	date_default_timezone_set("Asia/Jakarta");
?>