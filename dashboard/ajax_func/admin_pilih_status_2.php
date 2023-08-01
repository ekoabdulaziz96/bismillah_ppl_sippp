<script>
		$(document).ready(function(){
		$('#status').change(function(){
				var jadwal= $("#jadwal").val();
				var status= $("#status").val();
				var pertemuan= $("#pertemuan").val();

			$.ajax({
				url:"ajax_func/admin_list_presensi.php?idj="+jadwal+"&status="+status+"&pertemuan="+pertemuan,
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
<?php require_once('../function/connect.php'); ?>

<div>
	
				    Status:

				<select class='form-control' id='status' name="status">
					<option value="">--choose--</option>
					<?php
					$idj = $_GET['idj'];
					$result1 = $con->query("SELECT * FROM praktikum where id_jadwal='$idj' group by status");
				
					while ($row1 = $result1->fetch_object()) { 
					?>
						<option value="<?php echo $row1->status ?>"><?php echo $row1->status ?></option>
					<?php } ?>			
				</select>
</div>