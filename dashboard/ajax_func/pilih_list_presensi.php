<?php
require_once('../function/connect.php');
	if(isset($_GET['idj'])){
		$id_jadwal= $_GET['idj'];
		$pertemuan= $_GET['pertemuan'];
		$status= $_GET['status'];

		$queryid = "SELECT * FROM presensi WHERE id_praktikum in (select id_praktikum from praktikum where  id_jadwal='$id_jadwal' and status = '$status') and pertemuan ='$pertemuan'";
		$resultid = $con->query( $queryid );

	if(!$resultid){
		die('Could not connect to database : <br/>'.$con->error);
	}

	$i = 1;
	while($rowid = $resultid->fetch_object()){
				echo $id_jadwal."|".$pertemuan.$status;
		echo "<tr>";
		echo "<td>".$i."</td>";$i++;
			$result1 = $con->query( "SELECT * FROM praktikum WHERE id_praktikum = '$rowid->id_praktikum'" );
			$row1 = $result1->fetch_object();
		 echo "<td>".$row1->nim."</td>";
			$result2 = $con->query( "SELECT * FROM mahasiswa WHERE nim = '$row1->nim'" );
			$row2 = $result2->fetch_object();
		 echo "<td>".$row2->nama."</td>";
		echo "<td>".$rowid->pertemuan."</td>";
		echo "<td>".$rowid->kehadiran."</td>";
		echo "<td>".$rowid->keterangan."</td>";

		
		echo "</tr>";
	}



	}			
?>

<!-- admin_mahasiswa.php?nim=\"$row->nim\"  -->