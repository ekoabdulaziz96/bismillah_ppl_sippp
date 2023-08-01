
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" style="min-width: 440px; height: 500px">
<?php
		require_once('function/connect.php');
	session_start();
	if(isset($_SESSION['user'])){
	   $id_user = $_SESSION['user'];
	   $hakAkses = $_SESSION['hakAkses'];
	   $kepentingan = $_SESSION['kepentingan'];

	   $status = $con->query("SELECT * FROM user WHERE id_user='$id_user'");
	   $statuss = $status->fetch_object();
	}
	else header("Location:./login.php");

	if ($hakAkses =='admin'){
		if(isset($_SESSION['sems'])){
		 $sems = $_SESSION['sems']; 
		 $th = $_SESSION['th'];
		   

		}else header("Location:./pilih.php");
	 }else {
	 	$query9 = "SELECT * FROM jadwal where id_jadwal ='$kepentingan'";
		$result9 = $con->query( $query9 );
  		$results9 = $result9->fetch_object();
	 	$sems = $results9->semester;
	 	$th = $results9->th_ajaran;

						
	 }
    ?>
<script src="assets/js/moment.js" type="text/javascript"></script>
	
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php $site_name?></title>
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
<body style="background-color:#045147;height: 500px;" onload="startTime()" >
    <div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="background-color: #045147"><i class="fa fa-thumbs-o-up"></i> <?php echo $site_name ?></a>
            </div>
            <div></div>
			<div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
				<a href="#" title='Ubah Password' data-target="#setPassword" data-toggle="modal" style="color:#fff; font-size:12px;">
					
					<i class="fa fa-gears  " ></i> 
					<?php if ( $statuss->hakAkses=='admin') echo $statuss->hakAkses; 
						else {
							$matkul = $con->query("SELECT * FROM jadwal WHERE id_jadwal='$statuss->kepentingan'");
	   						$matkuls = $matkul->fetch_object();
	   						 echo $hakAkses.' '. $matkuls->matkul.' '.$matkuls->kelas;
						}
					?> 
					<i class="fa fa-unlock-alt  " ></i> &nbsp;&nbsp;

				</a>
				<span style="text-decoration: none; color:#fff; font-size:12px;" > <?php
				
				$hari = array ( 1 =>    'Senin',
								'Selasa',
								'Rabu',
								'Kamis',
								'Jumat',
								'Sabtu',
								'Minggu'
							);
		
					echo '( '.$hari[ date('w') ].', '.date("Y-m-d") . " |" ;
				?>
				
				<span id="livetime"></span>
				)</span>
				<a href="#" data-target="#keluar" data-toggle="modal" class="btn btn-danger square-btn-adjust">Logout</a>
			</div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse" >
                <ul class="nav" id="main-menu">
				<?php
				if ($hakAkses == "admin"){
				?>
				
				<li class="text-center" >
					<?php if ($hakAkses ='admin') {?>
					<img src="assets/img/user/admin.jpg" class="user-image img-responsive"/>
					<?php } ?>
				</li>
				<li >
					<a id="admin_dashboard" href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard<span class="fa arrow"></span></a>
				</li>
					<li >
						<a id="admin_presensi" href="admin_presensi.php"><i class="fa fa-pencil-square-o fa-2x"></i>Presensi<span class="fa arrow"></span></a>
					</li>
					<li >
						<a id="admin_praktikum" href="admin_praktikum.php"><i class="fa fa-list-alt fa-2x"></i>Praktikum<span class="fa arrow"></span></a>
					</li>
					<li>
						<a id="admin_penunjang" href="admin_penunjang.php"><i class="fa fa-bullhorn fa-2x"></i>Penunjang Praktikum<span class="fa arrow"></span></a>
					</li>
					<li>
						<a id="admin_mahasiswa" href="admin_mahasiswa.php"><i class="fa fa-user-circle-o fa-2x"></i>Mahasiswa<span class="fa arrow"></span></a>
					</li>
					<li>
						<a id="admin_jadwal" href="admin_jadwal.php"><i class="fa fa-calendar fa-2x"></i>Jadwal<span class="fa arrow"></span></a>
					</li>
					<li>
						<a id="admin_user" href="admin_user.php"><i class="fa fa-lock fa-2x"></i>User<span class="fa arrow"></span></a>
					</li>
					<?php } 

					if ($hakAkses == "asprak"){ ?>
						
				<li class="text-center">
					<img src="assets/img/user/asprak.jpg" class="user-image img-responsive"/>
				</li>
				<li >
					<a id="asprak_dashboard" href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard<span class="fa arrow"></a>
				</li>
					<li >
						<a id="asprak_presensi" href="tunggu.php?idj=<?php echo $kepentingan?>&akses=<?php echo $hakAkses ?>"><i class="fa fa-pencil-square-o fa-2x"></i>Presensi Praktikan<span class="fa arrow"></span></a>
					</li>
					<li>
						<a id="asprak_penunjang" href="asprak_penunjang.php"><i class="fa  fa-bullhorn fa-2x"></i>Penunjang Praktikan<span class="fa arrow"></span></a>
					</li>
					<li>
						<a id="asprak_view_presensi" href="asprak_view_presensi.php"><i class="fa fa-eye fa-2x"></i>View Presensi<span class="fa arrow"></span></a>
					</li>
					
					<?php }	
				if ($hakAkses == "praktikan"){ ?>
		
				<li class="text-center">
					<img src="assets/img/user/praktikan.jpg" class="user-image img-responsive"/>
				</li>
				<li >
					<a id="praktikan_dashboard" href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard<span class="fa arrow"></a>
				</li>
					<li >
						<a id="praktikan_presensi" href="tunggu.php?idj=<?php echo $kepentingan?>&akses=<?php echo $hakAkses ?>"><i class="fa fa-pencil-square-o fa-2x"></i>Presensi Asprak<span class="fa arrow"></span></a>
					</li>
					
					<li>
						<a id="praktikan_view_presensi" href="praktikan_view_presensi.php"><i class="fa fa-eye fa-2x"></i>View Presensi<span class="fa arrow"></span></a>
					</li>
					<li>
						<a id="praktikan_view_penunjang" href="praktikan_view_penunjang.php"><i class="fa fa-eye fa-2x"></i>View Penunjang<span class="fa arrow"></span></a>
					</li>
					<?php } ?>

	            </ul>
            </div>
        </nav>
    </div>


        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner"  >

   <?php require_once ('alert.php') ?>
   <div class="pilih text-center">
   	PRAKTIKUM INFORMATIKA UNIVERSITAS DIPONEGORO TAHUN AJARAN <?php echo $th ?> SEMESTER <?php echo $sems ?>
   		<?php if ($hakAkses == 'admin') {?> <a href="pilih.php"><i class="fa fa-gear" ></i></a> <?php } ?>
	</div> 
   <br/>


