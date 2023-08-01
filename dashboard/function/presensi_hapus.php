<?php
require_once 'connect.php';
$pertemuan = $_GET['pertemuan'];
$idj = $_GET['idj'];

$hapus_data = $con->query("DELETE FROM presensi WHERE id_praktikum in (select id_praktikum from praktikum where id_jadwal = '$idj' )and pertemuan ='$pertemuan'");
if ($hapus_data) {
  header('location:../admin_presensi.php?alert=5');

} else {
  header('location:../admin_presensi.php?alert=6');
}
 ?>
