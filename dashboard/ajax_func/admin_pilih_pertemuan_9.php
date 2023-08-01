<script>
	$(document).ready(function(){
		$('#pertemuan').change(function(){
				var jadwal= $("#jadwal").val();
				var pertemuan= $("#pertemuan").val();		
			$.ajax({
				url:"ajax_func/admin_pilih_status_9.php?idj="+jadwal+"&pertemuan="+pertemuan,
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
<div class="col-md-6 col-sm-6 col-xs-6">
<?php require_once('../function/connect.php'); ?>
	Pertemuan:
					<select class='form-control' id='pertemuan'>
					<option value="">--choose--</option>
				<?php
					$idj = $_GET['idj'];
					$result1 = $con->query("SELECT * FROM presensi where id_praktikum in (SELECT id_praktikum FROM praktikum where id_jadwal = '$idj' )group by pertemuan");
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
 <div class="col-md-6 col-sm-6 col-xs-6" id="hasil_status"></div>