<div id="keluar" class="modal fade" tabindex="-1" role="dialog">
   	<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #439376;color: white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">log-out</h4>
					</div>
										
							<div class="modal-body">
				              <div class="form-group text-center">
				                <label for="th_ajaran" style="font-size: 16pt;">Apakah Anda Yakin Ingin Keluar ?</label>

							</div>
							</div>
            		
							<div class="modal-footer" style="background-color: #439376;">
								<a href="logout.php"><button class="btn btn-success" type="submit" style="float: center">
									Logout
								</button>
							</a>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Batal
								</button>
							</div>
						 					
		</div>
	</div>
</div>

	<div id="setPassword" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #439376;color: white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Ubah Password</h4>
					</div>
					
						<form action="function/user_password.php?idu=<?php echo $id_user ?>&akses=<?php echo $hakAkses ?>" name="modal_popup" id="formm" enctype="multipart/form-data" method="post">
							<div class="modal-body">
				              <div class="form-group">
				                <label for="passlama">Masukkan Password Lama</label>
				                <input class="form-control" type="password" name="passlama" value="" placeholder="*****" required="yes">
				              </div>
				              <div class="form-group">
				                <label for="passbaru">Masukkan Password Baru</label>
				                <input class="form-control" type="password" name="passbaru" value="" placeholder="*****" required="yes">
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
