<?php
require_once 'connect.php';

$idplama = $_GET['idplama'];


$idj= $_POST['idj'];
$pertemuan = $_POST['pertemuan'];
$conten = $_POST['conten'];

echo $idj.'|'.$pertemuan.'|'.$conten;

$update = $con->query("UPDATE penunjang SET  id_jadwal='$idj', pertemuan='$pertemuan', conten ='$conten' WHERE id_penunjang = '$idplama'");

if($update){
  header('location:../admin_penunjang.php?alert=3');
}
else{
   header('location:../admin_penunjang.php?alert=4');
}
 ?>
