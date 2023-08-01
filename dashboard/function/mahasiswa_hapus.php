<?php
require_once 'connect.php';
$nim = $_GET['nim'];
$hapus_data= $con->query("DELETE FROM mahasiswa WHERE nim='$nim'");
if ($hapus_data) {
  header('location:../admin_mahasiswa.php?alert=5');
} else {
  header('location:../admin_mahasiswa.php?alert=6');
}
 ?>
