<?php		
	include_once('sidebar.php');

?>
<script>
	document.getElementById("admin_praktikum").setAttribute("class","active-menu");
</script>

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->

<script>
	$(document).ready(function(){
		$('#angkatan').change(function(){
				var angkatan= $("#angkatan").val();
				var idj= $("#idj").val();
				var status= $("#status").val();		
			$.ajax({
				url:"ajax_func/admin_list_angkatan.php?angkatan="+angkatan+"&idj="+idj+"&status="+status,
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#hasil_mhs").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#hasil_mhs").html(data);
				},
				error: function(){
					$("#hasil_mhs").html("The page can't be loaded");
				}
			});
		});
	});

	$(document).ready(function(){
		$('#idj').change(function(){
				var angkatan= $("#angkatan").val();
				var idj= $("#idj").val();
				var status= $("#status").val();


			
			$.ajax({
				url:"ajax_func/admin_list_angkatan.php?angkatan="+angkatan+"&idj="+idj+"&status="+status,
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#hasil_mhs").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#hasil_mhs").html(data);
				},
				error: function(){
					$("#hasil_mhs").html("The page can't be loaded");
				}
			});
		});
	});



</script>

<!-- /. ROW  -->
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			   Tambah Peserta Praktikum
			 
			   	<a href='admin_praktikum.php'  style="float: right;" ><i class='fa  fa-arrow-circle-o-left fa-2x' data-target="#ModalAdd" data-toggle="modal"></i></a>
			   	
			  
			</div>
			<form action="function/praktikum_tambah.php" name="modal_popup" enctype="multipart/form-data" method="post">
				<div class="panel-body">
						<div class="modal-body">				 

				             <div class="form-group">
				                <label for="idj">Mata Kuliah</label>
				                <br>
				                <select name="idj" id="idj" class="form-control">
				                  <option value="">--choose--</option>
				                    <?php $jadwal = $con->query("SELECT * FROM jadwal where  th_ajaran ='$th' and semester='$sems' ");
				                      while ($kep = $jadwal->fetch_object()){ 
				                      	if($kep->matkul != semua){?>
				                 		  <option value="<?php echo $kep->id_jadwal ?>"><?php echo $kep->matkul.' '.$kep->kelas ?></option>
				                      <?php }} ?>
				                </select>
				             </div>
				            
				              <div class="form-group">
				                <label for="semester">Semester</label>
				                <input class="form-control" type="text" name="semester" id="semester" value="" placeholder="1" required="yes">
				              </div>
				              <div class="form-group">
				                <label for="status" class="form">Status</label>
				                <select name="status" class="form-control" id="status">
				                	<option value="">--choose--</option>
									<option value="asprak">Asprak</option>
									<option value="praktikan">Praktikan</option>
				                </select>   
				              </div>
				              <div class="form-group">
				              	<label for="angkatan">Angkatan</label>
				              	<select name="angkatan" class='form-control' id='angkatan'>
									<option value="">--choose--</option>
								<?php
									$query = "SELECT * FROM mahasiswa Group by angkatan";
									// Execute the query
									$result = $con->query( $query );
									while ($row = $result->fetch_object()){
										echo "<option value='".$row->angkatan."'>".$row->angkatan."</option>";
									}
									
								?>
								</select>
				              </div>
				              <div class="form-group" id="hasil_mhs"></div>
				         </div>    
            		
					</div>
						<div class="panel-footer" align="right">
								<button class="btn btn-success" type="submit">
									Tambah
								</button>
								
							</div>
				</form>	
	
		</div>
	</div>
</div>
<?php 
	mysqli_close($con);
	include_once('footer.php');


?>