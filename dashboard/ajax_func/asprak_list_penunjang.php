<?php
require_once('../function/connect.php');
	if(isset($_GET['penunjang'])){
		$penunjang = $_GET['penunjang'];
		// if ($angkatan == ""){$angkatan}
	/// Assign a query
	$query = "SELECT * FROM penunjang WHERE id_jadwal = '$penunjang' order by pertemuan desc";
	// Execute the query
	$result = $con->query( $query );
	if(!$result){
		die('Could not connect to database : <br/>'.$con->error);
	}
	$i = 1;
	while($row = $result->fetch_object()){
		echo "<tr>";
		echo "<td>".$i."</td>";$i++;
			$resultt = $con->query("SELECT * FROM jadwal where id_jadwal= '$row->id_jadwal'");
			$roww = $resultt->fetch_object();
		echo "<td>".$roww->matkul."</td>";
		echo "<td>".$roww->kelas."</td>";
		echo "<td>".$row->pertemuan."</td>";
		echo "<td>".substr($row->conten, 0, 30) . '...'; 

		echo "<td align='right'>
				<a href='#' onClick='view(\"$row->id_penunjang\")'><i class='fa fa-eye fa-2x'></i></a>
				&nbsp; &nbsp;
				<a href='#' onClick='set(\"$row->id_penunjang\")'><i class='fa fa-edit fa-2x'></i></a>
				&nbsp; 
				<a href='#' onClick='confirm_delete(\"function/penunjang_hapus_asprak.php?idp=$row->id_penunjang\",\"$roww->matkul $roww->kelas\")'><i class='fa fa-trash-o fa-2x'></i></a>
			 </td>";
		echo "</tr>";
	}
	}			
?>

<!-- admin_mahasiswa.php?nim=\"$row->nim\"  -->