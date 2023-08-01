<?php
require_once 'connect.php';
$idjlama = $_GET['idjlama'];

$max = $_POST['max'];
$matkul = $_POST['matkul'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$ruang = $_POST['ruang'];
$kelas = $_POST['kelas'];
$semester = $_POST['semester'];
$th_ajaran = $_POST['th_ajaran'];

$resultt = $con->query( "SELECT * FROM jadwal where matkul = '$matkul' and kelas ='$kelas'and semester ='$semester'and th_ajaran ='$th_ajaran' and id_jadwal!='$idjlama'"); 
$rows = mysqli_num_rows($resultt);

$result2 = $con->query( "SELECT * FROM jadwal where hari = '$hari' and jam ='$jam'and ruang ='$ruang'and semester ='$semester'and th_ajaran ='$th_ajaran'and id_jadwal!='$idjlama'"); 
	   $row2 = mysqli_num_rows($result2);

if ($rows !=0) { 
	header('location:../admin_jadwal.php?alert=13');
}else if ($row2 !=0) { 
	   		header('location:../admin_jadwal.php?alert=12');
	   }
		else{
		$updateasprak = $con->query("UPDATE jadwal SET max_prak= '$max',matkul= '$matkul',hari= '$hari',jam= '$jam',ruang= '$ruang',kelas= '$kelas', semester ='$semester', th_ajaran ='$th_ajaran'
		 WHERE id_jadwal = '$idjlama'");

		if($updateasprak){
		  header('location:../admin_jadwal.php?alert=3');
		}
		else
		   header('location:../admin_jadwal.php?alert=4');

	}

 ?>
