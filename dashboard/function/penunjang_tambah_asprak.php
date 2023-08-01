<?php
require_once 'connect.php';



$idj= $_GET['idj'];
$pertemuan = $_POST['pertemuan'];
$conten = $_POST['conten'];


$tambahdatapenunjang = $con->query("INSERT INTO penunjang(id_jadwal,pertemuan,conten) VALUES ('$idj','$pertemuan','$conten')");
if ($tambahdatapenunjang) {
  header('location:../asprak_penunjang.php?alert=1');
} else {
  header('location:../asprak_penunjang.php?alert=2');
}
 ?>
