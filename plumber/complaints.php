<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "complaint"; include 'includes/leftbar.php' ?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
    <li style='color:lightblue'>Plumber</li>
      <li style='color:lightblue'>Complaints</li>
      <li style='color:darkblue'>Set Schedule Complaints</li>
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
                <th>Date</th>
                <th>Complaint</th>
                <th>Status</th>
                <th>Control</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php

$adv="SELECT * FROM tblcomplaints WHERE Status='0' and sentToPlumber='1' and scheduled='0' and visited='0'";

                        $id = $user['plumber_ID'];
						$qry="SELECT *,tblcomplaints.complaint_ID AS comid FROM tblcomplaints
						LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID
                         WHERE  tblcomplaints.Complaint_Status='0' AND  tblcomplaints.plumber_ID='$id' AND tblcomplaints.scheduled='0'  ";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						
				?>
						<tr>
							<td data-label="#"><?php echo $row['meter_no']?></td>
							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
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
						
							<form method='POST' action='setschedule.php?cmp=<?php echo $row['comid'];?>'>
										<button  name='btnsend' class='button small green --jb-modal'  data-target='sample-modal-3'  id='myButton' style='width:100px' >
										  <span class='icon'>Set Schedule</span></button>
										</button>
                                        <a class='button small green --jb-modal'  data-target='sample-modal-2' type='button' >
										  <span class='icon'><i class='mdi mdi-eye'></i></a>

                                    </form>
									
									
							
							
								
							</td>
						</tr>
							<?php
					}
				}else
				{
					echo
					"
						<tr>
							<td colspan='7' style='text-align:center;font-weight:bold;background:white'><br><br>--NO COMPLAINTS--</td>
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
