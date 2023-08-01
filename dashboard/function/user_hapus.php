<?php
require_once 'connect.php';
$id = $_GET['id'];
$hapus_data_user= $con->query("DELETE FROM user WHERE id_user='$id'");
if ($hapus_data_user) {
  header('location:../admin_user.php?alert=5');
} else {
  header('location:../admin_user.php?alert=6');
}
 ?>
