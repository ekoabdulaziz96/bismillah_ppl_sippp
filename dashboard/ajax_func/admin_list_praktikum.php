<?php
require_once('../function/connect.php');
	if(isset($_GET['idj'])){
		$id_jadwal= $_GET['idj'];
		$status= $_GET['status'];


		$queryid = "SELECT * FROM praktikum WHERE id_jadwal='$id_jadwal' and status ='$status'";
		$resultid = $con->query( $queryid );

	if(!$resultid){
		die('Could not connect to database : <br/>'.$con->error);
	}
	$i = 1;
	while($rowid = $resultid->fetch_object()){
		echo "<tr>";
		echo "<td>".$i."</td>";$i++;
		echo "<td>".$rowid->nim."</td>";

			$result1 = $con->query( "SELECT * FROM mahasiswa WHERE nim = '$rowid->nim'" );
			$row1 = $result1->fetch_object();
		 echo "<td>".$row1->nama."</td>";

		 	$result2 = $con->query( "SELECT * FROM jadwal WHERE id_jadwal = '$rowid->id_jadwal'" );
			$row2 = $result2->fetch_object();
		 echo "<td>".$row2->matkul.' '.$row2->kelas."</td>";

		echo "<td>".$rowid->semester."</td>";
		echo "<td>".$rowid->status."</td>";
		

		echo "<td align='right'>
				<a href='#' onClick='set(\"$rowid->nim\",\"$rowid->id_jadwal\")'><i class='fa fa-edit fa-2x'></i></a>
				&nbsp &nbsp
				<a href='#' onClick='confirm_delete(\"function/praktikum_hapus.php?nim=$rowid->nim&idj=$rowid->id_jadwal\",\"$row1->nama\")'><i class='fa fa-trash-o fa-2x'></i></a>
			 </td>";

		echo "</tr>";
	}
	}			
?>

<!-- admin_mahasiswa.php?nim=\"$row->nim\"  -->