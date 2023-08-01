<?php		
	include_once('sidebar.php');

?>
<script>
	document.getElementById("admin_jadwal").setAttribute("class","active-menu");
</script>

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->
<script>
	$(document).ready(function(){
		$('#jadwal').change(function(){
				var idj= $("#jadwal").val();
				// var th= $("#ajar").attr('th');

			
			$.ajax({
				url:"ajax_func/admin_list_jadwal.php?idj="+idj,
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
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-3 col-sm-12 col-xs-12">
				 Semester | Tahun Ajaran:
				<select class='form-control' id='jadwal'>
					<option value="">--choose--</option>
				<?php
					$query = "SELECT * FROM jadwal Group by semester,th_ajaran order by th_ajaran desc";
					// Execute the query
					$result = $con->query( $query );
					while ($row = $result->fetch_object()){
						echo "<option value='$row->id_jadwal' >".$row->semester." | ".$row->th_ajaran."</option>";
					}
					
				?>
				</select>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- /. ROW  -->
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			   Daftar Jadwal
			 
			   	<a href='#'  style="float: right;" ><i class='fa fa-plus-square fa-2x' data-target="#ModalAdd" data-toggle="modal"></i></a>
			   	
			  
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="success">
								<th>No</th>
								<th>Mata Kuliah</th>
								<th>Hari</th>
								<th>Jam</th>
								<th>Ruang</th>
								<th>Kelas</th>
								<th>max Prak</th>
								<th>Action</th>

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

<!-- Modal Popup Add -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #439376;color: white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Jadwal</h4>
					</div>
					
						<form action="function/jadwal_tambah.php" name="modal_popup" id="formm" enctype="multipart/form-data" method="post">
							<div class="modal-body">
				              <div class="form-group">
				                <label for="matkul">Matkul</label>
				                <input class="form-control" type="text" name="matkul" value="" placeholder="imk" required="yes">
				              </div>
				              <div class="form-group">
				                <label for="hari">Hari</label>
				               <select class="form-control" name="hari" style="margin: 0px ;">
				                  <option value="">--choose--</option>
				                  <option value="Senin"> Senin </option>
				                  <option value="Selasa"> Selasa </option>
				                  <option value="Rabu"> Rabu </option>
				                  <option value="Kamis"> Kamis </option>
				                  <option value="Jumat"> Jumat </option>		                 
				                </select>
				              </div>
				             
				              <div class="form-group">
				                <label for="jam">Jam</label>
				                <select class="form-control" name="jam" style="margin: 0px ;">
				                  <option value="">--choose--</option>
				                  <option value="07:30"> 07:30 </option>
				                  <option value="08:00"> 08:00 </option>
				                  <option value="09:40"> 09:40 </option>
				                  <option value="10:10"> 10:10 </option>
				                  <option value="13:00"> 13:00 </option>
				                  <option value="13:30"> 13:30 </option>
				                  <option value="15:10"> 15:10 </option>
				                  <option value="15:30"> 15:30 </option>
				                  <option value="15:40"> 15:40 </option>
				                                			                 
				                </select>
				              </div>
				               <div class="form-group">
				                <label for="ruang">Ruang</label>
				               <select class="form-control" name="ruang" style="margin: 0px ;">
				                  <option value="">--choose--</option>
				                  <option value="LAB E 01"> LAB E 01 </option>
				                  <option value="LAB E 02"> LAB E 02 </option>
				                  <option value="LAB A 01"> LAB A 01 </option>              			                 
				                </select>
				              </div>
				              <div class="form-group">
				                <label for="kelas">Kelas</label>
				                <select class="form-control" name="kelas" style="margin: 0px ;">
				                  <option value="">--choose--</option>
				                  <option value="A"> A </option>
				                  <option value="A1"> A1 </option>
				                  <option value="A2"> A2 </option>
				                  <option value="B"> B </option>
				                  <option value="B1"> B1 </option>
				                  <option value="B2"> B2 </option>
				                  <option value="C"> C </option>            			                 
				                </select>
				              </div>
				              <div class="form-group">
				                <label for="semester" style="">Semester</label>
				                <select class="form-control" name="semester" style="margin: 0px ;">
				                  <option value="">--choose--</option>
				                  <option value="GASAL"> GASAL </option>
				                  <option value="GENAP"> GENAP </option>
				                 
				                </select>
				            </div>
				              <div class="form-group">
				                <label for="kelas">Tahun Ajaran</label>
				                <input class="form-control" style="" type="text" name="th_ajaran" id="th_ajaran" value="<?php echo date('Y') ?>/<?php echo date('Y')+1 ?>" required="yes">
				              </div>
				              <div class="form-group">
				                <label for="max">Jumlah Maksimum Praktikum</label>
				                <select class="form-control" name="max" style="margin: 0px ;">
				                  <option value="">--choose--</option>
				                  <option value="5"> 5 </option>
				                  <option value="6"> 6 </option>
				                  <option value="7"> 7 </option>
				                  <option value="10"> 10 </option>
				                  <option value="11"> 11 </option>
				                  <option value="12"> 12 </option>
				                  
				                </select>
				              </div>
				         </div>    
            		
							<div class="modal-footer" style="background-color: #439376;">
								<button class="btn btn-success" type="submit">
									Tambah
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Batal
								</button>
							</div>
						 </form>
					
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
						<h4 class="modal-title" id="delete_message" style="text-align:center;"></h4>
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
<!-- 	<script>
		function get_kepentingan(){
		var akses = document.forms["formm"]["hak"].value;
		if (akses == "admin"){
			document.getElementById("kepp").innerHTML=
			'<option value="semua">semua</option>';
			
		}else {
			

		}
	}
	</script> -->
	<!-- Javascript Edit--> 

	<script>
		function set(idj){
				$.ajax({
					url: "admin_jadwal_edit.php?idj="+idj,
					type: "GET",
					dataType:"html",
					success: function (data){
					$("#ModalEdit").html(data);
					$("#ModalEdit").modal('show');
				}

			});
		}
	</script>
<!-- Javascript Delete -->
	<script>
		function confirm_delete(delete_url,name){
			$("#modal_delete").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
			document.getElementById('delete_message').innerHTML = "Apakah Anda Yakin Ingin Menghapus <br />"+name + " ?";
		}
		
			</script>

 <script type="text/javascript">
            $(function () {
                $('#th_ajaran1').datetimepicker();
            });
        </script>