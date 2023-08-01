<?php
require_once 'connect.php';


$nama = $_POST['nama'];
$pass = $_POST['pass'];
$hak = $_POST['hak'];
$kep = $_POST['kep'];

$resultt = $con->query( "SELECT username FROM user where '$nama' in (select username from user)"); 
$rows = mysqli_num_rows($resultt);
if ($rows ==0) { 
	$tambahdata = $con->query("INSERT INTO user(username,password,hakAkses,kepentingan) VALUES ('$nama','$pass','$hak','$kep')");
	if ($tambahdata) {
	  header('location:../admin_user.php?alert=1');
	} else {
	  header('location:../admin_user.php?alert=2');
	}
}else
	  header('location:../admin_user.php?alert=11');
 ?>
