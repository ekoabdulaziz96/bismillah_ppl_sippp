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
		$('#penunjang').ready(function(){
				var penunjang= $("#penunjang").val();
			
			$.ajax({
				url:"ajax_func/asprak_list_penunjang.php?penunjang="+penunjang,
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
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-5 col-sm-12 col-xs-12">
					Mata Kuliah | Kelas :
				<select class='form-control' id='penunjang' readonly='yes'>
					<!-- <option value="">--choose--</option> -->
				<?php
					$result = $con->query("SELECT * FROM jadwal where id_jadwal = '$kepentingan'");
					// Execute the query
					while ($row = $result->fetch_object()){
						echo "<option value='$row->id_jadwal' selected>"
						.
						$row->matkul." ". $row->kelas
						.
						"</option>";
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
			   Daftar Penunjang
			 
			   	<a href='asprak_penunjang_tambah.php'  style="float: right;" ><i class='fa fa-plus-square fa-2x' ></i></a>
			   	
			  
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="success">
								<th>No</th>
								<th>Mata kuliah</th>
								<th>Kelas</th>
								<th>Pertemuan</th>
								<th>Content</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody id="hasil_mhs">
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Popup Add -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" style="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #439376;color: white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Penunjang</h4>
					</div>
					
						<form action="function/penunjang_tambah.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="modal-body">
				              <div class="form-group">
				                <label for="idj">Jadwal</label>
				                <br>
				                <select name="idj" class="form-control">
				                  <option value="">--choose--</option>
				                    <?php $namaadmin = $con->query("SELECT * FROM jadwal ");
				                      while ($kep = $namaadmin->fetch_object()){ ?>
				                   <option value="<?php echo $kep->id_jadwal ?>"><?php echo $kep->matkul.' '.$kep->kelas ?></option>
				                      <?php } ?>
				                </select>
				                </div>
				            
				              <div class="form-group">
				                <label for="pertemuan">Pertemuan</label>
				                <select name="pertemuan" class="form-control">
				                  <option value="">--choose--</option>
				                    <?php $namaadmin = $con->query("SELECT * FROM jadwal ");
				                      while ($kep = $namaadmin->fetch_object()){ ?>
				                   <option value="<?php echo $i ?>"><?php echo $kep->matkul.' '.$kep->kelas ?></option>
				                      <?php } ?>
				                </select>
				              </div>
				              <div class="form-group">
				                <label for="conten">Conten</label>
				                <textarea class="form-control" name="conten" id="" cols="25"; rows="20" placeholder="penugasan praktikum imk" required="yes"></textarea>
				                
				              </div>
				         </div>    
            		
							<div class="modal-footer" style="background-color: #439376;">
								<button class="btn btn-success" type="submit">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
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

	<script>
		function set(idp){
				$.ajax({
					url: "asprak_penunjang_edit.php?idp="+idp+"&th=<?php echo $th ?>&sems=<?php echo $sems ?>",
					type: "GET",
					dataType:"html",
					success: function (data){
					$("#ModalEdit").html(data);
					$("#ModalEdit").modal('show');
				}

			});
		}

		function view(idp){
				$.ajax({
					url: "asprak_penunjang_view.php?idp="+idp+"&th=<?php echo $th ?>&sems=<?php echo $sems ?>",
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