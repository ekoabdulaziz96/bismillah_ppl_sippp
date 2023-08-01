<?php
require_once 'connect.php';

$max = $_POST['max'];
$matkul = $_POST['matkul'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$ruang = $_POST['ruang'];
$kelas = $_POST['kelas'];
$semester = $_POST['semester'];
$th_ajaran = $_POST['th_ajaran'];

$resultt = $con->query( "SELECT * FROM jadwal where matkul = '$matkul' and kelas ='$kelas'and semester ='$semester'and th_ajaran ='$th_ajaran'"); 
$rows = mysqli_num_rows($resultt);

$result2 = $con->query( "SELECT * FROM jadwal where hari = '$hari' and jam ='$jam'and ruang ='$ruang'and semester ='$semester'and th_ajaran ='$th_ajaran'"); 
	   $row2 = mysqli_num_rows($result2);

if ($rows !=0) { 
	header('location:../admin_jadwal.php?alert=13');
}else if ($row2 !=0) { 
	   		header('location:../admin_jadwal.php?alert=12');
	   }
		else{
		$tambahdatajadwal = $con->query("INSERT INTO jadwal(max_prak,matkul,hari,jam,ruang,kelas,semester,th_ajaran) 
			VALUES ('$max','$matkul','$hari','$jam','$ruang', '$kelas', '$semester', '$th_ajaran')");
		if ($tambahdatajadwal) {
		  header('location:../admin_jadwal.php?alert=1');
		} else 
		  header('location:../admin_jadwal.php?alert=2');

	}
 ?>
