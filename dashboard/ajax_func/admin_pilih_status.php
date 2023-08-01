<script>
		$(document).ready(function(){
		$('#status').change(function(){
				var praktikum= $("#praktikum").val();
				var status= $("#status").val();		
			$.ajax({
				url:"ajax_func/admin_list_praktikum.php?idj="+praktikum+"&status="+status,
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
<?php require_once('../function/connect.php'); ?>

<div>
	
	Status:
				<select class='form-control' id='status'>
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