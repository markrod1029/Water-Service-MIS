<?php 
error_reporting(0);
include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "billing"; include 'includes/leftbar.php' ?>

<section class="is-title-bar">
 
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
	  
	  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>SOA</li>
      <li style='color:black'> Add Customer SOA</li>
    </ul>

  </div>
  </section>

  <section class="users">
  <header>
    <div class="content">
      
  </header>
  <div class="search">
    <span class="text">Select an User to start SOA</span>
    <input type="text" placeholder="Enter Name or Meter No to search...">
    <button><i class="fas fa-search"></i></button>
  </div>
  <div class="users-list">

  </div>
  <script src="javascript/autocomplete.js"></script>



    </div>

  </section>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


<br><br><br><br><br><br><br><br><br><br>


<?php include 'includes/footer.php' ?>


<style>
		
		.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #ADD8E6;
  border-right: none;
  padding: 5px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00008B;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #ADD8E6;
  background: #ADD8E6;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/

			</style>
