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
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()"><br>URBIZTONDO WATER SERVICES (Visited Client )</td>
			  </tr>
			 
					  <table>

	
										<?php

					$id = $_GET['cmp'];
					$qry="SELECT *,inspection_schedule_for_registration_approval.schedule_ID  AS sid FROM inspection_schedule_for_registration_approval
					LEFT JOIN tblclients ON tblclients.client_ID = inspection_schedule_for_registration_approval.client_ID
					LEFT JOIN tbladdress ON tbladdress.address_ID =  tblclients.address_ID
					 WHERE  inspection_schedule_for_registration_approval.schedule_ID = '$id' ";
						$query = $connect->query($qry);
						$rw = $query->fetch_assoc();
					?>

						<form method='POST' action="CRUD/inspection_date.php" >

							<tr>
								<th>Meter No.</th>
								<td style='background:white'><input type='text' name="c" value="<?php echo $rw['meter_no']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
							</tr>

							<tr>
								<th>Client Name</th>
							
								<input type='hidden' name="schedule_ID" value="<?php echo $rw['schedule_ID']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" >
								<input type='hidden' name="name" value="<?php echo $user['Fname'].' '.$user['Mname'].' '.$user['Lname']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" >

								<input type='hidden' name="client_ID" value="<?php echo $rw['client_ID']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" >
									<input type='text' name="plumber_ID" value="<?php echo $rw['plumber_ID']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" >
                                <td style='background:white'><input type='text' name="cname" value="<?php echo $rw['client_fname'].' '.$rw['client_mname'].' '.$rw['client_lname'];?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled></td>
							</tr>


							

							<tr>
								<th> Date of Inspection</th>
								<td style='background:white'><input type='date' name="date"  style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" ></td>
							</tr>
									
                            
							
							<tr>
								<td style='background:white' colspan="2">
                                <center>
                              
                                <button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
								<a type="submit" href="inspections.php" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="cancel" >Cancel</a>
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


