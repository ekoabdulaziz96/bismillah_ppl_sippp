<?php		
	include_once('sidebar.php');

?>
<script>
	document.getElementById("asprak_penunjang").setAttribute("class","active-menu");
</script>

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->
<script>
$(document).ready(function(){
		$('#idj').change(function(){
				var idj= $("#idj").val();
				// var th= $("#ajar").attr('th');		
			$.ajax({
				url:"ajax_func/admin_pilih_pertemuan_2.php?idj="+idj,
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#hasil_pertemuan").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#hasil_pertemuan").html(data);
				},
				error: function(){
					$("#hasil_pertemuan").html("The page can't be loaded");
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
			   Tambah Penunjang
			 
			   	<a href='asprak_penunjang.php'  style="float: right;" ><i class='fa  fa-arrow-circle-o-left fa-2x' data-target="#ModalAdd" data-toggle="modal"></i></a>
			   	
			  
			</div>
			<form action="function/penunjang_tambah_asprak.php?idj=<?php echo $kepentingan ?>" name="modal_popup" enctype="multipart/form-data" method="post">
				<div class="panel-body">
						<div class="modal-body">
				             
				            <div class="form-group">
				                <label for="idj">Mata Kuliah</label>
				                     <?php $jadwal = $con->query("SELECT * FROM jadwal where  id_jadwal='$kepentingan' ");
										$kep = $jadwal->fetch_object();
				                     ?>
				                     <input class="form-control" type="text" name="idj" id="idj" value="<?php echo $kep->matkul.' '.$kep->kelas ?>" readonly='yes'>
				                      
				                 		  
				             </div>
				            
				              <div class="form-group" id="hasil_pertemuan">
				              	<label for="pertemuan">Pertemuan</label>
								<?php
							
								$result1 = $con->query("SELECT * FROM jadwal where id_jadwal='$kepentingan'");
								$row1 = $result1->fetch_object();
								$i = 1;
								while ($i <= $row1->max_prak) { 
									$result2 = $con->query("SELECT * FROM penunjang where pertemuan='$i'");
									$row2 = mysqli_num_rows($result2); 
				   					if ($row2 ==0) {
										$pert = $i;
										$i=999;}
									else $i++; }?>
								<input class="form-control" type="text" name="pertemuan" id="pertemuan" value="<?php echo $pert ?>" readonly='yes'>
								
				              </div>
				              <div class="form-group">
				                <label for="conten">Conten</label>
				                <textarea class="form-control" name="conten" id="" cols="25"; rows="20" placeholder="penugasan praktikum " required="yes"></textarea>
				                
				              </div>
				              
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
