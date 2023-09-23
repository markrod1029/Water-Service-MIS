<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php $slide = 'about'; include 'includes/conn.php' ?>
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
        <div class="booking_text">
        </div>
  <?php echo $row['about'] ?>
  </div>
  </div>

  <?php }?>



  <!--Script for include-->
  <?php include 'includes/footer.php' ?>

</body>

</html>

