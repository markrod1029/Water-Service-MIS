<aside class="aside is-placed-left is-expanded" style="background:#3E92CC ;overflow-y:auto;">
  <div class="aside-tools">

    <div>
      UWS - <b class="font-black">MIS</b>
    </div>
  
  </div>

  <center>
      
      <div class="image">
        <img src="../upload/plumber/<?php echo $user['images']; ?>" class="img-circle elevation-2 d-flex " style="height:80px; width:90px; margin-top:10px;  border-radius: 50%;" >
      </div>

    <div class="info" >
        <h1 href="#" style="color:white; font-size:18px;  " > <?php echo $user['Fname'].' '.$user['Mname'].' '.$user['Lname']?> </h1>
        <h1 href="#" style="color:white; font-size:16px;  " > Plumber </h1>
        
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
    <p class="menu-label">Appearance</p>

    <ul class="menu-list">
    <li class="<?php if($page=='profile'){ echo 'active'; }?> ">

        <a href="profile.php">
          <span class="icon"><i class="fa fa-user"></i></span>
          <span class="menu-item-label">Profile</span>
        </a>
      </li>
    </ul>




    
    <ul class="menu-list">
      
    <li class="<?php if($page=='complaint'){ echo 'active'; }?> ">

        <a class="dropdown ">
          <span class="icon"><i class="fa fa-comments"></i></span>
          <span class="menu-item-label">Complaints</span>
          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
		<ul>
  
          <!-- <li>
            <a href="complaints.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-folder"></i>&ensp;<span>Manage Complaints</span>
            </a>
          </li> -->

          <li>
            <a href="scheduled-complaints.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-folder"></i>&ensp;<span> Scheduled  Complaints</span>
            </a>
          </li>
        </ul>
      </li>
    


          
    <ul class="menu-list">
      
    <li class="<?php if($page=='inspection'){ echo 'active'; }?> ">

         <a class="dropdown">
           <span class="icon"><i class="fa fa-wrench"></i></span>
           <span class="menu-item-label">Inspection</span>
           <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
         </a>
     <ul>
     <li>
             <a href="inspections.php">
               &ensp;&ensp;&ensp;&ensp;<i class="fa fa-file"></i>&ensp;<span>Scheduled Inspection</span>
             </a>
           </li>
           <li>
             <!-- <a href="schedule_inspections.php">
               &ensp;&ensp;&ensp;&ensp;<i class="fa fa-file"></i>&ensp;<span>Scheduled Inspection</span>
             </a>
           </li> -->
           <!-- <li>
             <a href="inspections.php">
               &ensp;&ensp;&ensp;&ensp;<i class="fa fa-file"></i>&ensp;<span>Manage Installation</span>
             </a>
           </li> -->
           <li>
             <a href="inspections_installation.php">
               &ensp;&ensp;&ensp;&ensp;<i class="fa fa-file"></i>&ensp;<span>Scheduled Installation</span>
             </a>
           </li>
          
         </ul>
       </li>
    



         
    
     <!--
    
      <li>
        <a class="dropdown">
          <span class="icon"><i class="fa fa-file"></i></span>
          <span class="menu-item-label">Reports</span>
          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
		    <ul>
     
            <a href="complaint-reports.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-folder-open"></i>&ensp;<span> Complaints reports</span>
            </a>
            <a href="inspection-reports.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-folder-open"></i>&ensp;<span> Inspection and Installation reports</span>
           
            </a>
          </li>
         
        </ul>
      </li>
	     <li>
    </ul>
-->



    
    <ul class="menu-list " style ="color:blue;">
      <li class=" bg-white">
      <a href="php/logout.php?plumber=<?php echo $user['plumber_ID']; ?>">
          <span class="icon"><i class="fa fa-power-off"></i></span>
          <span class="menu-item-label">Log Out</span>
        </a>
      </li>
    </ul>
 

     

  </div>
</aside>

<style>


  </style>