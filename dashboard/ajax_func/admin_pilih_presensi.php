<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
	<thead>
	<tr class="success">
		<th>No</th>
		<th>NIM</th>
		<th>Nama</th>		
		<th>Prak</th>
		<th>Kehadiran</th>
		<th>Keterangan</th>


		</tr>
	</thead>
	<tbody>


<?php
require_once('../function/connect.php');
	if(isset($_GET['idj'])){
		$pertemuan = $_GET['pertemuan'];
		$idj = $_GET['idj'];
		$status = $_GET['status'];

	 
	/// Assign a query
	$query = "SELECT * FROM praktikum WHERE id_jadwal ='$idj' and status='$status' ";
	// Execute the query
	$result = $con->query( $query );
	if(!$result){
		die('Could not connect to database : <br/>'.$con->error);
	}
	$i = 1;
	while($row = $result->fetch_object()){
	  
	  	// $resultt = $con->query( "SELECT nim FROM mahasiswa where nim = '$row->nim'and nim in (select nim from praktikum where id_jadwal = '$idj' )"); 
	  	// $rows = mysqli_num_rows($resultt);
	   // if ($rows !=1) { 
	   $result1 = $con->query( "SELECT * FROM mahasiswa where nim = '$row->nim' "); 
	   	$row1 = $result1->fetch_object();
	?>
		
	
		<tr class="form-group" >
             <td  ><?php echo $i ;?> </td>
            <td ><input class="form-control" style="border: none; background-color: none; width: 140px;" type="text" name="nim<?php echo $i ?>" value="<?php echo $row->nim ?> " readonly> </td>
            <td ><?php echo $row1->nama; ?></td>
            <td ><?php echo $pertemuan ;?></td>
            <td style="width: 200px" >
	  		 <input type="radio" name="hadir<?php echo $i ?>" value="HADIR" checked>HADIR &nbsp;&nbsp;
	  		 <input type="radio" name="hadir<?php echo $i ?>" value="ALPHA">ALPHA &nbsp;&nbsp;
	  		 <input type="radio" name="hadir<?php echo $i ?>" value="IJIN">IJIN
	  		</td>
	  		 
	  		    <td ><input class="form-control" type="text" name="ket<?php echo $i ?>" value='-'></td>
	  	</tr>
	<?php 
		
		 $i++;
	// }
	}
	}			
?>
	</tbody>
</table> 
</div>