<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
      data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span> Menu
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="#page-top">
        <i class="fa fa-thumbs-o-up fa-lg">&nbsp;SIPPP</i></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="hidden">
          <a href="#page-top"></a>
        </li>
        <li class="page-scroll">
          <a href="#home">Beranda</a>
        </li>
        <li class="page-scroll">
          <a href="#jadwal">jadwal</a>
        </li>
        <li class="page-scroll">
          <a href="#presensi">Presensi</a>
        </li>
        <li class="page-scroll">
          <a href="#penunjang">Penunjang</a>
        </li>
       
        <li class="page-scroll <?php if(isset($_SESSION['sip_masuk_aja'])) echo 'signed' ?>">
          <a href="dashboard/login.php">

<?php
if (isset($_SESSION['sip_masuk_aja'])) {
    if ($status == 'petugas') {
        
        echo $petugas->nama;
    } else {
      $kata = explode(" ",$anggota->nama);
        echo $kata[0];
    
    }
} else {
    echo 'LOGIN';
}
?>

          </a>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
