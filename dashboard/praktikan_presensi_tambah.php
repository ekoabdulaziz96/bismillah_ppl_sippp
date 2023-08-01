<?php		
	include_once('sidebar.php');

?>
<script>
	document.getElementById("praktikan_presensi").setAttribute("class","active-menu");
</script>

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->

<script>
		$(document).ready(function(){
		$('#status').ready(function(){
				var idj= $("#idj").val();
				var status= $("#status").val();
				var pertemuan= $("#pertemuan").val();

			$.ajax({
				url:"ajax_func/admin_pilih_presensi.php?idj=<?php echo $kepentingan ?>&status="+status+"&pertemuan="+pertemuan,
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

<!-- /. ROW  -->
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			   Tambah Presensi Praktikum
			 
			   	<a href='praktikan_presensi.php'  style="float: right;" ><i class='fa  fa-arrow-circle-o-left fa-2x' data-target="#ModalAdd" data-toggle="modal"></i></a>
			   	
			  
			</div>
			<form action="function/presensi_tambah_praktikan.php?idj=<?php echo $kepentingan ?>" name="modal_popup" enctype="multipart/form-data" method="post">
				<div class="panel-body">
						<div class="modal-body">				 

				             <div class="form-group">
				                <label for="idj">Mata Kuliah</label>
				                     <?php $jadwal = $con->query("SELECT * FROM jadwal where  id_jadwal='$kepentingan' ");
										$kep = $jadwal->fetch_object();
				                     ?>
				                     <input class="form-control" type="text" name="idj" id="idj" value="<?php echo $kep->matkul.' '.$kep->kelas ?>" readonly='yes'>
				                      
				                 		  
				             </div>
				            
				              <div class="form-group" id="hasil_pertemuan">
				              	<label for="pertemuan">Pertemuan</label>
								<?php
							
								$result1 = $con->query("SELECT * FROM jadwal where id_jadwal='$kepentingan'");
								$row1 = $result1->fetch_object();
								$i = 1;
								while ($i <= $row1->max_prak) { 
									$result2 = $con->query("SELECT * FROM presensi where pertemuan='$i' and id_praktikum in (select id_praktikum from praktikum where id_jadwal='$kepentingan' and status ='asprak') group by pertemuan");
									$row2 = mysqli_num_rows($result2); 
				   					if ($row2 ==0) {
										$pert = $i;
										$i=999;}
									else $i++; }?>
								<input class="form-control" type="text" name="pertemuan" id="pertemuan" value="<?php echo $pert ?>" readonly='yes'>
								
				              </div>
				              <div>
	
								 <label for="status">Status</label>
								 <input class="form-control" type="text" name="status" id="status" value="<?php echo 'asprak' ?>" readonly='yes'>
							</div>
				     
							<br>
				             <div  id="hasil_presensi"></div>

				         </div>    
            		
					</div>
						<div class="panel-footer" align="right">
								<button class="btn btn-success" type="submit">
									Tambah
								</button>
								
							</div>
				</form>	
	
		</div>
	</div>
</div>

<?php $timeAwal = time() ;
	  $timeAkhir = $_GET['akhir'];
	mysqli_close($con);
	include_once('footer.php');


?>

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