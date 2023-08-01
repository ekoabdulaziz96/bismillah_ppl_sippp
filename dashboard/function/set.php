   <?php 
   	if (isset($_POST['th_ajar'])){
   	
		session_start();
		$_SESSION['sems']= $_POST['sems'];
		$_SESSION['th']= $_POST['th_ajar'];
		header('location:../index.php');
	   }
    ?>