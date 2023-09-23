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
        <h1 href="#" style="color:white; font-size:16px;  " > Clerk </h1>
        
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



    <?php
				$clientx="SELECT COUNT(*) FROM messages WHERE  message_status = '1' ";
				$resclientx=mysqli_query($connect,$clientx)or die(mysqli_error($connect));
				$rowclientx=mysqli_fetch_array($resclientx);
				$totalclientx=$rowclientx[0];
				
				?>	

          
    <ul class="menu-list">
      
    <li class="<?php if($page=='chat'){ echo 'active'; }?> ">

         <a class="dropdown">
           <span class="icon"><i class="fab fa-facebook-messenger"></i></span>
           <span class="menu-item-label">Client Concern <div class=" circle1 "> <span class="circle__content"></span> </span></div></span>
           
           <span class="icon"><i class="fa fa-angle-right arrow"></i></span>
         </a>
     <ul>
     <li>
             <a href="message.php">
               &ensp;&ensp;&ensp;&ensp;<i class="fa fa-file"></i>&ensp;<span>Message
               <div class=" circle "> <span class="circle__content"><?php echo htmlentities($totalclientx);?></span> </span></div>
                
               </span>
             </a>
           </li>
           <li>
           
         
          
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

.circle {
  display: inline-table;
  vertical-align: middle;
  width: 20px;
  height: 20px;
  color:#ffff;
  background-color: #DC2626;
  border-radius: 50%;
}

.circle1 {
  display: inline-table;
  vertical-align: middle;
  width: 10px;
  height: 10px;
  color:#ffff;
  background-color: #DC2626;
  border-radius: 50%;
}

.circle__content {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
}
  </style>