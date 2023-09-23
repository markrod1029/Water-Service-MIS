<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "complaint"; include 'includes/leftbar.php' ?>


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
	  
<div class="card has-table" >

<center>
				<br>
				<div>
				<table width='100%' border='2' style="border-collapse:collapse;text-align:center;color:blue">
			  <tr>
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()"><br>URBIZTONDO WATER SERVICES (Set a Plumber)</td>
			  </tr>
			 
				
					
									
					  <table>
					  <form method="POST" action="CRUD/send-complaint.php">
										<?php

					$id = $_GET['id'];	
					$qry="SELECT *,tblcomplaints.complaint_ID AS comid FROM tblcomplaints
						LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID
						LEFT JOIN tbladdress ON tbladdress.address_ID = tblclients.address_ID  WHERE  tblcomplaints.complaint_ID='$id'";
						$query = $connect->query($qry);
					while($rw=mysqli_fetch_assoc($query))
					{
					
					?>
							<tr>
								<th>Meter No.</th>
								<td style='background:white'>
								<input type='text' name="c" value="<?php echo $rw['meter_no']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly>
								<!--<input type='text' name="complaint_ID" value="<?php echo $id?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly>
								<input type='text' name="client_ID" value="<?php echo $rw['client_ID']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly>
					--></td>
							</tr>
							<tr>
								<th>Client Name</th>
								<td style='background:white'><input type='text' name="name" value="<?php echo $rw['client_fname'].' '.$rw['client_mname'].' '.$rw['client_lname']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
							</tr>
							<tr>
								<th>Address</th>
								<td style='background:white'><input type='text' name="address" value="<?php echo $rw['House_No'].'. '. $rw['Barangay'].' '.$rw['Municipality'].' '. $rw['Province']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
							</tr>
							<tr>
								<th>Assign Plumber</th>
								<td style='background:white'>
								
								<select name="plumber" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
								<?php
								date_default_timezone_set('Asia/Manila');

									$date = new DateTime();
									$date->setTimeZone(new DateTimeZone('Asia/Manila'));
									$dateTimeString = $date->format('Y-m-d H:i:A');

								 $dateTimeString;


								$plum = mysqli_query($connect, "SELECT DISTINCT tblplumber.plumber_ID, tblplumber.Fname, tblplumber.Lname, tblcomplaints.Complaint_Status, tblcomplaints.avail_status,  tblcomplaints.complaint_ID
																FROM tblplumber 
																LEFT JOIN tblcomplaints ON tblcomplaints.plumber_ID = tblplumber.plumber_ID WHERE tblplumber.position = 'plumber'") or die(mysqli_error($connect));
								while ($rowplumber = mysqli_fetch_assoc($plum)) {
									$plumber_ID = $rowplumber['plumber_ID'];
									$fnfn = $rowplumber['Fname'];
									$lnln = $rowplumber['Lname'];
									$status = $rowplumber['avail_status'];
									$Complaint_Status = $rowplumber['Complaint_Status'];
									$id = $rowplumber['complaint_ID'];

								// 	if ($status == 1 && $Complaint_Status == 1) {
								// 		mysqli_query($connect, "UPDATE tblcomplaints SET avail_status = 0 WHERE complaint_ID = $id") or die(mysqli_error($connect));
								// 	}
								// 	AND tblcomplaints.avail_status = 1

								?>
									<?php // if ($status == 0) : ?>
										<option value="<?php echo $plumber_ID  ?>"><?php echo $fnfn . ' ' . $lnln;?></option>
									<?php // endif; ?>
								<?php
								}
								?>
								</select>
																</td>
							</tr>

							<tr>
								<th>Date</th>
								<td style='background:white'><input type='text' name="date" value="<?php echo $dateTimeString?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
							</tr>
							<tr>
								<td style='background:white' colspan="2">
								<div style="text-align:right">
								<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
								<button type="button" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="history.back();">Cancel</button>
								</div>
								</td>
							</tr>

							<?php } ?>
						</table>
					</form>
		
				</div>
			</center>


    </div>
  </section>
<?php include 'includes/footer.php' ?>

