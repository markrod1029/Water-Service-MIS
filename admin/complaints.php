<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "complaint"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:lightblue'>Admin</li>
      <li style='color:lightblue'>Complaints</li>
      <li style='color:darkblue'>Manage Complaints</li>
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
    </div>-->


	<div class="notification blue" style='background:lightblue'>
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
		<table>
			<tr>
				<a href='#' ONCLICK="employee()" class="seatButton" id="c1" name="c1" style='color:blue'><b >All</b></a>&ensp;&ensp;|&ensp;&ensp;
			</tr>
			<tr>
				 <a href='#' ONCLICK="employee2()" class="seatButton" id="c2" style='color:blue'><b>Unsend to Plumber</b></a>&ensp;&ensp;|&ensp;&ensp;
			</tr>
			<tr>
				 <a href='#' ONCLICK="employee3()" class="seatButton" id="c3" style='color:blue'><b>Sent to Plumber</b></a>
			</tr>
		</table><br>
        </div>
      </div>
    </div>
		
	</div>
	<div id='em' >
	
    <div class="  bg-gray-50" >

	<table id="dataTable"  class="cell-border" >
			<thead>
			  <tr>
			
				<th>Meter No.</th>
				<th>Client Name</th>
				<th>Complaint Category</th>
                <th>Complaint</th>
                <th>Complaint</th>
			  </tr>	
			  </thead>
			  <tbody>
				
			<?php

						$qry="SELECT *,tblcomplaints.complaint_ID AS comid FROM tblcomplaints
						LEFT JOIN complaint_category ON complaint_category.category_ID = tblcomplaints.they_complaint 
						LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID 
						LEFT JOIN tbladdress ON tbladdress.address_ID = tblclients.address_ID 
						WHERE  tblcomplaints.Complaint_Status='0' AND  tblcomplaints.sentToPlumber!='5' ";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						if( $row['sentToPlumber']==0)
						{
							$sent = 'Sent to Plumber';
							$action = '';
						}else
						{
							$sent = 'Already Sent';
							$action = 'disabled';


						}
						
				?>
						<tr>
							<td data-label="#"><?php echo $row['meter_no']?></td>
							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
							<td data-label="Complaint"><?php echo $row['category']?></td>
							<td data-label="Complaint"><?php echo $row['complaint']?></td>

						
					

							<td class="actions-cell">
						
									<form method='POST' action='send-plumber.php?id=<?php echo $row['comid'];?>'>
									<button class='button small blue' onclick=window.location.href="complaint-info.php?id=<?php echo $row['complaint_ID'];?>"   type='button' name="print" >
								  <span class='icon'><i class='mdi mdi-eye'></i></span>
								</button>

											<button  name='btnsend' class='button small green --jb-modal'  data-target='sample-modal-3'  id='myButton' style='width:100px' <?php echo $action?>>
										  <span class='icon'><?php echo $sent?></span></button>


										
										  <!-- <a type='button' name='cancel'  href='complaints.php?id=<?php echo $row['complaint_ID'];?>'  onclick="return confirm('Are you sure you want to Reject this Complaint?')"  class='button small red --jb-modal' data-target='sample-modal' type='button'>
										<span class='icon'><i class='mdi mdi-trash-can'></i></span>
										</a> -->

										</form>

										<form method='POST' action='CRUD/send-clerk.php'>
							<input type="hidden" name="meter" value="<?php echo $row['meter_no']?>" id="">
							<input type="hidden" name="complaint" value="<?php echo $row['complaint']?>" id="">
							<input type="hidden" name="id" value="<?php echo $user['admin_ID']?>" id="">
							<input type="hidden" name="name" value="<?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?>" id="">
 							<input type='hidden' name="complaint_ID" value="<?php echo $row['complaint_ID']?>" >
							
							
							<button  name='btnsend' onclick="return confirm('Are you sure you want to Send to Clerk this Complaint?')"  class='button small green --jb-modal'  data-target='sample-modal-3'  id='myButton' style='width:100px' >
										<span class='icon'>Send To Clerk</span></button>
								
										</form>
						

					
							
							
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
	</div>










	<div id='em2' style='display:none'>
	
    <div class="  bg-gray-50" >

	<table id="dataTable1"  class="cell-border" >
			<thead>
			  <tr>
			
				<th>Meter No.</th>
				<th>Client Name</th>
                <th>Date</th>
                <th>Category</th>
                <th>Complaint</th>
                <th>Status</th>
                <th>Control</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php

						$qry="SELECT *,tblcomplaints.complaint_ID AS comid FROM tblcomplaints
						LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID WHERE  tblcomplaints.sentToPlumber='0' AND tblcomplaints.Complaint_Status='0'";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						if( $row['sentToPlumber']==0)
						{
							$sent = 'Sent to Plumber';
							$action = '';
						}else
						{
							$sent = 'Already Sent';
							$action = 'disabled';


						}
						
				?>
						<tr>
							<td data-label="#"><?php echo $row['meter_no']?></td>
							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
							<td data-label="Date"><?php echo $row['Date']?></td>
							<td data-label="Category"><?php echo $row['they_complaint']?></td>
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
						
							<form method='POST' action='send-plumber.php?id=<?php echo $row['comid'];?>'>
										<button  name='btnsend' class='button small green --jb-modal'  data-target='sample-modal-3'  id='myButton' style='width:100px' <?php echo $action?>>
										  <span class='icon'><?php echo $sent?></span></button>
							
								<a type='button' name='cancel'  href='complaints.php?id=<?php echo $row['scomidid'];?>'  onclick="return confirm('Are you sure you want to Reject this Complaint?')"  class='button small red --jb-modal' data-target='sample-modal' type='button'>
										<span class='icon'><i class='mdi mdi-trash-can'></i></span>
							</a>
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
	</div>










		<div id='em3' style='display:none'>
		
  <div class="  bg-gray-50" >

	<table id="dataTable3"  class="cell-border" >
			<thead>
			  <tr>
			
				<th>Meter No.</th>
				<th>Client Name</th>
                <th>Date</th>
                <th>Category</th>
                <th>Complaint</th>
                <th>Status</th>
                <th>Control</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php

						$qry="SELECT *,tblcomplaints.complaint_ID AS comid FROM tblcomplaints
						LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID WHERE  tblcomplaints.sentToPlumber='1' AND tblcomplaints.Complaint_Status='0'";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						if( $row['sentToPlumber']==0)
						{
							$sent = 'Sent to Plumber';
							$action = '';
						}else
						{
							$sent = 'Already Sent';
							$action = 'disabled';


						}
						
				?>
						<tr>
							<td data-label="#"><?php echo $row['meter_no']?></td>
							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
							<td data-label="Date"><?php echo $row['Date']?></td>
							<td data-label="Category"><?php echo $row['they_complaint']?></td>
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
						
							<form method='POST' action='send-plumber.php?id=<?php echo $row['comid'];?>'>
											<button  name='btnsend' class='button small green --jb-modal'  data-target='sample-modal-3'  id='myButton' style='width:100px' <?php echo $action?>>
										  <span class='icon'><?php echo $sent?></span></button>
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
	</div>
    </div>

  </section>


<?php include 'includes/footer.php' ?>


<?php

@$pub=$_GET['id'];
if($pub==TRUE)
{

	$sql = "UPDATE tblcomplaints SET sentToPlumber='5' WHERE  complaint_ID = '$pub'";
	if($connect->query($sql)){


		$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

		$insert = "INSERT INTO activity( name, position,  time_loged, status)
			VALUES( '$name', 'Admin',   NOW(),  ' Reject The Complaint')";
			$query = mysqli_query($connect,$insert);


		$_SESSION['success'] = 'Succesfuly Reject the Inspection';
	
		}
	
		else{
		$_SESSION['error'] = $connect->error;
		}

		echo
				"
					<script>
						window.location='complaints.php';
					</script>
				";
}






?>