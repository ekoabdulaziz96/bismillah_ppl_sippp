<?php
require_once 'connect.php';
$nim = $_GET['nim'];
$idj = $_GET['idj'];

$hapus_data = $con->query("DELETE FROM praktikum WHERE id_jadwal='$idj' and nim ='$nim'");
if ($hapus_data) {
  header('location:../admin_praktikum.php?alert=5');

} else {
  header('location:../admin_praktikum.php?alert=6');
}
 ?>
