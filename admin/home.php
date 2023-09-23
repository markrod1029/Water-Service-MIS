<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "dashboard"; include 'includes/leftbar.php' ?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Dashboard</li>
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
		      <a href="clients.php">
              <h3>
                Active Clients
              </h3>
              <h1>
				<?php
				$client="SELECT COUNT(*) FROM tblclients WHERE Status ='1'";
				$resclient=mysqli_query($connect,$client)or die(mysqli_error($connect));
				$rowclient=mysqli_fetch_array($resclient);
				$totalclient=$rowclient[0];
				echo htmlentities($totalclient);
				?>
              </h1>
			  </a>
            </div>
            <span class="icon widget-icon text-green-500"><i class="fa fa-users" style='font-size:40px;color:blue'></i></span>
          </div>
        </div>
      </div>
	  <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
			  <a href="pending-clients.php">
              <h3>
                New Applicants
              </h3>
              <h1>
				<?php
				$clientx="SELECT COUNT(*) FROM tblclients WHERE Status =0";
				$resclientx=mysqli_query($connect,$clientx)or die(mysqli_error($connect));
				$rowclientx=mysqli_fetch_array($resclientx);
				$totalclientx=$rowclientx[0];
				echo htmlentities($totalclientx);
				?>		
              </h1>
			  </a>
            </div>
            <span class="icon widget-icon text-green-500"><i class="fa fa-user-times" style='font-size:40px;color:blue'></i></span>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
			  <a href="complaints.php">
              <h3>
                Complaints
              </h3>
              <h1>
                <?php
				$com="SELECT COUNT(*) FROM tblcomplaints WHERE Complaint_Status =0";
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


	  <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
			  <a href="inspections.php">
              <h3>
                Inspection Result
              </h3>
              <h1>
                <?php
				$clientad="SELECT COUNT(*) FROM inspection_schedule_for_registration_approval WHERE inspected = 0";
				$resclientad=mysqli_query($connect,$clientad)or die(mysqli_error($connect));
				$rowclientad=mysqli_fetch_array($resclientad);
				$totalclientad=$rowclientad[0];
				echo htmlentities($totalclientad);
				?>	
              </h1>
			  </a>
            </div>
            <span class="icon widget-icon text-red-500"> <i class="fa fa-exclamation-circle" style='font-size:40px;color:blue'></i></span>
          </div>
        </div>
      </div>
	  <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
			  <a href="approved-inspections.php">
              <h3>
                Approved Installation
              </h3>
              <h1>
				<?php
				$clientads="SELECT COUNT(*) FROM inspection_schedule_for_registration_approval WHERE inspection_installation =1 AND sentToPlumber = 0";
				$resclientads=mysqli_query($connect,$clientads)or die(mysqli_error($connect));
				$rowclientads=mysqli_fetch_array($resclientads);
				$totalclientads=$rowclientads[0];
				echo htmlentities($totalclientads);
				?>			
              </h1>
			  </a>
            </div>
            <span class="icon widget-icon text-red-500"><i <i class="fa fa-bell" style='font-size:40px;color:blue'></i></span>
          </div>
        </div>
      </div>
    </div>

   
    </div>
  </section>

<?php include 'includes/footer.php' ?>