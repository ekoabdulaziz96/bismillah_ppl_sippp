        <?php 
			include_once('sidebar.php');

		?>
		<script>
	<?php if ($hakAkses =='admin') { ?>document.getElementById("admin_dashboard").setAttribute("class","active-menu"); <?php } ?>
	<?php if ($hakAkses =='asprak') { ?>document.getElementById("asprak_dashboard").setAttribute("class","active-menu");<?php } ?>
	<?php if ($hakAkses =='praktikan') { ?>document.getElementById("praktikan_dashboard").setAttribute("class","active-menu");<?php } ?>

		</script>
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->
<script>
	$(document).ready(function(){
		$('#jadwal').change(function(){
				var jadwal= $("#jadwal").val();	
			$.ajax({
				url:"ajax_func/admin_list_jadwal_1.php?hari="+jadwal+"&th=<?php echo $th?>&sems=<?php echo $sems ?>",
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#hasil_jadwal").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#hasil_jadwal").html(data);
				},
				error: function(){
					$("#hasil_jadwal").html("The page can't be loaded");
				}
			});
		});
	});
</script>
		<?php 	
			
			
			if($hakAkses=='admin'){
				$query5="SELECT count(id_praktikum) as asprak FROM praktikum where id_jadwal in (select id_jadwal from jadwal where semester ='$sems' and th_ajaran='$th') and status ='asprak'";
				$result5 = $con->query($query5);
				$row5=$result5->fetch_object();

				$query7="SELECT count(id_jadwal) as matkul FROM jadwal  where semester ='$sems' and th_ajaran='$th'";
				$result7 = $con->query($query7);
				$row7=$result7->fetch_object();
				
				$query6="SELECT count(id_praktikum) as praktikan FROM praktikum where id_jadwal in (select id_jadwal from jadwal where semester ='$sems' and th_ajaran='$th') and status ='praktikan'";
				$result6 = $con->query($query6);
				$row6=$result6->fetch_object();
				
				 
			}else {
				$query5="SELECT count(id_praktikum) as asprak FROM praktikum where id_jadwal = '$kepentingan' and status ='asprak'";
				$result5 = $con->query($query5);
				$row5=$result5->fetch_object();

				$query7="SELECT * FROM presensi  where id_praktikum in (select id_praktikum from praktikum where id_jadwal ='$kepentingan') order by pertemuan desc";
				$result7 = $con->query($query7);
				$row7=$result7->fetch_object();
				
				$query6="SELECT count(id_praktikum) as praktikan FROM praktikum where id_jadwal = '$kepentingan' and status ='praktikan'";
				$result6 = $con->query($query6);
				$row6=$result6->fetch_object();				
			}
		?>



        	<div style="margin-top: -10px">
                 <!-- /. ROW  -->
                <hr />
                <div class="row" style="color: #fff;margin-bottom: -20px;">
					
                    <div class="col-md-4 col-sm-4 col-xs">
						<div class="panel panel-back noti-box" style="background-color: #138e74">
							<span class="icon-box set-icon" style="background-color: black">
								<i class="fa fa-user-secret" style="margin-top: -10px"></i>
							</span>
							<div class="text-box">
								<div class="main-text">
									<?php echo $row5->asprak ?>
							
								<div ><?php  echo 'Asisten Praktikum';  ?></div>
							</div>
						 </div>
						</div>
					</div>
                 <div class="col-md-4 col-sm-4 col-xs">
						<div class="panel panel-back noti-box" style="background-color: #138e74">
							<span class="icon-box set-icon" style="background-color: black">
								<i class="fa fa-list-alt" style="margin-top: -10px"></i>
							</span>
							<div class="text-box">
								<div class="main-text">
									<?php  if($statuss->hakAkses=='admin') echo $row7->matkul ; else echo $row7->pertemuan;?>
							
								<div class="color-black" ><?php if($statuss->hakAkses=='admin') echo 'Mata Kuliah'; else echo'pertemuan' ?></div>
							</div>
						 </div>
						</div>
					</div>
                     <div class="col-md-4 col-sm-4 col-xs">
						<div class="panel panel-back noti-box" style="background-color: #138e74">
							<span class="icon-box set-icon" style="background-color: black">
								<i class="fa fa-users" style="margin-top: -10px"></i>
							</span>
							<div class="text-box">
								<div class="main-text">
									<?php echo $row6->praktikan ?>
							
								<div class="color-black" ><?php  echo 'Praktikan ';  ?></div>
							</div>
						 </div>
						</div>
					</div>
				</div>
                 <!-- /. ROW  -->
                <hr />
                 <!-- /. ROW  -->
            </div>

<!-- /. ROW  -->
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="height: 50px;">
			   Daftar Jadwal
			<div class="col-md-3 col-sm-5 col-xs-5" style="float :right">
				<select class='form-control' id='jadwal'>
					<option value="">--Hari--</option>
				<?php
					$query = "SELECT * FROM jadwal where semester ='$sems' and th_ajaran='$th' group by hari order by hari desc";
					// Execute the query
					$result = $con->query( $query );
					while ($row = $result->fetch_object()){
						if($row->matkul != 'semua'){
						echo "<option value='$row->hari' >".$row->hari."</option>";
						}
					}
					
				?>
				</select>
				</div>
			  
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="success">
								<th>Jam</th>
								<th>Mata Kuliah</th>
								<th>Kelas</th>
								<th>Ruang</th>

							</tr>
						</thead>
						<tbody id="hasil_jadwal">
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



                 <!-- /. ROW  -->
        <?php include_once('footer.php') ?>
