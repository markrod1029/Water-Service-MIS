<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "report"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Report</li>
      <li style='color:black'>Report SOA</li>
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
	<div id='em' >
	

     <div class="  bg-gray-50" >

	<table id="dataTable"  class="cell-border" >
			<thead>
			  <tr>
			
				<th>Meter No.</th>
				<th>Client Name</th>
				<th>Invoice Date</th>
                <th>Invoice Due Date</th>
                <th>Cubic Meter</th>
                <th>Total</th>
                <th>Notes</th>
                <th>Status</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php

						$qry="SELECT *, billing.billing_ID AS bid FROM billing 
                        LEFT JOIN tblclients ON tblclients.client_ID =  billing.client_ID WHERE   billing.status = 'paid'  ";
						$query = $connect->query($qry) ; 
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						
				?>
						<tr>
							<td data-label="#"><?php echo $row['meter_no']?></td>
								<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
							<td data-label="Plumber Name"><?php echo $row['invoice_date']?></td>
							<td data-label="Date"><?php echo $row['invoice_due_date']?></td>
							<td data-label="Complaint"><?php echo $row['cubic_meter']?></td>
							<td data-label="Complaint"><?php echo $row['total']?></td>
							<td data-label="Complaint"><?php echo $row['notes']?></td>
							<td data-label="Complaint"><?php echo $row['status']?></td>
							
							<td class="actions-cell">
						
									<a class='button small green --jb-modal' href="SOA.php?id=<?php echo $row['bid'] ?>"  data-target='sample-modal-2' type='button' >
									  <span class='icon'><i class='mdi mdi-eye'></i></a>
									</button>
                                 

									
							
								
							</td>
						</tr>
							<?php
					}
				}else
				{
					echo
					"
						<tr>
							<td colspan='9' style='text-align:center;font-weight:bold;background:white'><br><br>--NO PENDING SOA--</td>
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
<br><br><br><br><br><br><br><br><br>

<?php include 'includes/footer.php' ?>

