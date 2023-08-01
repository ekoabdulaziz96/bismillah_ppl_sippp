<?php
require_once 'connect.php';

$nimlama = $_GET['nimlama'];

$nimbaru = $_POST['nimbaru'];
$nama = $_POST['nama'];
$angkatan = $_POST['angkatan'];
$cp = $_POST['cp'];



$update = $con->query("UPDATE mahasiswa SET nim='$nimbaru', nama='$nama', angkatan='$angkatan', cp ='$cp' WHERE mahasiswa.nim = '$nimlama'");

if($update){
  header('location:../admin_mahasiswa.php?alert=3');
}
else{
   header('location:../admin_mahasiswa.php?alert=4');
}
 ?>
