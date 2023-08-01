<?php

require_once('function/connect.php');
	$idplama= $_GET["idp"];
	$th = $_GET['th'];
	$sems = $_GET['sems'];

	$query = "SELECT * FROM penunjang WHERE id_penunjang='$idplama'";
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
						<h4 class="modal-title">Ubah Penunjang</h4>
					</div>
					
						<form action="function/penunjang_edit_asprak.php?idplama=<?php echo $idplama ?>" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="modal-body">
				              <div class="form-group">
				                <label for="idj">Mata Kuliah</label>
				                
				                <select name="idj" class="form-control" readonly>				                 
				                    <?php $namaadmin = $con->query("SELECT * FROM jadwal where th_ajaran = '$th' and semester = '$sems'");
				                      while ($kep = $namaadmin->fetch_object()){ 
				                      	if($kep->matkul != semua){?>
				                   <option value="<?php echo $kep->id_jadwal ?>" 
				                   	<?php if($kep->id_jadwal == $row->id_jadwal) {echo "selected";}?> >
				                   	<?php echo $kep->matkul.' '.$kep->kelas ?></option>
				                      <?php }} ?>
				                </select>
				                </div>
				            
				              <div class="form-group">
				                <label for="pertemuan">Pertemuan</label>
				                <select class='form-control' id='pertemuan' name="pertemuan">
								<option value="">--choose--</option>
								<?php
								$result1 = $con->query("SELECT * FROM jadwal where id_jadwal='$row->id_jadwal'");
								$row1 = $result1->fetch_object();
								$i = 1;
								while ($i <= $row1->max_prak) { 
									$result2 = $con->query("SELECT * FROM penunjang where pertemuan='$i' and pertemuan <> '$row->pertemuan' and id_jadwal='$row->id_jadwal'");
									$row2 = mysqli_num_rows($result2);
				   					if ($row2 !=1) { 
								?>
									<option value="<?php echo $i ?>" <?php if ($i==$row->pertemuan) {echo "selected";}?>><?php echo $i ?></option>
								<?php }

								$i++;} ?>
							  </select>
				              </div>
				              <div class="form-group">
				                <label for="conten">Conten</label>
				                <textarea class="form-control" name="conten" id="" cols="25"; rows="20" placeholder="penugasan praktikum imk" required="yes"><?php echo $row->conten ?></textarea>
				                
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