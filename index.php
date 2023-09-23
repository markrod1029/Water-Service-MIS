<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php $slide = 'index'; include 'includes/conn.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/leftbar.php' ?>
<?php include 'includes/slide.php' ?>

<body>

  <!--info-->
  <div class="carousel-inner py-4">
    <!-- Single item -->
    <div class="carousel-item active">
      <div class="container">
        <div class="row">
          <?php
          $today = date('Y-m-d');
          $qry = "SELECT * FROM tbladvisory WHERE Status='1'  AND date >= '$today' ";
          $query = $conn->query($qry);
          $hasAdvisories = false; // Variable para tsekahin kung may advisories
          while($row = $query->fetch_assoc()){
            $hasAdvisories = true; // Mayroong advisories
          ?>
          <!-- Info -->
           
          <div class="col-md-12">
            <div class="advisory-image">
              <center><h1 class="advisory-date" stye="font-size:28px;" >WATER SERVICE ADVISORY </h1></center>
            </div>
          </div>
          <br><br><br>
          <div class="col-md-6">
            <div class="advisory-image">
              <img src="advisory_images/<?php echo $row['advisory_photo']?>" alt="Advisory Image">
            </div>
          </div>
          <div class="col-md-6">
            <div class="advisory-details">
              <h4 class="advisory-date"> <b>When:</b> <?php echo date('F d, Y', strtotime($row['date']))?></h4>
              <h4 class="advisory-time"><?php echo date('h:i A', strtotime($row['time_start']))?> - <?php echo date('h:i A', strtotime($row['time_end']))?></h4>
              <p class="advisory-affected-area"> <b>Locations: </b> <?php echo $row['affected_area']?>
              <div id="dots-container">
                <span class="show-all-dots"></span>
                <span class="show-all-dots"></span>
                <span class="show-all-dots"></span>
              </div>
              </p>
              <p class="advisory-reason"> <b>What:</b> <?php echo $row['Wht']?></p>
              <p class="advisory-reason"> <b>Reason:</b> <?php echo $row['Reason']?></p>
            </div>
          </div>
          <?php } ?>
          <?php if (!$hasAdvisories) { ?>
            <div class="col-md-12">
              <p class="no-advisory-message">No advisory today.</p>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <?php include 'includes/footer.php' ?>

</body>
</html>

<style>
  .advisory-image img {
    width: 100%;
    height: auto;
  }

  .advisory-details {
    padding-left: 20px;
  }

  .advisory-date {
    font-size: 24px;
    font-weight: bold;
    color: #333;
  }

  .advisory-time {
    font-size: 20px;
    color: #666;
    margin-top: 10px;
  }
  .advisory-affected-area {
  font-size: 18px;
  color: #666;
  margin-top: 20px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.show-all-dots {
  display: inline-block;
  width: 5px;
  height: 5px;
  background-color: #000;
  border-radius: 50%;
  margin-left: 5px;
  cursor: pointer;
}

.show-all-dots.active {
  background-color: #666;
}


.advisory-reason {
  font-size: 18px;
  color: #666;
  margin-top: 10px;
  /* Bagong mga istilo */
  word-wrap: break-word;
}
.no-advisory-message {
  font-size: 18px;
  color: #666;
  margin-top: 20px;
  text-align: center;
}
</style>


<script>
function showAllAffectedAreas() {
  var affectedAreaElements = document.getElementsByClassName('advisory-affected-area');
  var dots = document.getElementsByClassName('show-all-dots');
  
  for (var i = 0; i < affectedAreaElements.length; i++) {
    var affectedAreaElement = affectedAreaElements[i];
    affectedAreaElement.style.whiteSpace = 'normal';
  }
  
  for (var j = 0; j < dots.length; j++) {
    dots[j].classList.add('active');
  }
}

window.addEventListener('DOMContentLoaded', function() {
  var dotsContainer = document.getElementById('dots-container');
  dotsContainer.addEventListener('click', showAllAffectedAreas);
});

</script>