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
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()"><br>URBIZTONDO WATER SERVICES (Scheduled Installation)</td>
			  </tr>
			 
				
					
              <form method="POST" action="CRUD/inspections_install.php">
									
					  <table>
										<?php

					$id = $_GET['id'];
					$qry="SELECT *,inspection_schedule_for_registration_approval.schedule_ID  AS sid FROM inspection_schedule_for_registration_approval
						LEFT JOIN tblclients ON tblclients.client_ID = inspection_schedule_for_registration_approval.client_ID WHERE  inspection_schedule_for_registration_approval.schedule_ID='$id'";
						$query = $connect->query($qry);
					while($rw=mysqli_fetch_assoc($query))
					{
					
					?>
							<tr>
								<th>Application No.</th>
								<td style='background:white'><input type='text' name="c" value="<?php echo $rw['client_ID']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
							</tr>
							
						

                            <tr>
								<th>Client Name</th>
								<td style='background:white'>
								    
								    <input type='text' name="client" value="<?php echo $rw['client_fname'].' '.$rw['ClientName'].' '.$rw['client_mname']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly>
								    
								    
								</td>
							</tr>

							
							<tr>
								<th>Plumber Comment</th>
								<td style='background:white'><textarea type='text' name="com"  style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly><?php echo $rw['comment']?></textarea></td>
							</tr>
					

							<tr>
								<th>Tools</th>
								<td style='background:white'><textarea type='text' name="com"  style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly><?php echo $rw['tools']?></textarea></td>
							</tr>
					 
							<tr>
								<th>Plumber/Inspection</th>
								<td style='background:white'>
								<select name="plumber" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required>
									<?php
                                    $client = $rw['plumber_ID'];
										$plum=mysqli_query($connect,"SELECT * FROM tblplumber WHERE plumber_ID = '$client' ")or die(mysqli_error($connect));
										while($rowplumber=mysqli_fetch_assoc($plum))
										{
											$plumberDI=$rowplumber['plumber_ID'];
											$fnfn=$rowplumber['Fname'];
											$mnmn=$rowplumber['Mname'];
											$lnln=$rowplumber['Lname'];
									?>
											<option value="<?php echo $plumberDI?>"><?php echo $fnfn." ".$mnmn." ".$lnln;?></option>
									<?php
										}
									?>
								</select>
								</td>
							</tr>


						
						
                         
							
							<tr>
								<th>Inspection Status</th>
								<td style='background:white'>
								<select name="status" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required>
									
									<option value="1">Approved</option>
									<option value="5">Reject</option>
							
						</select>
							</td>
							</tr>



						
							<tr>
								<td style='background:white' colspan="2">
								<div style="text-align:right">
								<input type='hidden' name="schedule_ID" value="<?php echo $rw['schedule_ID']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly>
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
