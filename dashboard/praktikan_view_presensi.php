<?php		
	include_once('sidebar.php');

?>
<script>
	document.getElementById("praktikan_view_presensi").setAttribute("class","active-menu");
</script>

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->
<script>
	$(document).ready(function(){
		$('#jadwal').change(function(){
				var jadwal= $("#jadwal").val();
				// var pertemuan= $("#pertemuan").val();		
			$.ajax({
				url:"ajax_func/pilih_pertemuan.php?idj="+jadwal,
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#pilihpertemuan").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#pilihpertemuan").html(data);
				},
				error: function(){
					$("#pilihpertemuan").html("The page can't be loaded");
				}
			});
		});
	});

</script>
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
				
				<div class="col-md-5 col-sm-6 col-xs-12">
					Mata Kuliah | Kelas :
				<select class='form-control' id='jadwal'>
					<option value="">--choose--</option>
				<?php
					$result = $con->query("SELECT * FROM jadwal where id_jadwal in (SELECT id_jadwal FROM praktikum group by id_jadwal ) and  th_ajaran ='$th' and semester='$sems'  ");
					// Execute the query
					while ($row = $result->fetch_object()){
						echo "<option value='$row->id_jadwal'>"
						.
						$row->matkul." ". $row->kelas
						.
						"</option>";
					}
					
				?>
				</select>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12" id="pilihpertemuan">  </div>

		</div>
		</div>
	</div>
</div>
<!-- /. ROW  -->
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			   Daftar presensi
			   	
			  
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="success">
								<th>No</th>
								<th>NIM</th>
								<th>Nama</th>		
								<th>Pertemuan</th>
								<th>Kehadiran</th>
								<th>Keterangan</th>

							</tr>
						</thead>
						<tbody id="hasil_presensi">
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Modal Popup Add -->
		<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog">		</div>

<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="delete_message" style="text-align:center;"> ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Delete</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>		
<?php 
	mysqli_close($con);
	include_once('footer.php');
?>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->

	<!-- Javascript Edit--> 

