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
						<h4 class="modal-title">View Penunjang</h4>
					</div>
					
							<div class="modal-body">
				           
				              <div class="form-group">
				                <label for="conten">Conten</label>
				                <textarea class="form-control" name="conten" id="" cols="25"; rows="20" placeholder="penugasan praktikum imk" required="yes"><?php echo $row->conten ?></textarea>
				                
				              </div>
				         </div>    
            		
							<div class="modal-footer" style="background-color: #439376;">
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									OK
								</button>
								
							</div>
						 </form>
					
				</div>
			</div>