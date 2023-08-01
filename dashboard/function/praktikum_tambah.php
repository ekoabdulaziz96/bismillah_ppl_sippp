<?php
require_once 'connect.php';



$idj= $_POST['idj'];
$status = $_POST['status'];
$semester = $_POST['semester'];
$mhs = $_POST['mahasiswa'];


foreach ($mhs as  $nim) {
	# code...
// echo $nim;
$tambahdata = $con->query("INSERT INTO praktikum(nim,id_jadwal,semester,status) VALUES ('$nim','$idj','$semester','$status')");
}
if ($tambahdata) {
  header('location:../admin_praktikum.php?alert=1');
} else {
  header('location:../admin_praktikum.php?alert=2');
}
 ?>
