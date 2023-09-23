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
	  
<div class="card has-table">

<center>
				<br>
				<div>
				<table width='100%' border='2' style="border-collapse:collapse;text-align:center;color:blue">
			  <tr>
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()"><br>URBIZTONDO WATER SERVICES (Complaint Information)</td>
			  </tr>
			 
				
					
									
					  <table>
										<?php

					$id = $_GET['id'];
					$qry="SELECT *,tblcomplaints.complaint_ID AS comid FROM tblcomplaints
                    LEFT JOIN  tblplumber ON tblcomplaints.plumber_ID = tblplumber.plumber_ID
						LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID
						LEFT JOIN tbladdress ON tbladdress.address_ID = tblclients.address_ID  WHERE  tblcomplaints.complaint_ID='$id'";
						$query = $connect->query($qry);
					while($rw=mysqli_fetch_assoc($query))
					{

                        $cat = $rw['they_complaint'];
					
					?>
							<tr>
								<th>Meter No.</th>
								<td style='background:white'><input type='text' name="c" value="<?php echo $rw['meter_no']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
							</tr>
							<tr>
								<th>Client Name</th>
								<td style='background:white'><input type='text' name="name" value="<?php echo $rw['client_fname'].' '.$rw['client_mname'].' '.$rw['client_lname']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
							</tr>
							<tr>
								<th>Address</th>
								<td style='background:white'><input type='text' name="address" value="<?php echo $rw['House_No'].'. '. $rw['Barangay'].' '.$rw['Municipality'].' '. $rw['Province']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
							</tr>

                           <!-- <tr>
								<th>Classification</th>
								<td style='background:white'><input type='text' name="address" value="<?php echo $rw['classification']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
							</tr>-->
							<tr>
								<th>Assign Plumber</th>
								
								<td style='background:white'><input type='text' name="name" value="<?php echo $rw['Fname'].' '.$rw['Mname'].' '.$rw['Lname']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
								
								</td>
							</tr>

							<tr>
								<th>Complaint</th>
								<td style='background:white'><input type='text' name="date" value="<?php echo $rw['complaint']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
							</tr>

                            
							<tr>
								<th>Complaint Category</th>
                                <?php
                                		if( $rw['sentToPlumber']==0)
                                        {
                                            $status =" Pending...";
                                        }else
                                        {
                                            $status = " On Going...";
                                        }
                                    
                            $category = $rw['they_complaint'];
                                $plum = mysqli_query($connect, "SELECT * FROM complaint_category WHERE category_ID = '$category'") or die(mysqli_error($connect));
								while ($rowcategory = mysqli_fetch_assoc($plum)) {
                                    ?>

								<td style='background:white'><input type='text' name="date" value="<?php echo $rowcategory['category']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>

                            <?php }?>
							</tr>


                            <tr>
								<th>Complaint Status</th>
								<td style='background:white'><input type='text' name="date" value="<?php echo $status?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
							</tr>

                            
							<tr>
								<td style='background:white' colspan="2">
								<div style="text-align:right">
								<button type="button" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="history.back();">Back</button>
								</div>
								</td>
							</tr>

							<?php } ?>
						</table>
		
				</div>
			</center>


    </div>
  </section>
<?php include 'includes/footer.php' ?>

