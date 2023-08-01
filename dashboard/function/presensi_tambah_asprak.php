

<?php
require_once('connect.php');
$idj= $_GET['idj'];
$status = $_POST['status'];
$pertemuan = $_POST['pertemuan'];
	$i = 1;
	/// Assign a query
	$query = "SELECT * FROM praktikum WHERE id_jadwal ='$idj' and status='$status' ";
	// Execute the query
	$result = $con->query( $query );
	if(!$result){
		die('Could not connect to database : <br/>'.$con->error);
	}

	while($row = $result->fetch_object()){
		$kehadiran = $_POST['hadir'.$i];
		$keterangan = $_POST['ket'.$i];
	   	$nim=$_POST['nim'.$i];
	   		$result2 = $con->query( "SELECT id_praktikum from praktikum where id_jadwal ='$idj' and nim ='$nim'"); 
	  		$row21 = $result2->fetch_object();

		
	    $tambahdata = $con->query( "INSERT INTO `presensi`(`id_praktikum`, `pertemuan`, `kehadiran`, `keterangan`) VALUES ('$row21->id_praktikum','$pertemuan','$kehadiran','$keterangan')"); 
	
	
	?>
		
		
	<?php $i++;
	}
	if ($tambahdata) {
  		header('location:../asprak_presensi.php?alert=1');
	} else {
  		header('location:../asprak_presensi.php?alert=2');
	}			
?>
