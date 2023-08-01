<?php		
	include_once('sidebar.php');


	
	$jadwal = $con->query("SELECT * FROM jadwal where  id_jadwal='$kepentingan' ");
	$kep = $jadwal->fetch_object();
	$selectedTime= date('G:i:s');
	$expired=date('G:i:s',strtotime($selectedTime . ' +120 minutes'));
	$expired1=date('G:i:s',strtotime($kep->jam . ' +120 minutes'));


     $timeAwal = time();
     $timeAkhir = $_SESSION['expire'];

	?>
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>

<script>
	document.getElementById("asprak_presensi").setAttribute("class","active-menu");
</script>

<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->
<script>
	$(document).ready(function(){
		$('#pertemuan').change(function(){
				var pertemuan= $("#pertemuan").val();
				// var pertemuan= $("#pertemuan").val();		
			$.ajax({
				url:"ajax_func/asprak_list_presensi.php?idj=<?php echo $kepentingan ?>&status=praktikan&pertemuan="+pertemuan,
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#hasil_presensi").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#hasil_presensi").html(data);
				},
				error: function(){
					$("#hasil_presensi").html("The page can't be loaded");
				}
			});
		});
	});

</script>
<?php {  ?>
	
<div id="sisa" style="float: right"><?php echo 'waktu akses presensi : '.$kep->jam.'-'.$expired1.'&nbsp;&nbsp; '; ?></div>
<div class="row" onload="live()" id="live">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body" class="input.timepicker">
				
				<div class="col-md-5 col-sm-6 col-xs-12">
					Pertemuan:
					<select class='form-control' id='pertemuan'>
					<option value="">--choose--</option>
				<?php
					$idj = $_GET['idj'];
					$result1 = $con->query("SELECT * FROM presensi where id_praktikum in (SELECT id_praktikum FROM praktikum where id_jadwal = '$kepentingan' and status ='praktikan'  )group by pertemuan");
					// Execute the query
					while ($row1 = $result1->fetch_object()){
						echo "<option value='$row1->pertemuan'>"
						.
						$row1->pertemuan
						.
						"</option>";
					}
					
				?>
				</select>

				</div>
				<div class="col-md-6 col-sm-6 col-xs-12" id="pilihpertemuan">  </div>
				<div id="timestamp"></div>
		</div>
		</div>
	</div>
</div>
<!-- /. ROW  -->
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			   Daftar presensi Praktikan
			 
			   	<a href='asprak_presensi_tambah.php?akhir=<?php echo $timeAkhir ?>'  style="float: right;" ><i class='fa fa-plus-square fa-2x' data-target="#ModalAdd" data-toggle="modal"></i></a>
			   	
			  
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
								<th>Action</th>

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

}
?>

	<!-- Javascript Edit--> 

	<script>
		function set(pertemuan,idj,nim){
				$.ajax({
					url: "asprak_presensi_edit.php?nim="+nim+"&idj="+idj+"&pertemuan="+pertemuan,
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

	
<script>
	$(document).ready(function(){
		
		var d = new Date();
		var c = +new Date();
		var a = <?php echo $timeAwal ?>;
		var b = <?php echo $timeAkhir ?>;
		var z = b-a;

		// console.log(c);
		// console.log(z/6);
    // document.getElementById('livetime').innerHTML= h+':'+m+':'+s;

    var t = setTimeout('redirect()', z*1000);
		
	})


	function redirect(){
			window.location = "tunggu.php?idj=<?php echo $kepentingan ?>";

	}
</script>