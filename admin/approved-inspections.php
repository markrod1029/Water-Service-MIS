<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "inspection"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Inspections</li>
      <li style='color:black'>Approved Inspections</li>
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

<!-- count complaint 
<div class="notification blue">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
          <span class="icon"><i class="fa fa-envelope"></i></span>
          <b>New Client Installation <?php
				$clientx="SELECT COUNT(*) FROM inspection_schedule_for_registration_approval WHERE inspected =0";
				$resclientx=mysqli_query($connect,$clientx)or die(mysqli_error($connect));
				$rowclientx=mysqli_fetch_array($resclientx);
				$totalclientx=$rowclientx[0];
				echo htmlentities($totalclientx);
				?>	</b>
        </div>
        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
      </div>
    </div>


	
	
	</div>-->
	
   <div class="  bg-gray-50" >

	<table id="dataTable"  class="cell-border" >
			<thead>
			  <tr>
			
				<th>Application No.</th>
				<th>Client Name</th>
				<th>Plumber Name</th>
                <th>Tools</th>
                <th>Status</th>
                <th>Control</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php

						$qry="SELECT *,inspection_schedule_for_registration_approval.schedule_ID  AS sid FROM inspection_schedule_for_registration_approval
						LEFT JOIN tblclients ON tblclients.client_ID = inspection_schedule_for_registration_approval.client_ID 
						LEFT JOIN tblplumber ON tblplumber.plumber_ID = inspection_schedule_for_registration_approval.plumber_ID 
						WHERE inspection_schedule_for_registration_approval.inspected = 0 AND inspection_schedule_for_registration_approval.inspection_installation = 1  AND inspection_schedule_for_registration_approval.sentToPlumber = 0";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						
				?>
						<tr>
							<td data-label="#"><?php echo $row['client_ID']?></td>
							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
							<td data-label="Client Name"><?php echo $row['Fname'].' '. $row['Mname'].' '.$row['Lname']?></td>
							<td data-label="Comment"><?php echo $row['tools']?></td>
							<td data-label="Complaint_Status">
								<?php
									if( $row['inspect_visted']==1 && $row['sentToPlumber']==0)
									{
										echo
										"
											Already Inspect
										";
									}
									
									else if( $row['sentToPlumber']==1){
										

										echo
										"
											Wait For Installation
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
						
							<form method='POST' action='send-inspection-plumber.php?id=<?php echo $row['sid'];?>'>
							
							<button  name='btnsend' class='button small green --jb-modal'  data-target='sample-modal-3'  id='myButton' style='width:100px' >
								<span class='icon'>Sent to Plumber</span></button>

							
							
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
							<td colspan='8' style='text-align:center;font-weight:bold;background:white'><br><br>--NO INSPECTION--</td>
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


<?php

@$pub=$_GET['id'];
if($pub==TRUE)
{

	$sql = "UPDATE inspection_schedule_for_registration_approval SET sentToPlumber='5' WHERE  schedule_ID = '$pub'";
	if($connect->query($sql)){

		$_SESSION['success'] = 'Succesfuly Reject the Inspection';
	

		$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

		$insert = "INSERT INTO activity( name, position,  time_loged, status)
			VALUES( '$name', 'Admin',   NOW(),  ' Reject The Inspection')";
			$query = mysqli_query($connect,$insert);
		}
	
		else{
		$_SESSION['error'] = $connect->error;
		}

		echo
				"
					<script>
						window.location='inspections.php';
					</script>
				";
}






?>
