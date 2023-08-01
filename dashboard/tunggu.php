
<?php include_once('function/connect.php'); 
	$idj=$_GET['idj'];
	session_start();
	$jadwal = $con->query("SELECT * FROM jadwal where  id_jadwal='$idj' ");
	$kep = $jadwal->fetch_object();
	$selectedTime= date('G:i:s');
	$expired=date('G:i:s',strtotime($selectedTime . ' +120 minutes'));
	$expired1=date('G:i:s',strtotime($kep->jam . ' +120 minutes'));

	if($kep->hari == 'Minggu') $hari = 0;
	elseif($kep->hari == 'Senin') $hari = 1;
	elseif($kep->hari == 'Selasa') $hari = 2;
	elseif($kep->hari == 'Rabu') $hari = 3;
	elseif($kep->hari == 'Kamis') $hari = 4;
	elseif($kep->hari == 'Jumat') $hari = 5;
	elseif($kep->hari == 'Sabtu') $hari = 6;

	if(!isset($_SESSION['user']))

	 header("Location:./login.php");

	if (($hari == date(w)) && (strtotime($selectedTime) >= strtotime($kep->jam)) && (strtotime($selectedTime)<=strtotime($expired1))){
		
        $_SESSION['start'] = time(); 
        $_SESSION['aksess'] = 'ya'; 
        $_SESSION['expire'] = $_SESSION['start'] + (strtotime($expired1)-strtotime($selectedTime));
        	if ($_GET['akses']=='praktikan'){header('Location: praktikan_presensi.php');}
        	elseif ($_GET['akses']=='asprak'){header('Location: asprak_presensi.php');}
            
        } 
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
<body style="background: url('assets/img/bg4.jpg')  no-repeat;" onload="startTime()">
<!-- /. NAV SIDE  -->
<div>
	

<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script> -->

<?php $idj=$_GET['idj'];
	$jadwal = $con->query("SELECT * FROM jadwal where  id_jadwal='$idj' ");
	$kep = $jadwal->fetch_object();
 ?>
<div class="row" style="margin-top: 150px">
	<div class="col-md-5 col-md-offset-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				Locked 
				<?php 
				$hari = array ( 1 =>    'Senin',
								'Selasa',
								'Rabu',
								'Kamis',
								'Jumat',
								'Sabtu',
								'Minggu'
							);

			echo '( '.$hari[ date('w') ].', '; 
				?>
				<span id="livetime2"></span>
				)
				<a href='index.php'  style="float: right;" ><i class='fa  fa-arrow-circle-o-left fa-2x' data-target="#ModalAdd" data-toggle="modal"></i></a>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="text-center">
					<?php 
					
					 ?>	
					<label style="text-align: center" >Maaf, Silahkan menunggu sampai waktu praktikum <br> hari : <?php echo $kep->hari ?> <br>
					 pukul : <?php echo $kep->jam ?> sampai <?php echo date('G:i:s',strtotime($kep->jam . ' +120 minutes')) ?>
					</label>
								
							
								
							
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

<script>
	function startTime(){
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);

    document.getElementById('livetime2').innerHTML= h+':'+m+':'+s;
    
    // document.getElementById("livetime").innerHTML = today.toLocaleTimeString(['ban', 'id']);
    var t = setTimeout(startTime,500);
  }

  function checkTime(i){
    if (i < 10) i = '0' + i;
    return i;
  }
</script>