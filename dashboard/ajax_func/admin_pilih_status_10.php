<script>
		$(document).ready(function(){
		$('#status').change(function(){
				var idj= $("#idj").val();
				var status= $("#status").val();

			$.ajax({
				url:"ajax_func/admin_pilih_pertemuan_10.php?idj="+idj+"&status="+status,
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
<?php require_once('../function/connect.php'); ?>

<div>
	
				    <label for="pertemuan">	Status:</label>

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
				 <div class="form-group" id="hasil_pertemuan" style="margin-top: 10px;"></div>
			      <div class="form-group" id="hasil_presensi"></div>
</div>