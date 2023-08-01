<?php
$isbn = $_GET['isbn'];
include_once('sidebar_anggota.php');


// Assign the query
$query = " SELECT * FROM buku b LEFT JOIN kategori k ON b.idkategori=k.idkategori WHERE isbn='".$isbn."'";
// Execute the query
$result = $con->query($query);
$row = $result->fetch_object();
?>
<script>
	document.getElementById("dashboard").setAttribute("class","active-menu");
</script>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php $site_name ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head><!-- /. ROW  -->
<div class="col-md-3"></div>
<div class="col-md-3 col-sm-12 col-xs-12">                       
	<div class="panel panel-primary text-center no-boder bg-color-green">
		<div class="panel-body" style="margin-top: 30px;">
			<?php echo '<img src="assets/img/'.$row->file_gambar.'" width="100%;" />'; ?>
			<h5><?php echo $row->judul; ?></h5>
		</div>
		<div class="panel-footer back-footer-green">
		   <?php if(empty($row->nama)) echo '<i>uncategories</i>' ; else echo $row->nama; ?>
		</div>
	</div>                      
</div>
<br><br><br><br>
<?php
		echo '<table border="0">';
			echo '<tr>';
				echo '<td>ISBN</td>';
				echo '<td> : '.$row->isbn.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Judul</td>';
				echo '<td> : '.$row->judul.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Kategori</td>';
				echo '<td> : '; if(empty($row->nama)) echo 'uncategories' ; else echo $row->nama; echo'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Pengarang</td>';
				echo '<td> : '.$row->pengarang.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Penerbit</td>';
				echo '<td> : '.$row->penerbit.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Kota Terbit</td>';
				echo '<td> : '.$row->kota_terbit.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Stok Tersedia</td>';
				echo '<td> : '.$row->stok_tersedia.'</td>';
			echo '</tr>';
		echo '</table>';
		echo '<br />';
		echo '<a href="index.php">Kategori</a>';
		$con->close();
?>
<?php
	include_once('footer.php');
?>
