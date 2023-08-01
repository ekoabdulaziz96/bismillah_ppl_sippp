<?php
require_once('../function/connect.php');
	if(isset($_GET['akses'])){
		$akses = $_GET['akses'];
		$th = $_GET['th'];
		$sems = $_GET['sems'];

	/// Assign a query
	$query = "SELECT * FROM user WHERE hakAkses = '$akses' and kepentingan in (select id_jadwal from jadwal where th_ajaran ='$th' and semester='$sems') ";
	// Execute the query
	$result = $con->query( $query );
	if(!$result){
		die('Could not connect to database : <br/>'.$con->error);
	}
	$i=1;
	while($row = $result->fetch_object()){
		echo "<tr>";
		echo "<td>".$i."</td>";$i++;
		echo "<td>".$row->username."</td>";
		echo "<td>".substr(md5($row->password), 0, 10)."</td>";
		echo "<td>".$row->hakAkses."</td>";
			$resultt = $con->query("SELECT * FROM jadwal where id_jadwal= '$row->kepentingan'");
			$roww = $resultt->fetch_object();
		echo "<td>"; if ($row->kepentingan =="semua"){echo $row->kepentingan;}
					else{ echo $roww->matkul.' '. $roww->kelas;}
		echo "</td>";
		echo "<td align='right'>
				<a href='#' onClick='set(\"$row->id_user\")'><i class='fa fa-edit fa-2x'></i></a>
				&nbsp &nbsp
				<a href='#' onClick='confirm_delete(\"function/user_hapus.php?id=$row->id_user\",\"$row->username\")'><i class='fa fa-trash-o fa-2x'></i></a>
			 </td>";
		echo "</tr>";
	
	}
	}			
?>

<!-- admin_mahasiswa.php?nim=\"$row->nim\"  -->