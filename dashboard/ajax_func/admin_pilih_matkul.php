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
<div>
	<?php require_once('../function/connect.php'); ?>
		$idj = $_GET['idj'];
	<label for="idj">ID_Jadwal</label>
        
	 <select name="idj" id="idj" class="form-control">
	 <option value="">--choose--</option>
	 <?php $jadwal = $con->query("SELECT * FROM jadwal ");
	 while ($kep = $jadwal->fetch_object()){ ?>
		 <option value="<?php echo $kep->id_jadwal ?>"><?php echo $kep->matkul.' '.$kep->kelas ?></option>
	 <?php } ?>
	</select>
</div>