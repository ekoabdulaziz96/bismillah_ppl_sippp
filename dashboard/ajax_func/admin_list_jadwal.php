<?php
require_once('../function/connect.php');
	if(isset($_GET['idj'])){
		$id_jadwal= $_GET['idj'];
		// $th = $_GET['th_ajaran'];
		$queryid = "SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal'";
		$resultid = $con->query( $queryid );
		$rowid = $resultid->fetch_object();

		// if ($angkatan == ""){$angkatan}
	/// Assign a query
	$query = "SELECT * FROM jadwal WHERE semester = '$rowid->semester' AND th_ajaran='$rowid->th_ajaran'";
	// Execute the query
	$result = $con->query( $query );
	if(!$result){
		die('Could not connect to database : <br/>'.$con->error);
	}
	$i = 1;
	while($row = $result->fetch_object()){
		echo "<tr>";
		echo "<td>".$i."</td>";$i++;
		echo "<td>".$row->matkul."</td>";
		echo "<td>".$row->hari."</td>";
		echo "<td>".$row->jam."</td>";
		echo "<td>".$row->ruang."</td>";
		echo "<td>".$row->kelas."</td>";
		echo "<td>".$row->max_prak."</td>";


		echo "<td align='right'>
				<a href='#' onClick='set(\"$row->id_jadwal\")'><i class='fa fa-edit fa-2x'></i></a>
				&nbsp &nbsp
				<a href='#' onClick='confirm_delete(\"function/jadwal_hapus.php?idj=$row->id_jadwal\",\"$row->matkul\")'><i class='fa fa-trash-o fa-2x'></i></a>
			 </td>";
		echo "</tr>";
	}
	}			
?>

<!-- admin_mahasiswa.php?nim=\"$row->nim\"  -->