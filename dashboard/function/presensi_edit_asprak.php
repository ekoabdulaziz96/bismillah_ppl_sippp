<?php
require_once 'connect.php';



$idprak= $_GET['idprak'];
$pertemuan = $_POST['pertemuan'];
$kehadiran = $_POST['kehadiran'];
$keterangan = $_POST['keterangan'];

// echo $idprak.$pertemuan.$kehadiran.$keterangan;

$updatedata = $con->query("UPDATE presensi SET kehadiran='$kehadiran',keterangan='$keterangan' WHERE id_praktikum = '$idprak' and pertemuan = '$pertemuan'");

if ($updatedata) {
  header('location:../asprak_presensi.php?alert=3');
} else {
  header('location:../asprak_presensi.php?alert=4');
}
 ?>
