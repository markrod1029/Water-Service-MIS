<aside class="aside is-placed-left is-expanded" style="background:#3387bf ;overflow-y:auto;">
  <div class="aside-tools">

    <div>
      UWS - <b class="font-black">MIS</b>
    </div>
  
  </div>

  
  <center>
      
      <div class="image">
        <img src="../images/logo.png" class="img-circle elevation-2 d-flex " style="height:80px; width:90px; margin-top:10px;  border-radius: 50%;" >
      </div>

    <div class="info" >
        <h1 href="#" style="color:white; font-size:18px;  " > Admin </h1>
        
      </div>
      </center>


  <div class="menu is-menu-main">
    <p class="menu-label"></p>
    <ul class="menu-list">
      <li class="<?php if($page=='dashboard'){ echo 'active'; }?> ">
        <a href="home.php">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
    </ul>

    <?php
           $sql = "SELECT * FROM tblclients WHERE Status = '0' ";
           $query = $connect->query($sql);
           $student = $query->num_rows;

           ?>


<?php
           $sql = "SELECT * FROM tblcomplaints WHERE Complaint_Status = '0' ";
           $query = $connect->query($sql);
           $complaint = $query->num_rows;

           ?>

<ul class="menu-list">

      
      <li class="<?php if($page=='complaint'){ echo 'active'; }?> ">
        <a class="dropdown">
          <span class="icon"><i class="fa fa-comments"></i></span>
          <span class="menu-item-label">Complaints
          </span>
          <div class=" circle1 "> <span class="circle__content"></span> </span></div>

          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
		<ul>
          <li>
            <a href="complaints.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-edit"></i>&ensp;<span>Manage Complaints
              <div class=" circle "> <span class="circle__content"><?php echo $complaint ?></span> </span></div>

              </span>
            </a>
          </li>
         
         
         

        </ul>
      </li>



    
      
      <?php
           $sql = "SELECT * FROM inspection_schedule_for_registration_approval WHERE inspect_visted = '1' AND inspected = '0' AND inspection_installation = '0'  ";
           $query = $connect->query($sql);
           $inspect = $query->num_rows;

           $sql = "SELECT * FROM inspection_schedule_for_registration_approval WHERE inspection_installation = '1' AND inspected = '0' AND sentToPlumber = 0 ";
           $query = $connect->query($sql);
           $install = $query->num_rows;
           ?>


      <li class="<?php if($page=='inspection'){ echo 'active'; }?> ">
        <a class="dropdown">
          <span class="icon"><i class="	fa fa-wrench"></i></span>
          <span class="menu-item-label">Inspection</span>
          <div class=" circle1 "> <span class="circle__content"></span> </span></div>
          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
		<ul>
          <li>
            <a href="inspections.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-folder"></i>&ensp;<span>Inspection Result
              <div class=" circle "> <span class="circle__content"><?php echo $inspect ?></span> </span></div>


              </span>
            </a>
          </li>
          <li>
            <a href="approved-inspections.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-folder"></i>&ensp;<span>Approved Inspection
              <div class=" circle "> <span class="circle__content"><?php echo $install ?></span> </span></div>


              </span>
            </a>
          </li>

 
   
        </ul>
      </li>
      


      <li class="<?php if($page=='billing'){ echo 'active'; }?> ">
        <a class="dropdown">
          <span class="icon"><i class="fa fa-book"></i></span>
          <span class="menu-item-label">Statement of Account</span>
          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
		<ul>
    <li>
            <a href="search.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-plus"></i>&ensp;<span>Create SOA</span>
            </a>
          </li>


    <li>
            <a href="datebilled.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fas fa-calendar-alt"></i>&ensp;<span>Date Billed</span>
            </a>
          </li>

        
       

          <li>
            <a href="billing.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-ship"></i>&ensp;<span>Manage SOA</span>
            </a>
          </li>


          <li>
            <a href="billing-paid.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-ship"></i>&ensp;<span>Manage SOA Paid</span>
            </a>
          </li>
        </ul>
      </li>

