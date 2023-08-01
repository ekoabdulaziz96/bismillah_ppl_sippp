
<?php include_once('function/connect.php'); ?>

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
<body style="background: url('assets/img/bg4.jpg')  no-repeat;">
<!-- /. NAV SIDE  -->
<div>
	

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->
<script>
	$(document).ready(function(){
		$('#th_ajar').ready(function(){
				var th= $("#th_ajar").val();	
			$.ajax({
				url:"ajax_func/admin_pilih_semester.php?th="+th,
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#hasil_semester").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#hasil_semester").html(data);
				},
				error: function(){
					$("#hasil_semester").html("The page can't be loaded");
				}
			});
		});
	});
		$(document).ready(function(){
		$('#th_ajar').change(function(){
				var th= $("#th_ajar").val();	
			$.ajax({
				url:"ajax_func/admin_pilih_semester.php?th="+th,
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#hasil_semester").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#hasil_semester").html(data);
				},
				error: function(){
					$("#hasil_semester").html("The page can't be loaded");
				}
			});
		});
	});
	</script>

<div class="row" style="margin-top: 150px">
	<div class="col-md-5 col-md-offset-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				Semester dan Tahun Ajaran
				<a href='index.php'  style="float: right;" ><i class='fa  fa-arrow-circle-o-left fa-2x' data-target="#ModalAdd" data-toggle="modal"></i></a>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<form action="function/set.php" method="POST" role="form" autocomplete="on">
							<div class="form-group">
								<label for="th_ajar">Pilih Tahun Ajaran&nbsp;</label>
								<select class='form-control' id='th_ajar' name="th_ajar" required="yes">
								<option value="">--choose--</option>
								<?php
								      $date = date(Y);
								   	  $query1 = "SELECT * FROM jadwal where th_ajaran like '$date%' ";	
								      $result1 = $con->query( $query1 );
								   	  $row1 = $result1->fetch_object();


									$query = "SELECT * FROM jadwal Group by th_ajaran";
									$result = $con->query( $query );
									while ($row = $result->fetch_object()){ ?>
									<option value='<?php echo $row->th_ajaran?>' <?php if ($row->th_ajaran==$row1->th_ajaran) {echo "selected";} ?>> 
										<?php echo  $row->th_ajaran ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group" id="hasil_semester">
								
							</div>
							<div class="form-group">
								<button class="form-control btn btn-success" type="submit" id="ubah" name="ubah"> Submit
								</button> 
							</div>
						</form>
					</div>
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