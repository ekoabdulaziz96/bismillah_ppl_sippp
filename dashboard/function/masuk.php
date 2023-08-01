<?php

	require_once('connect.php');

	 ob_start();
 	 error_reporting(0);

	require_once('connect.php');

	$site_name="SIPPP";

	date_default_timezone_set("Asia/Jakarta");
		if((isset($_POST['username']))&&(isset($_POST['password']))){
			$username =$_POST['username'];
			$password =$_POST['password'];
			// $password = md5($password);

			 $login = $con->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
			$rows = mysqli_num_rows($login);

			$login1 = $con->query("SELECT * FROM user WHERE username='$username'");
			$rows1 = mysqli_num_rows($login1);
			
			if ($rows == 1) {
	          //  var_dump('admin');
	           $hasil_login = $login->fetch_object();
     			session_start();

	             $_SESSION['user'] = $hasil_login->id_user;
	             $_SESSION['hakAkses'] = $hasil_login->hakAkses;
	             $_SESSION['kepentingan'] = $hasil_login->kepentingan;

	             if ($hasil_login->hakAkses == 'admin')
	             header('location:../pilih.php');
	         	else
	         		header('location:../index.php'); 
   
            }
          	elseif ($rows1 != 0 ){
     			session_start();

           		 $_SESSION['warning'] ="(*) Maaf, password yang anda masukkan salah. Silahkan cek kembali";
                header("Location:../login.php?username=$username");
              }
              else {
     			session_start();

           		 $_SESSION['warning'] ="(*) Maaf, Username dan Password belum terdaftar. Silahkan cek kembali";
                header("Location:../login.php?");
              }

		  }else{
			header("Location:../login.php");
		  }

?>

