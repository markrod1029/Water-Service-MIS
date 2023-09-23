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
	  
<div class="card has-table" style='color:blue'>

<center>
				<br>
				<div>
				<table width='100%' border='2' style="border-collapse:collapse;text-align:center;color:blue">
			  <tr>
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()"><br>URBIZTONDO WATER SERVICES (Scheduled Client Complaint)</td>
			  </tr>
			 
				
					
									
					  <table>

	
										<?php

					$id = $_GET['cmp'];
					$plumber_id = $user['plumber_ID'];
					$qry="SELECT *,tblcomplaints.complaint_ID AS comid, tblclients.client_ID AS clid FROM tblcomplaints
						LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID WHERE  tblcomplaints.complaint_ID='$id'";
						$query = $connect->query($qry);
						$rw = $query->fetch_assoc();
						$client_id =  $rw['clid'];
 
						echo
						"
						<form method='POST' action='CRUD/accept-complaints.php?complaint_ID=$id&&plumber_ID=$plumber_id&&client_ID=$client_id'>
						";
					?>
							<tr>
								<th>Meter No.</th>
								<td style='background:white'><input type='text' name="c" value="<?php echo $rw['meter_no']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
							</tr>

							<tr>
								<th>Client Name</th>
								<td style='background:white'><input type='text' name="reason" value="<?php echo $rw['client_fname'].' '.$rw['client_mname'].' '.$rw['client_lname'];?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled></td>
							</tr>


							<tr>
								<th>Complaint</th>
								<td style='background:white'>
								<textarea style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled><?php echo $rw['complaint']?></textarea>
								</td>
							</tr>

							<tr>
								<th>Set Date for Inspection</th>
								<td style='background:white'><input type='date' name="date" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required></td>
							</tr>
											
							<tr>
								<td style='background:white' colspan="2">
								<center>
								<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
								<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="cancel" >Cancel</button>
								</center>
								</td>
							</tr>

						</table>
					</form>
		
				</div>
			</center>


    </div>
  </section>
<?php include 'includes/footer.php' ?>


?>