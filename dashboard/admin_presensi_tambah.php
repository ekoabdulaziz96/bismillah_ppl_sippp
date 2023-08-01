<?php		
	include_once('sidebar.php');

?>
<script>
	document.getElementById("admin_presensi").setAttribute("class","active-menu");
</script>

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->

<script>
$(document).ready(function(){
		$('#idj').change(function(){
				var idj= $("#idj").val();
				// var th= $("#ajar").attr('th');		
			$.ajax({
				url:"ajax_func/admin_pilih_status_10.php?idj="+idj,
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#hasil_status").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#hasil_status").html(data);
				},
				error: function(){
					$("#hasil_status").html("The page can't be loaded");
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
			 
			   	<a href='admin_presensi.php'  style="float: right;" ><i class='fa  fa-arrow-circle-o-left fa-2x' data-target="#ModalAdd" data-toggle="modal"></i></a>
			   	
			  
			</div>
			<form action="function/presensi_tambah.php?" name="modal_popup" enctype="multipart/form-data" method="post">
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
				            
				              <div class="form-group" id="hasil_status"></div>
				     

				             
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