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
		echo "<tr style='font-size:11pt'>";
		echo "<td>".$i."</td>";$i++;
			$result1 = $con->query( "SELECT * FROM praktikum WHERE id_praktikum = '$rowid->id_praktikum'" );
			$row1 = $result1->fetch_object();
		 echo "<td>".$row1->nim."</td>";
			$result2 = $con->query( "SELECT * FROM mahasiswa WHERE nim = '$row1->nim'" );
			$row2 = $result2->fetch_object();
		 echo "<td>".$row2->nama."</td>";
		echo "<td style='align=center'>".$rowid->pertemuan."</td>";
		echo "<td>".$rowid->kehadiran."</td>";
		echo "<td>".$rowid->keterangan."</td>";

		

		echo "<td align='right'>
				<a href='#' onClick='set(\"$pertemuan\",\"$id_jadwal\",\"$row1->nim\")'><i class='fa fa-edit fa-2x'></i></a>
				&nbsp &nbsp
				
			 </td>";
		echo "</tr>";
	}

	$row21 = mysqli_num_rows($resultid);
	 if ($row21 !=0) {
	 		$result3 = $con->query( "SELECT * FROM jadwal WHERE id_jadwal = '$id_jadwal'" );
			$row3 = $result3->fetch_object();
	?>
		<tr>
			<td colspan="7" class="text-center"><a href='#' onClick='confirm_delete("function/presensi_hapus.php?pertemuan=<?php echo $pertemuan ?>&idj=<?php echo $id_jadwal ?>","<?php echo $row3->matkul.$row3->kelas."&nbsp;pertemuan&nbsp;".$pertemuan?>")'><i class='fa fa-trash-o fa-2x'></i></a></td>
		</tr>
<?php }

	}			
?>

<!-- admin_mahasiswa.php?nim=\"$row->nim\"  -->