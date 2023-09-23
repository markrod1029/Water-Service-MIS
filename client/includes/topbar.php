 
<div id="app">
 <nav id="navbar-main" class="navbar is-fixed-top">
  <div class="navbar-brand">
    <a class="navbar-item mobile-aside-button">
      <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-brand is-right">
    <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
      <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-menu" id="navbar-menu" >
    <div class="navbar-end">
      <!--<div class="navbar-item dropdown has-divider">
        <a class="navbar-link">
          <span class="icon"><i class="mdi mdi-menu"></i></span>
          <span>Sample Menu</span>
          <span class="icon">
            <i class="mdi mdi-chevron-down"></i>
          </span>
        </a>
        <div class="navbar-dropdown">
          <a href="profile.html" class="navbar-item">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            <span>My Profile</span>
          </a>
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-settings"></i></span>
            <span>Settings</span>
          </a>
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-email"></i></span>
            <span>Messages</span>
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Log Out</span>
          </a>
        </div>-->
        <?php
           $id = $user['client_ID'];
           $sql = "SELECT DISTINCT outgoing_msg_id FROM messages WHERE message_status = '1'  AND  incoming_msg_id = '$id' ";
           $query = $connect->query($sql);
           $result1 = $query->num_rows;

           ?>


<?php

$sql1= "SELECT * FROM tblplumber WHERE position = 'clerk' ORDER BY plumber_ID ";
$query1 = mysqli_query($connect, $sql1);
    while($row1 = mysqli_fetch_assoc($query1)){
           
?>
        <a href ="chat.php?client=<?php echo $row1['plumber_ID']?>"class="navbar-item" style="color:#00008B;">
            <span class="icon"><i class="fa fa-comments"></i></span> <div class=" circle "> <span class="circle__content"><?php echo $result1 ?></span> </span></div>
          </a>

        <?php
    }
    ?>
        </div>
      </div>
	   
	 
     
    </div>
  </div>  
</nav> 

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

.circle__content {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
}

        .custom-cls {
            display: inline;
            width: 200px;
            margin-left: 25px;
                border: 1px solid #aaa;
    border-radius: 3px;
    padding: 5px;
    background-color: transparent;
        }

    </style>