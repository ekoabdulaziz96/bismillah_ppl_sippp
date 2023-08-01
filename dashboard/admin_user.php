<?php		
	include_once('sidebar.php');

?>
<script>
	document.getElementById("admin_user").setAttribute("class","active-menu");
</script>

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->
<script>
	$(document).ready(function(){
		$('#akses').change(function(){
				var akses= $("#akses").val();
							
			$.ajax({
				url:"ajax_func/admin_list_user.php?akses="+akses+"&th=<?php echo $th ?>&sems=<?php echo $sems ?>",
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
				<div class="col-md-2 col-sm-12 col-xs-12">
					Hak Akses :
				<select class='form-control' id='akses'>
					<option value="">--choose--</option>
				<?php
					$query = "SELECT * FROM user where kepentingan in (select id_jadwal from jadwal where th_ajaran ='$th' and semester='$sems') Group by hakAkses";
					// Execute the query
					$result = $con->query( $query );
					while ($row = $result->fetch_object()){
						
						echo "<option value='".$row->hakAkses."'>".$row->hakAkses."</option>";
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
			   Daftar User
			 
			   	<a href='#'  style="float: right;" ><i class='fa fa-plus-square fa-2x' data-target="#ModalAdd" data-toggle="modal"></i></a>
			   	
			  
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="success">
								<th>No</th>
								<th>Username</th>
								<th>Password</th>
								<th>Hak Akses</th>
								<th>Kepentingan</th>
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
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #439376;color: white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah User</h4>
					</div>
					
						<form action="function/user_tambah.php" name="modal_popup" id="formm" enctype="multipart/form-data" method="post">
							<div class="modal-body">
				              <div class="form-group">
				                <label for="nama">Username</label>
				                <input class="form-control" type="text" name="nama" value="" placeholder="aspimkA1" required="yes">
				              </div>
				              <div class="form-group">
				                <label for="pass">Password</label>
				                <input class="form-control" type="text" name="pass" value="" placeholder="*****" required="yes">
				              </div>
				               <div class="form-group">
				                <label for="hak" style="margin-right: 10px">Hak Akses</label>
				                <select name="hak" class="form-control" style="" onchange="get_kepentingan()">
				                  <option value="">--choose--</option>
				                  <option value="admin"> Admin </option>
				                  <option value="asprak"> Asprak </option>
				                  <option value="praktikan"> Praktikan </option>

				                </select>
				              </div>
				              
				              <div class="form-group">
				                <label for="kep" style="margin-right: 13px">Kepentingan</label>
				                <select name="kep" class="form-control" id="kepp">
				                  	<option value="">--choose--</option>
				                   <?php $jadwal = $con->query("SELECT * FROM jadwal where th_ajaran = '$th' and semester = '$sems'");
                      				while ($kep = $jadwal->fetch_object()){ ?>
                        			<option value="<?php echo $kep->id_jadwal ?>"><?php echo $kep->matkul. " ".$kep->kelas?></option>
                     				 <?php } ?>
				                     
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
		function set(id){
				$.ajax({
					url: "admin_user_edit.php?id="+id+"&th=<?php echo $th ?>&sems=<?php echo $sems ?>",
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
