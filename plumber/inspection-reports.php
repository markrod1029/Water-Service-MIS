<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $inspection = "client"; include 'includes/leftbar.php' ?>




<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:lightblue'>Plumber</li>
      <li style='color:lightblue'>Inspections</li>
      <li style='color:darkblue'>Reject Inspections</li>
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
 	
	

    <div class="card has-table" style='color:blue'>
		<table>
			<thead>
			<tr>
			<th>Meter No.</th>
			<th>Client Name</th>
			<th>Date Installation</th>
			<th>Tools</th>
			<th>Comment</th>
			<th>Status Inspected</th>
		  </tr>
			  </thead>
			  <tbody>
					<?php

					$qry="SELECT *,inspection_schedule_for_registration_approval.schedule_ID  AS sid FROM inspection_schedule_for_registration_approval
					LEFT JOIN tblclients ON tblclients.client_ID = inspection_schedule_for_registration_approval.client_ID 
					LEFT JOIN tblplumber ON tblplumber.plumber_ID = inspection_schedule_for_registration_approval.plumber_ID 
					WHERE inspection_schedule_for_registration_approval.inspected =1 AND  inspection_schedule_for_registration_approval.inspection_installation =1";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						
				?>
					
						<tr>

						<td data-label="#"><?php echo $row['meter_no']?></td>
							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
							<td data-label="Date"><?php echo $row['date_install']?></td>
							<td data-label="Tools"><?php echo $row['tools']?></td>
							<td data-label="Comment"><?php echo $row['comment']?></td>
							<td data-label="Complaint_Status">
								<?php
									if( $row['inspected']==1)
									{
										echo
										"
											Done
										";
									}else
									{
										echo
										"
											Pending...
										";
									}
								?>
						</tr>
						
									
						<?php }
					}
					else{
					?>
						<tr>
							<td colspan='7' style='text-align:center;font-weight:bold;background:white'><br><br>--NO CLIENTS APPROVE--</td>
						</tr>
					<?php }?>
						
					
								
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

