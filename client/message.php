<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "chat"; include 'includes/leftbar.php' ?>
<!-- <section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:lightblue'>Plumbers</li>
      <li style='color:lightblue'>Profile</li>
      <li style='color:darkblue'>Update Profile</li>
    </ul>
    
  </div>
</section> -->


<section class="section main-section">
    
<?php
        if(isset($_SESSION['error'])){
          echo "
		  <div class='notification red'>
		  <div class='flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0'>
			<div>
			  <span class='icon'><i class='fa fa-warning'></i></span>

              ".$_SESSION['error']."
			  </div>
			  <button type='button' class='button small textual --jb-notification-dismiss'>Dismiss</button>
			</div>
		  </div>
          ";
          unset($_SESSION['error']);
        }

        if(isset($_SESSION['success'])){
          echo "
		  <div class='notification green'>
		  <div class='flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0'>
			<div>
			  <span class='icon'><i class='fa fa-check'></i></span>

              ".$_SESSION['success']."
			  </div>
			  <button type='button' class='button small textual --jb-notification-dismiss'>Dismiss</button>
			</div>
		  </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
 	
     <div class="content-wrapper wrapper">




<section class="users">
  <header>
    <div class="content">
      
      <img  src="../upload/ClientPicture/<?php echo $user['picture']; ?>" alt="">
      <div class="details">
          <span><?php echo $user['client_fname'].' '.$user['client_mname'].' '.$user['client_lname'];?></span>
        <p><?php echo $user['chat_status']; ?></p>
      </div>
    </div>
  </header>
  <div class="search">
    <span class="text">Select an User to start chat</span>
    <input type="text" placeholder="Enter name to search...">
    <button><i class="fas fa-search"></i></button>
  </div>
  <div class="users-list">

  </div>
</section>
</div>
</div>


  </section>

  <script src="javascript/users.js"></script>

<?php include 'includes/footer.php' ?>



