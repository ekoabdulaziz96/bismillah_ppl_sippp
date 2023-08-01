
<!DOCTYPE html>
<html lang="en" style=" margin:0px">


<head>
<title>SIPPP</title>
<link rel="stylesheet" type="text/css" href="assets/css/table.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="assets/css/main.css" type="text/css">
<link rel="stylesheet" href="assets/extras/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/extras/owl.theme.css" type="text/css">
<!-- Responsive CSS Styles -->
<link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
<!-- Bootstrap Select -->
<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
<!-- Bootstrap Core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Theme CSS -->
<link href="assets/css/freelancer.min.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<script>
$(document).ready(function() {
		$("#pengarang").change(function() {
				var search = $("#search").val();
				var pengarang = $("#pengarang").val();
				$.ajax({
						url: "search.php?search=" + search + "&pengarang=" + pengarang,
						type: "GET",
						dataType: 'html',
						beforeSend: function() {
							$("#hasil_cari").html('<img src="images/ajax_loader.png"/>');
						},
						success: function(data) {
							$("#hasil_cari").html(data);
						},
						error: function() {
							$("#hasil_cari").html("The page can't be loaded");
						}
				});
		});
		$("#search").change(function() {
        var search = $("#search").val();
        var pengarang = $("#pengarang").val();
				$.ajax({
						url: "search.php?search=" + search + "&pengarang=" + pengarang,
            type: "GET",
            dataType: 'html',
            beforeSend: function() {
                $("#hasil_cari").html('<img src="images/ajax_loader.png"/>');
            },
            success: function(data) {
                $("#hasil_cari").html(data);
            },
            error: function(){
                $("#hasil_cari").html("The page can't be loaded");
            }
				});
		});
    $("#submit").click(function() {
				var search = $("#search").val();
				var pengarang = $("#pengarang").val();
				$.ajax({
            url: "search.php?search="+search+"&pengarang="+pengarang,
            type: "GET",
            dataType: 'html',
            beforeSend: function() {
                $("#hasil_cari").html('<img src="images/ajax_loader.png"/>');
            },
          	success: function(data) {
              	$("#hasil_cari").html(data);
            },
            error: function() {
              	$("#hasil_cari").html("The page can't be loaded");
            }
				});
		});
});
</script>
</head>

<body id="page-top" class="index" style=" margin:0px" onload="startTime()">

<?php
include_once('header.php');
?>

<!-- Header -->
<header id='home' style="margin: -10px;background-color: #33726a">
	<div class="container" style="height: 700px;">
		<div class="row">
			<div class="col-lg-12">
				<!-- <img src="img/headr.jpg" style="z-index: -2px;" alt=""> -->
		
				<!-- <i class="fa fa-university fa-5x"></i> -->
				<div class="intro-text" style="margin-bottom: 60px;">
					<input type="" autofocus class="invisible">
					<br><br>
					<span class="name" style="font-size:36px;margin-top: -40px;">Sistem Informasi</span>
					<span class="name" style="font-size:36px;">Pengelolaan Presensi Praktikum Informatika</span>
					<br><br>
					<hr style="border-width: 5px">
					<span style="font-size: 60pt;font-weight: bold">
					<?php $hari = array ( 1 =>    'Senin',
								'Selasa',
								'Rabu',
								'Kamis',
								'Jumat',
								'Sabtu',
								'Minggu'
							);
		
					echo $hari[ date('w') ].', ' ?>
					</span>
					<span id="time" style="font-size: 60pt;font-weight: bold"></span>
					<hr style="border-width: 5px">
					<div style="font-size: 12px;margin-top: -20px">(*)Untuk pertanyaan seputar praktikum, silahkan menghubungi koordinator praktikum (NB : CP koor lab di halaman footer)</div>
					

				</div>					
				
			
		</div>
	</div>
 </div>
</header>

<div id="jadwal" style="background-color: #C9C5C5">
<div class="row" >
     <div class="col-lg-12 text-center" style="margin-top: 50px;">
        <h2>JADWAL PRAKTIKUM</h2>
    </div>
	<div class="col-lg-12 text-center">
		<section style="margin: -80px 6% 10px 6%;" >
		
		 <iframe src="dashboard/visit_jadwal.php" frameborder="0" width="90%" height="450" >
		 	
		 </iframe>
		  	
		</section>
	</div>
</div>
</div>
	
<div id="presensi" class="" style="background-color: #33726a">
<div class="row">
      <div class="col-lg-12 text-center " style="margin-top: 50px;">
        <h2 style="color: white">PRESENSI</h2>
    </div>
	
	<div class="col-lg-12 text-center">
		<section style="margin: -80px 6% 10px 6%;" >
		
		 <iframe src="dashboard/visit_presensi.php" frameborder="1" width="90%" height="450" style="background-color: white"></iframe>
		  	
		</section>
	</div>
</div >
</div>
<div id="penunjang" class="" style="background-color: #C9C5C5">
<div class="row">
      <div class="col-lg-12 text-center" style="margin-top: 50px;">
        <h2>PENUNJANG PRAKTIKUM</h2>
    </div>
	<div class="col-lg-12 text-center">
		<section style="margin: -80px 6% 10px 6%;" >
		
		 <iframe src="dashboard/visit_penunjang.php" frameborder="1" width="90%" height="680" ></iframe>
		  	
		</section>
	</div>
</div>
</div>
<!-- Footer -->
<footer class="text-center" id="footer" >
  <div class="footer-above">
    <div class="container">
      <div class="row">
        <div class="footer-col col-md-4" >
          <h3>Lokasi</h3>
          <p  style="font-size: 12px;">LAB E 01, LAB E 02 dan LAB B 01 </p>
          <p  style="font-size: 12px;">Departemen Ilmu Komputer/Informatika <br>Fakultas Sains dan Matematika Universitas Diponegoro</p>

        </div>
				<div class="footer-col col-md-4">
					<h3>WEB LAIN</h3>
					<div >
							<a href="http://hm.if.undip.ac.id" class="btn-outline" style="font-size: px;margin-left: -20px;">
								<i class=" fa fa-university"></i> HMIF
					
						</a>
					</div>
				</div>
				<div class="footer-col col-md-4">
					<h3>CS SIPPP</h3>
          <p style="font-size: 12px;">Untuk Pertanyaan Seputar Praktikum,  <br>
			Silahkan Menghubungi Koordinator Praktikum<br />
			Galih Dea, Line/WA : galih_dea / 087 731 366 607 <br> email : galih.dpratama@gmail.com</p>
        </div>
			</div>
		</div>
	</div>
	<div class="footer-below">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
          Copyright &copy; SIPPP 2017
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="assets/js/jquery.easing.min.js"></script>
<!-- Theme JavaScript -->
<script src="assets/js/freelancer.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/wow.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>

<script>
  
  function startTime(){
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);

    document.getElementById('time').innerHTML= h+':'+m+':'+s;

    // document.getElementById("livetime").innerHTML = today.toLocaleTimeString(['ban', 'id']);
    // console.log(today.toLocaleTimeString(['ban', 'id']));
    var t = setTimeout(startTime,500);
  }

  function checkTime(i){
    if (i < 10) i = '0' + i;
    return i;
  }




</script>