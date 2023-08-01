<?php

require_once('function/connect.php');
$idjlama= $_GET["idj"];

	$query = "SELECT * FROM jadwal WHERE id_jadwal='$idjlama'";
	$result = $con->query( $query );
	if(!$result){
		die('Could not connect to database : <br/>'.$con->error);
	}

$row = $result->fetch_object();

?>

		
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #439376;color: white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Ubah Jadwal</h4>
					</div>
					
						<form action="function/jadwal_edit.php?idjlama=<?php echo $idjlama ?>" name="modal_popup" id="formm" enctype="multipart/form-data" method="post">
							<div class="modal-body">
				              <div class="form-group">
				                <label for="matkul">Matkul</label>
				                <input class="form-control" type="text" name="matkul" value="<?php echo  $row->matkul ?>" placeholder="imk" required="yes">
				              </div>
				              <div class="form-group">
				                <label for="hari">Hari</label>
				                
				                <select class="form-control" name="hari" style="margin: 0px ;">
				                  <option value="Senin"  <?php if ($row->hari =='Senin') echo "selected"; ?>> Senin </option>
				                  <option value="Selasa" <?php if ($row->hari =='Selasa') echo "selected"; ?>> Selasa </option>
				                  <option value="Rabu" <?php if ($row->hari =='Rabu') echo "selected"; ?>> Rabu </option>
				                  <option value="Kamis" <?php if ($row->hari =='Kamis') echo "selected"; ?>> Kamis </option>
				                  <option value="Jumat" <?php if ($row->hari =='Jumat') echo "selected"; ?>> Jumat </option>
				                

				                 
				                </select>
				              </div>
				             
				              <div class="form-group">
				                <label for="jam">Jam</label>
				                <select class="form-control" name="jam" style="margin: 0px ;">
				                  <option value="">--choose--</option>
				                  <option value="07:30" <?php if ($row->jam =='07:30:00') echo "selected"; ?>> 07:30 </option>
				                  <option value="08:00" <?php if ($row->jam =='08:00:00') echo "selected"; ?>> 08:00 </option>
				                  <option value="09:40" <?php if ($row->jam =='09:40:00') echo "selected"; ?>> 09:40 </option>
				                  <option value="10:10" <?php if ($row->jam =='10:10:00') echo "selected"; ?>> 10:10 </option>
				                  <option value="13:00" <?php if ($row->jam =='13:00:00') echo "selected"; ?>> 13:00 </option>
				                  <option value="13:30" <?php if ($row->jam =='13:30:00') echo "selected"; ?>> 13:30 </option>
				                  <option value="15:10" <?php if ($row->jam =='15:10:00') echo "selected"; ?>> 15:10 </option>
				                  <option value="15:30" <?php if ($row->jam =='15:30:00') echo "selected"; ?>> 15:30 </option>
				                  <option value="15:40" <?php if ($row->jam =='15:40:00') echo "selected"; ?>> 15:40 </option>
				                                			                 
				                </select>
				              </div>
				               <div class="form-group">
				                <label for="ruang">Ruang</label>
				               <select class="form-control" name="ruang" style="margin: 0px ;">
				                  <option value="">--choose--</option>
				                  <option value="LAB E 01" <?php if ($row->ruang =='LAB E 01') echo "selected"; ?>> LAB E 01 </option>
				                  <option value="LAB E 02" <?php if ($row->ruang =='LAB E 02') echo "selected"; ?>> LAB E 02 </option>
				                  <option value="LAB A 01" <?php if ($row->ruang =='LAB A 01') echo "selected"; ?>> LAB A 01 </option>              			                 
				                </select>
				              </div>
				              <div class="form-group">
				                <label for="kelas">Kelas</label>
				                 <select class="form-control" name="kelas" style="margin: 0px ;">
				                  <option value="">--choose--</option>
				                  <option value="A" <?php if ($row->kelas =='A') echo "selected"; ?>> A </option>
				                  <option value="A1" <?php if ($row->kelas =='A1') echo "selected"; ?>> A1 </option>
				                  <option value="A2" <?php if ($row->kelas =='A2') echo "selected"; ?>> A2 </option>
				                  <option value="B" <?php if ($row->kelas =='B') echo "selected"; ?>> B </option>
				                  <option value="B1" <?php if ($row->kelas =='B1') echo "selected"; ?>> B1 </option>
				                  <option value="B2" <?php if ($row->kelas =='B2') echo "selected"; ?>> B2 </option>
				                  <option value="C" <?php if ($row->kelas =='C') echo "selected"; ?>> C </option>            			                 
				                </select>
				              </div>
				              <div class="form-group">
				                <label for="semester" style="" >Semester</label>
				                <select class="form-control" name="semester" id="semesterr" >
				                 <option value="GASAL" <?php if ($row->Semester ==GASAL) echo "selected"; ?>> GASAL </option>
				                  <option value="GENAP" <?php if ($row->Semester ==GENAP) echo "selected"; ?>> GENAP </option>
				               
				                </select>
				            </div>
				              <div class="form-group">
				                <label for="kelas">Tahun Ajaran</label>
				                <input class="form-control" style="" type="text" name="th_ajaran" value="<?php echo  $row->th_ajaran ?>" placeholder="2017/2018" required="yes">
				              </div>
				              <div class="form-group">
				                <label for="max">Max Jumlah Praktikum</label>
				                <select class="form-control" name="max" style="margin: 0px ;">
				                  <option value="">--choose--</option>
				                  <option value="5" <?php if ($row->max_prak ==5) echo "selected"; ?>> 5 </option>
				                  <option value="6" <?php if ($row->max_prak ==6) echo "selected"; ?>> 6 </option>
				                  <option value="7" <?php if ($row->max_prak ==7) echo "selected"; ?>> 7 </option>
				                  <option value="10" <?php if ($row->max_prak ==10) echo "selected"; ?>> 10 </option>
				                  <option value="11" <?php if ($row->max_prak ==11) echo "selected"; ?>> 11 </option>
				                  <option value="12" <?php if ($row->max_prak ==12) echo "selected"; ?>> 12 </option>
				                  
				                </select>
				              </div>
				         </div>    
            		
							<div class="modal-footer" style="background-color: #439376;">
								<button class="btn btn-success" type="submit">
									Ubah
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Batal
								</button>
							</div>
						 </form>
					
				</div>
			</div>


<script>
			function get_semester(){
	
			document.getElementById("semesterr").innerHTML=
			 '<option value="GASAL"> GASAL </option>'+
			 '<option value="GENAP"> GENAP </option>';
			
		}
</script>