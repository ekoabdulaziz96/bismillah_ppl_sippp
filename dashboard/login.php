<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	
    <!-- <title><?php $site_name ?></title> -->

	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <style>
	body{
		/*background-color: #076960;*/
		background: url("assets/img/bg5.jpg")  no-repeat;
		/*background-size: 100% 100%;*/
		
		/*background-color:#33726a ;*/
	}

	.vertical-offset-100{
		padding-top:180px;
	}
	</style>
</head>
<body>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel " style="background-color: #33726a">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Silakan Masuk</h3>
			 	</div>
			  	<div class="panel-body" style="background-color:#EDEDED">
			    	<form class="form-group" action="function/masuk.php" method="POST">
                   		<?php session_start(); if (isset( $_SESSION['warning'])){ ?>
                    	  <div class="form-group" style="color: red;font-size: 11px;padding-left: 10px">
                    	  	<?php echo  $_SESSION['warning'] ?>
                    	  </div>
                   		<?php } ?>
		                  <div class="form-group">
		                    <input class="form-control" type="text" name="username" value="<?php if (isset($_GET['username'])) echo $_GET['username'] ?>" placeholder="Username" required="yes">
		                  </div>
		                  
		                  <div class="form-group" id="password">
		                    <input class="form-control" type="password" name="password" value="" placeholder="Password" required="">
		                  </div>
		                  <button class="btn btn-primary" type="submit" name="btnlogin" id="btnlogin">Login</button>
			    		<a href="../index.php"><button class="btn btn-success" type="button" name="batal">Home</button></a>
			    	
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

