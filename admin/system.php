<?php include 'includes/session.php';?>

<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "system"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
    <li style='color:black'>Admin</li>
        <li style='color:black'>About Us</li>
        <li style='color:black'> Mange About List</li>
    </ul>

  </div>
  </section>

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
 	


    <form method="POST">
	

     <div class="  bg-gray-50" >

	<table id="dataTable"  class="cell-border" >
			<thead>
			  <tr>
			  
                <th>About Us</th>
                <th>Contact</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Location</th>
                <th>Tag Line</th>
                <th>Control</th>
			  </tr>
			  </thead>
			  <tbody>

			  <?php 

				$qry="SELECT * FROM system";
				$query = $connect->query($qry);
				while($row = $query->fetch_assoc()){
					?>
				
					
						<tr>
						<td data-label="About Us"><?php echo $row['about']; ?></td>
						<td data-label="House_No"><?php echo $row['contact']?></td>
						<td data-label="Location"><?php echo $row['telophone']?></td>
					
						<td data-label="Email"><?php echo $row['email']?></td>
						<td data-label="Contact No."><?php echo $row['location']?></td>
						<td data-label="Contact No."><?php echo $row['line']?></td>
						
						<td class="actions-cell">
						<div class='buttons right nowrap'>
							
							<a type='button' href="edit-system.php?id=<?php echo $row['system_ID'];?>"  class='button small green --jb-modal'  data-target='sample-modal-3' type='button'>
							  <span class='icon'><i class='fa fa-edit'></i></span>
							</a>


							
						  </div>
						  
						</td>
						</tr>
						<?php }?>
			  </tbody>
		</table>
            </form>
    </div>
  </section>
  <br>
<br>
<br>
<br>
<br>

<?php include 'includes/footer.php' ?>
