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
					$qry="SELECT * FROM inspection_schedule_for_complaints 
					LEFT JOIN tblcomplaints ON inspection_schedule_for_complaints.complaint_ID = tblcomplaints.complaint_ID
					LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID
					LEFT JOIN tbladdress ON tbladdress.address_ID =  tblclients.address_ID
					 WHERE  inspection_schedule_for_complaints.isc_ID = '$id' ";
						$query = $connect->query($qry);
						$rw = $query->fetch_assoc();
					?>

						<form method='POST' >

							<tr>
								<th>Meter No.</th>
								<td style='background:white'><input type='text' name="c" value="<?php echo $rw['meter_no']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
							</tr>

							<tr>
								<th>Client Name</th>
							
                               
                                <td style='background:white'><input type='text' name="cname" value="<?php echo $rw['client_fname'].' '.$rw['client_mname'].' '.$rw['client_lname'];?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled></td>
							</tr>


							

							
									
                            
							<tr>
								<th>Comment</th>
								<td style='background:white'>
								<textarea style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:15px" name ="comment"></textarea>
								
								<input type='hidden' name="complaint_ID" value="<?php echo $rw['complaint_ID']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" >

								<input type='hidden' name="client_ID" value="<?php echo $rw['client_ID']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" >

								</td>
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


<?php


		if(isset($_POST['submit']))
		{

			$client_ID = $_POST['client_ID'];
			$comment=$_POST['comment'];
			$complaint_ID=$_POST['complaint_ID'];

           
            $sql = "UPDATE tblcomplaints SET   Complaint_Status='1' WHERE complaint_ID='$complaint_ID'";

			if($connect->query($sql)){
				$_SESSION['success'] = 'Client For Complaint Already Visited!';

            $sql = "UPDATE inspection_schedule_for_complaints SET comment = '$comment', visited='1' WHERE complaint_ID='$complaint_ID'";
			$connect->query($sql);
				$name = $user['Fname'].' '.$user['Mname'].' '.$user['Lname']; 
		$insert = "INSERT INTO activity( name, position,  time_loged, status)
			VALUES( '$name', 'Plumber',   NOW(),  'Complaint Fixed and Visited')";
			$query = mysqli_query($connect,$insert);

                echo
                "
                    <script>
                        window.location='scheduled-complaints.php';
                    </script>
                ";
			}

			else{
				$_SESSION['error'] = $connect->error;
			}

  	
		}
		?>