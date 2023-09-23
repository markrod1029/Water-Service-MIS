<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "report"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:lightblue'>Plumber</li>
      <li style='color:lightblue'>Reports</li>
      <li style='color:darkblue'> Complaints Reports</li>
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



	
	
	</div>
	

    <div class="card has-table" style='color:blue'>
		<table>
			<thead>
			  <tr>
			
				<th>Meter No.</th>
				<th>Client Name</th>
                <th>Categories complaint</th>
                <th>Customer complaint</th>
                <th>Status</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php
						$id = $user['plumber_ID'];
						$qry="SELECT *,inspection_schedule_for_complaints.isc_ID AS cid FROM inspection_schedule_for_complaints
						LEFT JOIN tblcomplaints ON inspection_schedule_for_complaints.complaint_ID = tblcomplaints.complaint_ID
						LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID
						LEFT JOIN tblplumber ON tblplumber.plumber_ID = inspection_schedule_for_complaints.plumber_ID 
						WHERE  inspection_schedule_for_complaints.visited='1' AND inspection_schedule_for_complaints.plumber_ID = '$id' ";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						
				?>
						<tr>
							<td data-label="#"><?php echo $row['meter_no']?></td>
							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
							<td data-label="Complaint"><?php echo $row['they_complaint']?></td>
							<td data-label="Complaint"><?php echo $row['complaint']?></td>

							<td data-label="Complaint_Status">
								<?php
									if( $row['visited']==1)
									{
										echo
										"
											Done
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
						
						</tr>
							<?php
					}
				}else
				{
					echo
					"
						<tr>
							<td colspan='7' style='text-align:center;font-weight:bold;background:white'><br><br>--NO ACCEPT COMPLAINTS--</td>
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

