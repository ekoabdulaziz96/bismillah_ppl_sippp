
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
<script>
	$(document).ready(function(){
		$('#jadwal').change(function(){
				var jadwal= $("#jadwal").val();
				// var pertemuan= $("#pertemuan").val();		
			$.ajax({
				url:"ajax_func/pilih_pertemuan.php?idj="+jadwal,
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#pilihpertemuan").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#pilihpertemuan").html(data);
				},
				error: function(){
					$("#pilihpertemuan").html("The page can't be loaded");
				}
			});
		});
	});

</script>
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
				
				<div class="col-md-5 col-sm-6 col-xs-12">
					Mata Kuliah | Kelas :
				<select class='form-control' id='jadwal'>
					<option value="">--choose--</option>
				<?php
					$result = $con->query("SELECT * FROM jadwal where id_jadwal in (SELECT id_jadwal FROM praktikum group by id_jadwal ) and  th_ajaran ='$th' and semester='$sems'  ");
					// Execute the query
					while ($row = $result->fetch_object()){
						echo "<option value='$row->id_jadwal'>"
						.
						$row->matkul." ". $row->kelas
						.
						"</option>";
					}
					
				?>
				</select>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12" id="pilihpertemuan">  </div>

		</div>
		</div>
	</div>
</div>
<!-- /. ROW  -->
<div class="row" >
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			   Daftar presensi
			   	
			  
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="success">
								<th>No</th>
								<th>NIM</th>
								<th>Nama</th>		
								<th>Pertemuan</th>
								<th>Kehadiran</th>
								<th>Keterangan</th>

							</tr>
						</thead>
						<tbody id="hasil_presensi">
						
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