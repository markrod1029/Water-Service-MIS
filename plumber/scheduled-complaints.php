<?php 
include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "complaint"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
    <li style='color:lightblue'>Plumber</li>
      <li style='color:lightblue'>Complaints</li>
      <li style='color:darkblue'>Scheduled Complaints </li>
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
 	

    
    <div >
    
		<table>
			<thead>
			  <tr>
				<th>Complaint ID</th>
				<th>Client Name</th>
				<th>Location</th>
                <th>Complaint Category</th>
                <th>Complaint</th>
                <th>Control</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php
            $plumber_id = $user['plumber_ID'];
				$adv="SELECT * FROM inspection_schedule_for_complaints 
				LEFT JOIN tblcomplaints ON inspection_schedule_for_complaints.complaint_ID = tblcomplaints.complaint_ID
				LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID
				LEFT JOIN tbladdress ON tbladdress.address_ID =  tblclients.address_ID
				WHERE inspection_schedule_for_complaints.plumber_ID='$plumber_id' AND inspection_schedule_for_complaints.visited = '0' ";
				$resadv=mysqli_query($connect,$adv) or die(mysqli_error($connect));
				$num=mysqli_num_rows($resadv);
				if($num>0)
				{
					while($row=mysqli_fetch_assoc($resadv))
					{
				?>
						<tr>
							<td data-label="Complaint ID">
								<?php echo $row['complaint_ID'];?>
							</td>

							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
							<td data-label="Location"><?php echo $row['Barangay'].' '.$row['Municipality'].' '. $row['Province']?></td>
							<td data-label="Date"><?php echo date('F-d-Y H:i A', strtotime($row['date']))?></td>
							<td data-label="Complaint"><?php echo $row['complaint']?></td>
							<td class="actions-cell">
						
										<form method='POST' action='visited-complete.php?cmp=<?php echo $row['isc_ID'];?>'>
										<button type='submit' onclick="return confirm('Are you sure you Already Inspected This?')" name='btnsend' class='button small green --jb-modal'  data-target='sample-modal-3'  onclick='doSomething()' id='myButton' style='width:100px'>
										  <span class='icon'>Inspected</span>
										</button>	</form>
						
							</td>
						</tr>
							<?php
					}
				}else
				{
					echo
					"
						<tr>
							<td colspan='7' style='text-align:center;font-weight:bold;background:white'><br><br>--NO SCHEDULE COMPLAINTS--</td>
						</tr>
					";
				}
						?>
			  </tbody>
		</table>
	</div>
  </section>
  <br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<?php include 'includes/footer.php' ?>



<?php
// if(isset($_POST['btnsend']))
// {
// $getcmp=$_GET['cmp'];
// 	if($getcmp==True)
// 	{
		
// 		$sql = "UPDATE inspection_schedule_for_complaints SET visited='1' WHERE isc_ID='$getcmp'";
	 

// 		if($connect->query($sql)){

// 		$_SESSION['success'] = 'Complaint Fixed and Visited!';

// 		echo
// 		"
// 			<script>
// 				window.location='scheduled-complaints.php';
// 			</script>
// 		";
// 	}

// 	else{
// 		$_SESSION['error'] = $connect->error;
		
// 	}



// 	}

// } 
	   
?>