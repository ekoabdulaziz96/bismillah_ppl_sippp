
<?php include_once('function/connect.php'); ?>
<?php 
	$date = date(Y);
	$query1 = "SELECT * FROM jadwal where th_ajaran like '$date%' ";	
	$result1 = $con->query( $query1 );
	$row1 = $result1->fetch_object();
	 	$th = $row1->th_ajaran;

	  if (date(m)=="7" || date(m)=="8" || date(m)=="9"|| date(m)=="10"|| date(m)=="11" || date(m)=="12"){
	   		$sems= "GASAL";} 	
	   else {$sems = "GENAP";}
 ?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php $site_name ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- <link href="assets/css/w3.css" rel="stylesheet" /> -->
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="margin: 5px">
<!-- /. NAV SIDE  -->
<div>
	

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->
<script>
	$(document).ready(function(){
		$('#penunjang').change(function(){
				var penunjang= $("#penunjang").val();
			
			$.ajax({
				url:"ajax_func/visit_list_penunjang.php?penunjang="+penunjang,
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
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-5 col-sm-12 col-xs-12">
					Mata Kuliah | Kelas :
				<select class='form-control' id='penunjang'>
					<option value="">--choose--</option>
				<?php
					$result = $con->query("SELECT * FROM jadwal where id_jadwal in (SELECT id_jadwal FROM penunjang group by id_jadwal ) and  th_ajaran ='$th' and semester='$sems'  ");
					// Execute the query
					while ($row = $result->fetch_object()){
						
						// $resultt = $con->query("SELECT * FROM jadwal where id_jadwal in (SELECT id_jadwal FROM penunjang group by id_jadwal ) ");
						// $roww = $resultt->fetch_object();
						echo "<option value='$row->id_jadwal'>"
						.
						$row->matkul." ". $row->kelas
						.
						"</option>";
					}
					
				?>
				</select>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /. ROW  -->
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			   Daftar Penunjang
			 
			 
			   	
			  
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="success">
								<th>No</th>
								<th>Mata kuliah</th>
								<th>Kelas</th>
								<th>Pertemuan</th>
								<th>Content</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody id="hasil_mhs">
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Popup Add -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" style="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #439376;color: white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Penunjang</h4>
					</div>
					
						<form action="function/penunjang_tambah.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="modal-body">
				              <div class="form-group">
				                <label for="idj">Jadwal</label>
				                <br>
				                <select name="idj" class="form-control">
				                  <option value="">--choose--</option>
				                    <?php $namaadmin = $con->query("SELECT * FROM jadwal ");
				                      while ($kep = $namaadmin->fetch_object()){ ?>
				                   <option value="<?php echo $kep->id_jadwal ?>"><?php echo $kep->matkul.' '.$kep->kelas ?></option>
				                      <?php } ?>
				                </select>
				                </div>
				            
				              <div class="form-group">
				                <label for="pertemuan">Pertemuan</label>
				                <select name="pertemuan" class="form-control">
				                  <option value="">--choose--</option>
				                    <?php $namaadmin = $con->query("SELECT * FROM jadwal ");
				                      while ($kep = $namaadmin->fetch_object()){ ?>
				                   <option value="<?php echo $i ?>"><?php echo $kep->matkul.' '.$kep->kelas ?></option>
				                      <?php } ?>
				                </select>
				              </div>
				              <div class="form-group">
				                <label for="conten">Conten</label>
				                <textarea class="form-control" name="conten" id="" cols="25"; rows="20" placeholder="penugasan praktikum imk" required="yes"></textarea>
				                
				              </div>
				         </div>    
            		
							<div class="modal-footer" style="background-color: #439376;">
								<button class="btn btn-success" type="submit">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						 </form>
					
				</div>
			</div>
		</div>

<!-- Modal Popup Add -->
		<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog">		</div>

<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="delete_message" style="text-align:center;"> ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Delete</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>		
<?php 
	mysqli_close($con);
?>
	<script>

		function view(idp){
				$.ajax({
					url: "praktikan_view_penunjang_.php?idp="+idp+"&th=<?php echo $th ?>&sems=<?php echo $sems ?>",
					type: "GET",
					dataType:"html",
					success: function (data){
					$("#ModalEdit").html(data);
					$("#ModalEdit").modal('show');
				}

			});
		}
	</script>
</div>
<!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <!-- <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script> -->
    <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js" type="text/javascript"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js" type="text/javascript"></script>

</body>