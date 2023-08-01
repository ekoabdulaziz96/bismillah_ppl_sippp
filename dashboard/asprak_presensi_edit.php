<?php

require_once('function/connect.php');
$nimlama= $_GET["nim"];
$idjlama= $_GET["idj"];
$pertemuan = $_GET['pertemuan'];
	

	$query = "SELECT * FROM praktikum WHERE nim='$nimlama' and id_jadwal='$idjlama'";
	$result = $con->query( $query );
	$row = $result->fetch_object();

	$query11 = "SELECT * FROM presensi WHERE id_praktikum in (select id_praktikum from praktikum where nim='$nimlama' and id_jadwal='$idjlama') and pertemuan ='$pertemuan'";
	$result11 = $con->query( $query11 );
	$row11 = $result11->fetch_object();

	
?>

		<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #439376;color: white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Ubah Presensi</h4>
					</div>
					
						<form action="function/presensi_edit_asprak.php?idprak=<?php echo $row11->id_praktikum?>" name="modal_popup" enctype="multipart/form-data" method="post">
						 <div class="modal-body">
						 	<div class="form-group">
				                <label for="nim_mhs">NIM | Nama Mahasiswa</label>
				                 <?php $mhs = $con->query("SELECT * FROM mahasiswa where nim = '$row->nim'");
				                      $mhss = $mhs->fetch_object();?>
				                <input class="form-control" type="text" name="nim_mhs" id="nim_mhs" value="<?php echo $mhss->nim.' | '.$mhss->nama ?>" placeholder="1" required="yes" disabled>
				        
							  <div class="form-group">
				                <label for="pertemuan">Pertemuan</label>
				                <?php $mhs = $con->query("SELECT * FROM mahasiswa where nim = '$row->nim'");
				                      $mhss = $mhs->fetch_object();?>
				                <input class="form-control" type="text" name="pertemuan" id="pertemuan" value="<?php echo $pertemuan ?>" placeholder="1" required="yes" readonly>
				              </div>
				             <div class="form-group">
				                <label for="kehadiran" class="form">Kehadiran</label>
				                <select name="kehadiran" class="form-control" id="kehadiran">
				                	<option value="HADIR" <?php if("HADIR" == $row11->pertemuan) {echo "selected";}?>> HADIR </option>
				                    <option value="ALPHA" <?php if("ALPHA" == $row11->pertemuan) {echo "selected";}?>> ALPHA </option>
				                    <option value="IJIN" <?php if("IJIN" == $row11->pertemuan) {echo "selected";}?>> IJIN </option>
				                </select>  
				              </div>
				              <div class="form-group">
				                <label for="keterangan">Keterangan</label>
				                <input class="form-control" type="text" name="keterangan" id="keterangan" value="<?php echo $row11->keterangan ?>" placeholder="sakit" required="yes">
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