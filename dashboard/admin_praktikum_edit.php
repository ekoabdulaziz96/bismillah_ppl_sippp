<?php

require_once('function/connect.php');
$nimlama= $_GET["nim"];
$idjlama= $_GET["idj"];
	$th = $_GET['th'];
	$sems = $_GET['sems'];

	$query = "SELECT * FROM praktikum WHERE nim='$nimlama' and id_jadwal='$idjlama'";
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
						<h4 class="modal-title">Ubah Praktikum</h4>
					</div>
					
						<form action="function/praktikum_edit.php?idjlama=<?php echo $idjlama ?>&nimlama=<?php echo $nimlama ?>" name="modal_popup" enctype="multipart/form-data" method="post">
						 <div class="modal-body">
						 	<div class="form-group">
				                <label for="nim_mhs">NIM | Nama mahasiswa</label>
				                 <?php $mhs = $con->query("SELECT * FROM mahasiswa where nim = '$row->nim'");
				                      $mhss = $mhs->fetch_object();?>
				                <input class="form-control" type="text" name="nim_mhs" id="nim_mhs" value="<?php echo $mhss->nim.' | '.$mhss->nama ?>" placeholder="1" required="yes" disabled>
				        
							  <div class="form-group">
				                <label for="idj">Mata Kuliah</label>
				                <br>
				                <select name="idj" id="idj" class="form-control">
				                    <?php $jadwal = $con->query("SELECT * FROM jadwal where th_ajaran = '$th' and semester = '$sems' ");
				                      while ($kep = $jadwal->fetch_object()){ 
				                      	if($kep->matkul != 'semua'){?>
				                   <option value="<?php echo $kep->id_jadwal ?>"
				                   		<?php if($kep->id_jadwal == $row->id_jadwal) {echo "selected";}?>

				                   	>  <?php echo $kep->matkul.' '.$kep->kelas ?>				                   		
				                   	</option>
				                      <?php }} ?>
				                </select>
				              </div>
				            
				              <div class="form-group">
				                <label for="semester">Semester</label>
				                <input class="form-control" type="text" name="semester" id="semester" value="<?php echo $row->semester ?>" placeholder="1" required="yes">
				              </div>
				              <div class="form-group">
				                <label for="conten" class="form">Status</label>
				                <select name="status" class="form-control" id="status">
				                	 <option value="asprak" <?php if("asprak" == $row->status) {echo "selected";}?>> Asprak </option>
				                    <option value="praktikan" <?php if("praktikan" == $row->status) {echo "selected";}?>> Praktikan </option>
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