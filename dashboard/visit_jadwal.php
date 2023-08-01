
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
<body style="margin:5px">
<!-- /. NAV SIDE  -->
<div>
	

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->
<script>
	$(document).ready(function(){
		$('#jadwal').change(function(){
				var jadwal= $("#jadwal").val();	
			$.ajax({
				url:"ajax_func/admin_list_jadwal_1.php?hari="+jadwal+"&th=<?php echo $th?>&sems=<?php echo $sems ?>",
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#hasil_jadwal").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#hasil_jadwal").html(data);
				},
				error: function(){
					$("#hasil_jadwal").html("The page can't be loaded");
				}
			});
		});
	});
</script>


<!-- /. ROW  -->
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="height: 50px;">
			   Daftar Jadwal
			<div class="col-md-3 col-sm-4 col-xs-4" style="float :right">
				<select class='form-control' id='jadwal'>
					<option value="">--Hari--</option>
				<?php
					$query = "SELECT * FROM jadwal where semester ='$sems' and th_ajaran='$th' group by hari order by hari desc";
					// Execute the query
					$result = $con->query( $query );
					while ($row = $result->fetch_object()){
						if($row->matkul != 'semua'){
						echo "<option value='$row->hari' >".$row->hari."</option>";
						}
					}
					
				?>
				</select>
				</div>
			  
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="success">
								<th>Jam</th>
								<th>Mata Kuliah</th>
								<th>Kelas</th>
								<th>Ruang</th>

							</tr>
						</thead>
						<tbody id="hasil_jadwal">
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


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