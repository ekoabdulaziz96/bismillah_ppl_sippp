<?php

require_once('function/connect.php');
$nimlama= $_GET["nim"];

	$query = "SELECT * FROM mahasiswa WHERE nim='$nimlama'";
	$result = $con->query( $query );
	if(!$result){
		die('Could not connect to database : <br/>'.$con->error);
	}

$row = $result->fetch_object();

?>

		<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #1DC484;color: white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Ubah Mahasiswa</h4>
					</div>
					
						<form action="function/mahasiswa_edit.php?nimlama=<?php echo $nimlama ?>" method="post">
							<div class="modal-body">
							  <div class="form-group">
				                <label for="nim">NIM</label>
				                <input class="form-control" type="text" name="nimbaru" value="<?php echo $row->nim ?>" placeholder="24010315120001" required="yes">
				              </div>
				              <div class="form-group">
				                <label for="nama">Nama</label>
				                <input class="form-control" type="text" name="nama" value="<?php echo $row->nama ?>" placeholder="Nama Lengkap" required="yes">
				              </div>
				              <div class="form-group">
				                <label for="angkatan">Angkatan</label>
				                <input class="form-control" type="text" name="angkatan" value="<?php echo $row->angkatan ?>" placeholder="2015" required="yes">
				              </div>
				               <div class="form-group">
				                <label for="cp">Contct Person</label>
				                <input class="form-control" type="text" name="cp" value="<?php echo $row->cp ?>" placeholder="08123456123" required="yes">
				              </div>
				             
				         </div>    
            		
							<div class="modal-footer" style="background-color: #1DC484;">
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