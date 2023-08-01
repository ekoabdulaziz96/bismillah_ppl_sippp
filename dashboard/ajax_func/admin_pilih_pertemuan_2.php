
<div>
<?php require_once('../function/connect.php'); ?>
				    <label for="pertemuan">Pertemuan</label>
					
					<select class='form-control' id='pertemuan' name="pertemuan">
					<option value="">--choose--</option>
					<?php
					$idj = $_GET['idj'];
					$result1 = $con->query("SELECT * FROM jadwal where id_jadwal='$idj'");
					$row1 = $result1->fetch_object();

					

					$i = 1;
					while ($i <= $row1->max_prak) { 
						$result2 = $con->query("SELECT * FROM penunjang where pertemuan='$i' and id_jadwal='$idj'");
						$row2 = mysqli_num_rows($result2);
	   					if ($row2 !=1) { 
					?>
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
					<?php }

					$i++;} ?>
			</select>
</div>