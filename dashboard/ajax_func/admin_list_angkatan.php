<?php
require_once('../function/connect.php');
	if(isset($_GET['angkatan'])){
		$angkatan = $_GET['angkatan'];
		$idj = $_GET['idj'];
		$status = $_GET['status'];
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
	  
	  	$resultt = $con->query( "SELECT nim FROM mahasiswa where nim = '$row->nim'and nim in (select nim from praktikum where id_jadwal = '$idj' )"); 
	  	$rows = mysqli_num_rows($resultt);
	   if ($rows !=1) { 
	?> 
	<label class="form-control">
	   <input type="checkbox" name="mahasiswa[]" value="<?php echo $row->nim ?>"

	   ><?php echo $row->nim." ".$row->nama ?> 
	<?php 
		 echo '</label>';
	}
	}
	}			
?>

<!-- admin_mahasiswa.php?nim=\"$row->nim\"  -->