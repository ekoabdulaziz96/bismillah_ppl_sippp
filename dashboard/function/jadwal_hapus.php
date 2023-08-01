<?php
require_once 'connect.php';
$idj = $_GET['idj'];
$hapus_data= $con->query("DELETE FROM jadwal WHERE id_jadwal='$idj'");
if ($hapus_data) {
  header('location:../admin_jadwal.php?alert=5');
} else {
  header('location:../admin_jadwal.php?alert=6');
}
 ?>
