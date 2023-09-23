<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php $slide = 'contact'; include 'includes/conn.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/leftbar.php' ?>
<?php include 'includes/slide.php' ?>


    

<?php 
$qry="SELECT * FROM system";
$query = $conn->query($qry);
while($row = $query->fetch_assoc()){
  ?>

  <!--info-->

  <div class="booking info">
      <div class="index-post">


      <div class="container">
        <center>
<div class="row">
  
<div class="col-xs-12 col-sm-9 col-md-6">
<div class="widget subscribe no-box">
<h5 class="widget-title"> Service Hours</h5>
<h6>MONDAY – FRIDAY<br>8:00AM – 5:00PM
</h6>
</div>
</div>


<div class="col-xs-16 col-sm-6 col-md-6">
<div class="widget no-box">
<h5 class="widget-title"> Contact Us</h5>
<b>Contact No:</b> 0954064800<br>
<b>Telefax No.:</b> (075) 632 3153<br>
<b>Email Address:</b> www.urbiztondopang.gov.ph

</div>
</div>

</div>
</center>

</div>
<br>

<div class="panel-body p-20 " >
  
  <div class="gmap_canvas">
    <iframe width="100%" height="510" id="gmap_canvas" 
    src="https://maps.google.com/maps?q=Urbiztondo Sports Complex, Urbiztondo, Pangasinan&t=&z=10&ie=UTF8&iwloc=&output=embed" 
     frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    
    
    
    <style>.mapouter{position:relative;text-align:right;height:510px;width:770px;}</style>
    
  <br>
  
  </div>
  </div>
  </div>
  </div>

  <?php }?>



  <!--Script for include-->
  <?php include 'includes/footer.php' ?>

</body>

</html>
