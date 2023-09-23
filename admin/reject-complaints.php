<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php  $page = "complaint"; include 'includes/leftbar.php' ?>




<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Complaints</li>
      <li style='color:black'>Reject Complaints</li>
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
 	
	

    <div class="card has-table" style='color:black'>
		<table>
			<thead>
			  <tr>
                <th>Meter No.</th>
				<th>Client Name</th>
                <th>Date</th>
                <th>Complaint</th>
                <th>Status</th>
			  </tr>
			  </thead>
			  <tbody>
                  <?php

                    $qry="SELECT *,tblcomplaints.complaint_ID AS comid FROM tblcomplaints
                    LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID WHERE  tblcomplaints.sentToPlumber='5'";
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
									if( $row['sentToPlumber']==5)
									{
										echo
										"
											Reject
										";
									}else
									{
										echo
										"
											Pending...
										";
									}
								?>
						</tr>
						
									
						<?php }
					}
					else{
					?>
						<tr>
							<td colspan='7' style='text-align:center;font-weight:bold;background:white'><br><br>--NO CLIENTS APPROVE--</td>
						</tr>
					<?php }?>
						
					
								
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

