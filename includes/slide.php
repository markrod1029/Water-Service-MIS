
<?php 
$qry="SELECT * FROM system";
$query = $conn->query($qry);
while($row = $query->fetch_assoc()){
  ?>
	
  <section class="home" id="home">


<?php 
if($slide == 'index')
{

?>
  <div class="swiper bg-slider">
      <div class="swiper-wrapper">
       

        <div class="swiper-slide dark-layer">
        <img src="images/<?php echo $row['picture2'] ?>" alt="">
          <div class="text-content" style="">
            <center>
            <h2 class="title"> Pasimbalo Urbiztondo <br><span style="color:red; font-size:50px; font-weight:bolder;">M</span>akabago, 
            <span style="color:red; font-size:50px; font-weight:bolder;">M</span>alaya at
             <span style="color:red; font-size:50px; font-weight:bolder;">O</span>rganisadong Bayan</h2>
          </center>
          </div>
        </div>
        <div class="swiper-slide dark-layer">
        <img src="images/<?php echo $row['picture1'] ?>" alt="">
          <div class="text-content">
          <center>
          <h2 class="title"> Pasimbalo Urbiztondo <br><span style="color:red; font-size:50px; font-weight:bolder;">M</span>akabago, 
            <span style="color:red; font-size:50px; font-weight:bolder;">M</span>alaya at
             <span style="color:red; font-size:50px; font-weight:bolder;">O</span>rganisadong Bayan</h2>
          </center>
          </div>
        </div>

        
        <div class="swiper-slide">
        <img src="images/<?php echo $row['picture3'] ?>" alt="">
          <div class="text-content">
          <center>
          <h2 class="title"> Pasimbalo Urbiztondo <br><span style="color:red; font-size:50px; font-weight:bolder;">M</span>akabago, 
            <span style="color:red; font-size:50px; font-weight:bolder;">M</span>alaya at
             <span style="color:red; font-size:50px; font-weight:bolder;">O</span>rganisadong Bayan</h2>
          <!--              
            <p style="font-size:20px; text-align:center;"> Pasimbalo Urbiztondo <br><span style="color:red;">M</span>akabago, <span style="color:red;">M</span>alaya at <span style="color:red;">O</span>rganisadong Bayan</p>
            <button class="read-btn" onclick="window.location.href='register_category.php';"> Signup Now<i
                class="uil uil-arrow-right"></i></button> -->
          </center>
          </div>
          </div>
        </div>
      </div>
    </div>

    
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <script>
  var swiper = new Swiper('.bg-slider', {
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
  });
</script>
<?php
}

else if($slide == 'about'){


  
?>
 

<div class="swiper bg-slider" style="height:50vh;">
      <div class="swiper-wrapper">
       

        <div class="swiper-slide dark-layer">
        <img src="images/<?php echo $row['picture2'] ?>" alt="" style="opacity:0.4">
          <div class="text-content" style="">
            <center>
            <h2  style=""class="title"> ABOUT US</h2>
          </center>
          </div>
        </div>

      </div>
    </div>

    
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <script>
  var swiper = new Swiper('.bg-slider', {
    loop: true,
    autoplay: {
      delay: 5000000000,
      disableOnInteraction: false,
    },
  });
</script>

<style>
.bg-slider {
    z-index: 777;
    position: relative;
    width: 100%;
    min-height: 60vh;
}

.home {
    min-height: 60vh;
}


.title{
  position:reslative;
   left:440px;
    font-size:60px; 
  color:#3e92cc;
}


@media screen and (max-width: 760px){

  .title{
  position:reslative;
   left:60px;
    font-size:60px; 
  color:#3e92cc;
} 
}

</style>

<?php
}

else if($slide == 'contact'){
?>


<div class="swiper bg-slider" style="height:50vh;">
      <div class="swiper-wrapper">
       

        <div class="swiper-slide dark-layer">
        <img src="images/<?php echo $row['picture2'] ?>" alt="" style="opacity:0.4">
          <div class="text-content" style="">
            <center>
            <h2  style=""class="title"> CONTACT US</h2>
          </center>
          </div>
        </div>

      </div>
    </div>

    
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <script>
  var swiper = new Swiper('.bg-slider', {
    loop: true,
    autoplay: {
      delay: 5000000000,
      disableOnInteraction: false,
    },
  });
</script>

<style>
.bg-slider {
    z-index: 777;
    position: relative;
    width: 100%;
    min-height: 60vh;
}

.home {
    min-height: 60vh;
}


.title{
  position:reslative;
   left:400px;
    font-size:60px; 
  color:#3e92cc;
}


@media screen and (max-width: 760px){

  .title{
  position:reslative;
   left:60px;
    font-size:60px; 
  color:#3e92cc;
} 
}

</style>
<?php 
}
?>




    <!-- <div class="bg-slider-thumbs" id="Info">
      <div class="swiper-wrapper thumbs-container">
        <img src="images/<?php echo $row['picture1'] ?>"  class="swiper-slide" alt="">
        <img src="images/<?php echo $row['picture2'] ?>"  class="swiper-slide" alt="">
        <img src="images/<?php echo $row['picture3'] ?>"  class="swiper-slide" alt="">

      </div>
    </div> -->
  </section>
  <?php }?>
