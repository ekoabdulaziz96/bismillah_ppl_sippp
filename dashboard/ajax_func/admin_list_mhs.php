<?php
require_once('../function/connect.php');
	if(isset($_GET['angkatan'])){
		$angkatan = $_GET['angkatan'];
		// if ($angkatan == ""){$angkatan}
	/// Assign a query
	$query = "SELECT * FROM mahasiswa WHERE angkatan = '$angkatan' ";
	// Execute the query
	$result = $con->query( $query );
	if(!$result){
		die('Could not connect to database : <br/>'.$con->error);
	}
	$i = 1;
	while($row = $result->fetch_object()){
		echo "<tr>";
		echo "<td>".$i."</td>";$i++;
		echo "<td>".$row->nim."</td>";
		echo "<td>".$row->nama."</td>";
		echo "<td>".$row->angkatan."</td>";
		echo "<td>".$row->cp."</td>";
		echo "<td align='right'>
				<a href='#' onClick='set(\"$row->nim\")'><i class='fa fa-edit fa-2x'></i></a>
				&nbsp &nbsp
				<a href='#' onClick='confirm_delete(\"function/mahasiswa_hapus.php?nim=$row->nim\",\"$row->nama\")'><i class='fa fa-trash-o fa-2x'></i></a>
			 </td>";
		echo "</tr>";
	}
	}			
?>

<!-- admin_mahasiswa.php?nim=\"$row->nim\"  -->