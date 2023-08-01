			</div>
             <!-- /. PAGE INNER  -->

            </div>
         <!-- /. PAGE WRAPPER  -->
<!-- <div style="position: fixed;right: 30px;bottom: 0;border: 3px solid #0D7E6F;">

Tahun Ajaran dan Semester
</div> -->

<div>
  <nav class="navbar navbar-default navbar-cls-bottom " role="navigation" style="margin-bottom: 0;">
    <div class="navbar-brand" style="background-color: #045147;min-width : 200px;width: 260px;"></div>

      <div style="color: white; padding: 15px 10px 5px 10px; float: right; font-size: 12px;">
         Copyright &copy; SIPPP 2017
      </div>
        </nav>
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

    <script src="assets/js/moment.js" type="text/javascript"></script>


</body>
<script type="text/javascript">
  window.setTimeout(function() {
  $(".alert-respon").fadeTo(500,0).slideUp(500, function(){
      $(this).remove();
  });
  }, 1800);
</script>

<script>
  
  function startTime(){
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);

    document.getElementById('livetime').innerHTML= h+':'+m+':'+s;

    // document.getElementById("livetime").innerHTML = today.toLocaleTimeString(['ban', 'id']);
    // console.log(today.toLocaleTimeString(['ban', 'id']));
    var t = setTimeout(startTime,500);
  }

  function checkTime(i){
    if (i < 10) i = '0' + i;
    return i;
  }




</script>



</html>