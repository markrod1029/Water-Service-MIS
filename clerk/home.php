<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "dashboard"; include 'includes/leftbar.php' ?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:lightblue'>Plumber</li>
      <li style='color:darkblue'>Dashboard</li>
    </ul>
    <!--<a href="https://justboil.me/" onclick="alert('Coming soon'); return false" target="_blank" class="button blue">
      <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
      <span>Premium Demo</span>
    </a>-->
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title" style='color:lightblue;font-size:18px'>
     WELCOME!
    </h1>
    <button type="button" onclick="window.location.href='home.php'" class="button light">Refresh</button>
  </div>
</section>

  <section class="section main-section">
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
      <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
		   
           
			  <a href="message.php">
              <h3>
              Concern Message 
              </h3>
              <h1>
				<?php
				$clientx="SELECT COUNT(*) FROM messages WHERE  message_status = '1' ";
				$resclientx=mysqli_query($connect,$clientx)or die(mysqli_error($connect));
				$rowclientx=mysqli_fetch_array($resclientx);
				$totalclientx=$rowclientx[0];
				echo htmlentities($totalclientx);
				?>		
              </h1>
			  </a>
            </div>
            <span class="icon widget-icon text-green-500"><i class="fab fa-facebook-messenger" style='font-size:40px;color:blue'></i></span>
          </div>
        </div>
      </div>

   
    </div>
  </section>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

<?php include 'includes/footer.php' ?>