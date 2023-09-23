<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "complaint"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Complaints</li>
      <li style='color:black'>Manage Complaints</li>
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

<!-- count complaint -->
<div class="notification blue">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
          <span class="icon"><i class="fa fa-envelope"></i></span>
          <b>New Complaint <?php
				$clientx="SELECT COUNT(*) FROM tblcomplaints WHERE sentToPlumber =0";
				$resclientx=mysqli_query($connect,$clientx)or die(mysqli_error($connect));
				$rowclientx=mysqli_fetch_array($resclientx);
				$totalclientx=$rowclientx[0];
				echo htmlentities($totalclientx);
				?>	</b>
        </div>
        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
      </div>
    </div>


	
	
	</div>
	<div id='em' >
	
    <div class="card has-table" style='color:blue'>
		<table>
			<thead>
			  <tr>
			
				<th>Meter No.</th>
				<th>Client Name</th>
				<th>Plumber Name</th>
                <th>Date</th>
                <th>Complaint</th>
                <th>Status</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php

						$qry="SELECT *,inspection_schedule_for_complaints.isc_ID AS isid FROM inspection_schedule_for_complaints
						LEFT JOIN tblcomplaints ON inspection_schedule_for_complaints.complaint_ID = tblcomplaints.complaint_ID
						LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID
						LEFT JOIN tblplumber ON tblplumber.plumber_ID = inspection_schedule_for_complaints.plumber_ID 
						WHERE  inspection_schedule_for_complaints.visited='0' ";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						
				?>
						<tr>
							<td data-label="#"><?php echo $row['meter_no']?></td>
							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
							<td data-label="Plumber Name"><?php echo $row['Fname'].' '. $row['Mname'].' '.$row['Lname']?></td>
							<td data-label="Date"><?php echo $row['Date']?></td>
							<td data-label="Complaint"><?php echo $row['complaint']?></td>
							<td data-label="Complaint_Status">
								<?php
									if( $row['Complaint_Status']==1)
									{
										echo
										"
											Accepted
										";
									}else
									{
										echo
										"
											Pending...
										";
									}
								?>
							</td>
							<td class="actions-cell">
						
                          
							
								
							</td>
						</tr>
							<?php
					}
				}else
				{
					echo
					"
						<tr>
							<td colspan='7' style='text-align:center;font-weight:bold;background:white'><br><br>--NO ACCEPT COMPLAINTS--</td>
						</tr>
					";
				}
						?>
			  </tbody>
		</table>
	</div>
	</div>


    </div>

  </section>


<?php include 'includes/footer.php' ?>

