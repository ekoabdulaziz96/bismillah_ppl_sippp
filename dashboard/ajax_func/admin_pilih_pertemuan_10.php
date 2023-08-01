
<script>
	$(document).ready(function(){
		$('#pertemuan').change(function(){
				var idj= $("#idj").val();
				var status= $("#status").val();
				var pertemuan= $("#pertemuan").val();		
			$.ajax({
				url:"ajax_func/admin_pilih_presensi.php?idj="+idj+"&pertemuan="+pertemuan+"&status="+status,
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

		$(document).ready(function(){
		$('#status').change(function(){
				var idj= $("#idj").val();
				var status= $("#status").val();
				var pertemuan= $("#pertemuan").val();		
			$.ajax({
				url:"ajax_func/admin_pilih_presensi.php?",
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
<div>
<?php require_once('../function/connect.php'); ?>
				    <label for="pertemuan">Pertemuan</label>
					
					<select class='form-control' id='pertemuan' name="pertemuan">
					<option value="">--choose--</option>
					<?php
					$idj = $_GET['idj'];
					$status = $_GET['status'];

					$result1 = $con->query("SELECT * FROM jadwal where id_jadwal='$idj'");
					$row1 = $result1->fetch_object();

					

					$i = 1;
					while ($i <= $row1->max_prak) { 
						$result2 = $con->query("SELECT * FROM presensi where pertemuan='$i' and id_praktikum in (select id_praktikum from praktikum where id_jadwal='$idj' and status = '$status') group by pertemuan");
						$row2 = mysqli_num_rows($result2); 
	   					if ($row2 ==0) { 
					?>
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
					<?php }

					$i++;} ?>
			</select>
				
			   
</div>