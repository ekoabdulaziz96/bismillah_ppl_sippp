<?php
require_once('../function/connect.php');
	if(isset($_GET['hari'])){
		$hari= $_GET['hari'];
		$th = $_GET['th'];
		$sems = $_GET['sems'];
		// echo $th.$sems.$hari;
		// $th = $_GET['th_ajaran'];
		$result = $con->query( "SELECT * FROM jadwal WHERE th_ajaran='$th' and semester='$sems' and hari = '$hari' order by jam asc" );
	if(!$result){
		die('Could not connect to database : <br/>'.$con->error);
	}
	while($row = $result->fetch_object()){
		if($row->matkul!='semua'){ 
		echo "<tr>";
	
		echo "<td>".$row->jam."</td>";
		echo "<td>".$row->matkul."</td>";
		echo "<td>".$row->kelas."</td>";
		echo "<td>".$row->ruang."</td>";
		
		echo "</tr>";
		}
	}
}			
?>

<!-- admin_mahasiswa.php?nim=\"$row->nim\"  -->