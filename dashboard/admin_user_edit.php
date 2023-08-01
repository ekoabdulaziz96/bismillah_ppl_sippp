<?php

require_once('function/connect.php');
	$idlama= $_GET["id"];
	$th = $_GET['th'];
	$sems = $_GET['sems'];


	$query = "SELECT * FROM user WHERE id_user='$idlama'";
	$result = $con->query( $query );
	if(!$result){
		die('Could not connect to database : <br/>'.$con->error);
	}

$row = $result->fetch_object();

?>

		<div class="modal-dialog">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #439376;color: white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Ubah User</h4>
					</div>
					
						<form action="function/user_edit.php?idlama=<?php echo $idlama ?>" name="modal_popup" id="formm" enctype="multipart/form-data" method="post">
						  <div class="modal-body">
				              <div class="form-group">
				                <label for="nama">Username</label>
				                <input class="form-control" type="text" name="nama" value="<?php echo $row->username ?>" placeholder="aspimkA1" required="yes">
				              </div>
				              <div class="form-group">
				                <label for="pass">Password</label>
				                <input class="form-control" type="text" name="pass" value="<?php echo $row->password ?>" placeholder="*****" required="yes">
				              </div>
				               <div class="form-group">
				                <label for="hak" style="margin-right: 10px">Hak Akses</label>
				                <select name="hak" id="hakk" class="form-control" onclick="">
				                    <option value="admin" <?php if("admin" == $row->hakAkses) {echo "selected";}?> > Admin </option>
				                    <option value="asprak" <?php if("asprak" == $row->hakAkses) {echo "selected";}?>> Asprak </option>
				                    <option value="praktikan" <?php if("praktikan" == $row->hakAkses) {echo "selected";}?>> Praktikan </option>
				                	

				                </select>
				              </div>
				              
				              <div class="form-group">
				                <label for="kep" style="margin-right: 13px">Kepentingan</label>
				                <select name="kep"  id="kepp" class="form-control" onclick="">         	                
				                    <?php $jadwal = $con->query("SELECT * FROM jadwal where th_ajaran = '$th' and semester = '$sems'");
                      				while ($kep = $jadwal->fetch_object()){ ?>
                        			<option value="<?php echo $kep->id_jadwal ?>" <?php if( $kep->id_jadwal == $row->kepentingan) {echo "selected";}?>><?php echo $kep->matkul. " ".$kep->kelas?></option>
                     				 <?php } ?>
				                  	
				                     
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
		</div>


<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->
	<script>
		function get_akses(){
	
			document.getElementById("hakk").innerHTML=
			 '<option value="admin"> Admin </option>'+
			 '<option value="asprak"> Asprak </option>'+
		 	 '<option value="praktikan"> Praktikan </option>';
			
		}
	
	</script>

