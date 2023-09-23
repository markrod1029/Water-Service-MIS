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
			  <a href="complaints.php">
              <h3>
              Pending Complaints
              </h3>
              <h1>
                <?php
                $id = $user['client_ID'];
				$com="SELECT COUNT(*) FROM tblcomplaints WHERE Complaint_Status =0 AND client_ID = '$id' AND scheduled = '0' ";
				$rescom=mysqli_query($connect,$com)or die(mysqli_error($connect));
				$rwcom=mysqli_fetch_array($rescom);
				$totalrwcom=$rwcom[0];
				echo htmlentities($totalrwcom);
				?>		
              </h1>
			  </a>
            </div>
            <span class="icon widget-icon text-blue-500"><i class="fa fa-comments" style='font-size:40px;color:blue'></i></span>
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