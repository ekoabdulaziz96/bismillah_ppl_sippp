
<?php require_once('../function/connect.php'); 
$th = $_GET['th'];
?>

<div>
	
			    <label for="th_ajar">Pilih Semester</label>

				<select class='form-control' id='semester' name="sems">
				<option value="">--choose--</option>
				<?php 
					$query = "SELECT * FROM jadwal where th_ajaran = '$th' group by semester";
					$result = $con->query( $query );

					 if (date(m)=="7" || date(m)=="8" || date(m)=="9"|| date(m)=="10"|| date(m)=="11" || date(m)=="12"){
	   					$semester= "GASAL";} 	
	   				else {$semester = "GENAP";}

					while ($row = $result->fetch_object()){ ?>
						<option value='<?php echo $row->semester?>' <?php if ($row->semester==$semester) {echo "selected";} ?>> 
							<?php echo  $row->semester ?></option>
				<?php } ?>
				 <option value=""><?php $th ?></option>		
				</select>
</div>