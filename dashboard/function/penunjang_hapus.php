<?php
require_once 'connect.php';

$idp = $_GET['idp'];
$hapus_data_penunjang= $con->query("DELETE FROM penunjang WHERE id_penunjang='$idp'");
if ($hapus_data_penunjang) {
  header('location:../admin_penunjang.php?alert=5');
} else {
header('location:../admin_penunjang.php?alert=6');
}
 ?>