</ul>





    <p class="menu-label">MASTER LIST</p>
    <ul class="menu-list">
      <li class="<?php if($page=='client'){ echo 'active'; }?> ">
        <a class="dropdown">
          <span class="icon"><i class="fa fa-users"></i></span>
          <span class="menu-item-label">Clients
          </span>
          <div class=" circle1 "> <span class="circle__content"></span> </span></div>

          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
        <ul>



          <li>
            <a href="pending-clients.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-user"></i>&ensp;<span>New Applicant 

              <div class=" circle "> <span class="circle__content"><?php echo $student ?></span> </span></div>
              </span>
            </a>
          </li>

          <li>
            <a href="clients.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-users"></i>&ensp;<span>Client List</span>
            </a>
          </li>

                  <!-- <li>
            <a href="active-clients.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-user"></i>&ensp;<span>Approval Clients</span>
            </a>
          </li> -->
         
        </ul>
      </li>
      <li class="<?php if($page=='plumber'){ echo 'active'; }?> ">

        <a class="dropdown">
          <span class="icon"><i class="fa fa-user"></i></span>
          <span class="menu-item-label">Plumbers</span>
          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
		<ul>
        
         

          <li>
            <a href="plumber.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fas fa-user-cog"></i>&ensp;<span>Plumber List</span>
            </a>
          </li>

          <li>
            <a href="clerk.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fas fa-user-cog"></i>&ensp;<span>Clerk List</span>
            </a>
          </li>

        </ul>
      </li>
	  
	       

      <li class="<?php if($page=='location'){ echo 'active'; }?> ">
        <a class="dropdown">
          <span class="icon"><i class="fa fa-map-marker"></i></span>
          <span class="menu-item-label">Locations</span>
          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
 		    <ul>
         
          <li>
            <a href="locations.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-list"></i>&ensp;<span>List of Locations</span>
            </a>
          </li>
        </ul>
      </li>


      

      <p class="menu-label">SYSTEM</p>

      <li class="<?php if($page=='system'){ echo 'active'; }?> ">
        <a class="dropdown">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">System</span>
          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
		<ul>
          <li>
            <a href="system.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-edit"></i>&ensp;<span> About Us</span>
            </a>
          </li>
          
               <li>
            <a href="about-picture.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-edit"></i>&ensp;<span>Gallery</span>
            </a>
          </li>
          
          <li>
            <a href="complaint-category.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-edit"></i>&ensp;<span>Complaint Category</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="<?php if($page=='advisory'){ echo 'active'; }?> ">
        <a class="dropdown">
          <span class="icon"><i class="fa fa-exclamation-circle"></i></span>
          <span class="menu-item-label">Advisory</span>
          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
		<ul>
       
		  <li>
            <a href="public-advisory.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-bell"></i>&ensp;<span>Manage Advisory</span>
            </a>
          </li>
        </ul>
      </li>

      <p class="menu-label">REPORTS</p>

    


    <li class="<?php if($page=='report'){ echo 'active'; }?> ">

        <a class="dropdown">
          <span class="icon"><i class="fa fa-file"></i></span>
          <span class="menu-item-label">Reports</span>
          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
		    <ul>

        <li>
            <a href="inspection-reports.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-wrench"></i>&ensp;<span>Inspections and Installations</span>
            </a>
          </li>

     
            <a href="complaint-reports.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-folder-open"></i>&ensp;<span> Complaints </span>
            </a>
          </li>

          <li>
            <a href="advisory-reports.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-folder-open"></i>&ensp;<span>Advisory </span>
            </a>
          </li>

          <li>
            <a href="activity-log.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-gear"></i>&ensp;<span>Activity Log</span>
            </a>
          </li>
        </ul>
      </li>
	     <li>
    </ul>
    
    

   



    
    <ul class="menu-list " style ="color:blue;">
      <li>
      <a href="php/logout.php?admin=<?php echo $user['admin_ID']; ?>">
          <span class="icon"><i class="fa fa-power-off"></i></span>
          <span class="menu-item-label">Log Out</span>
        </a>
      </li>
    </ul>
 

     

  </div>
</aside>

<style>


  </style>