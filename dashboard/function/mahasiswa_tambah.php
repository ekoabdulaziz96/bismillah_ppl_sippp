<?php
require_once 'connect.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$angkatan = $_POST['angkatan'];
$cp = $_POST['cp'];

$tambahda = $con->query("INSERT INTO mahasiswa(nim,nama,angkatan,cp) VALUES ('$nim','$nama','$angkatan','$cp')");
if ($tambahda) {
  header('location:../admin_mahasiswa.php?alert=1');
} else {
  header('location:../admin_mahasiswa.php?alert=2');
}
 ?>
