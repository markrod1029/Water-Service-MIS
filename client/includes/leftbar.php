<aside class="aside is-placed-left is-expanded" style="background:#3E92CC ;overflow-y:auto;">
  <div class="aside-tools">

    <div>
      UWS - <b class="font-black">MIS</b>
    </div>
  
  </div>

  <center>
      
        <div class="image">
          <img src="../upload/ClientPicture/<?php echo $user['picture']; ?>" class="img-circle elevation-2 d-flex " style="height:80px; width:90px; margin-top:10px;  border-radius: 50%;" >
        </div>

      <div class="info" >
          <h1 href="#" style="color:white; font-size:18px;  " > <?php echo $user['client_fname'].' '.$user['client_mname'].' '.$user['client_lname']; ?></h1>
          
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
      <li class="<?php if($page=='billing'){ echo 'active'; }?> ">
        <a href="billing.php">
          <span class="icon"><i class="fa fa-book"></i></span>
          <span class="menu-item-label">Statement of Account</span>
        </a>
      </li>
    </ul>


    

    
    <ul class="menu-list">
    
    
    <li class="<?php if($page=='complaint'){ echo 'active'; }?> ">

        <a class="dropdown">
          <span class="icon"><i class="fa fa-comments"></i></span>
          <span class="menu-item-label">Complaint</span>
          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
		    <ul>
     
            <a href="complaints.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-comments"></i>&ensp;<span> Complaints </span>
            </a>
          </li>
          <li>
            <a href="status-complaints.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-book"></i>&ensp;<span>Status Complaints</span>
            </a>
          </li>

         
        </ul>
      </li>
	     <li>
    </ul>
    




    
    <ul class="menu-list">
      <li class="<?php if($page=='profile'){ echo 'active'; }?> ">

        <a href="profile.php">
          <span class="icon"><i class="fa fa-user"></i></span>
          <span class="menu-item-label">Profile</span>
        </a>
      </li>
    </ul>
    


    



    <!-- <ul class="menu-list">
    
    
    <li class="<?php if($page=='report'){ echo 'active'; }?> ">

        <a class="dropdown">
          <span class="icon"><i class="fa fa-file"></i></span>
          <span class="menu-item-label">Reports</span>
          <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
        </a>
		    <ul>
     
            <a href="complaint-reports.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-comments"></i>&ensp;<span> Complaints reports</span>
            </a>
          </li>
          <li>
            <a href="soa-reports.php">
              &ensp;&ensp;&ensp;&ensp;<i class="fa fa-book"></i>&ensp;<span>SOA</span>
            </a>
          </li>

         
        </ul>
      </li>
	     <li>
    </ul>
     -->


    
    <ul class="menu-list ">
      <li >
        <a href="php/logout.php?client=<?php echo $user['client_ID']; ?>">
          <span class="icon"><i class="fa fa-power-off"></i></span>
          <span class="menu-item-label">Log Out</span>
        </a>
      </li>
    </ul>
 

     

  </div>
</aside>

<style>


  </style>