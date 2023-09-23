<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "inspection"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:lightblue'>Plumber</li>
      <li style='color:lightblue'> Inspection</li>
      <li style='color:darkblue'> Manage Inspection</li>
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
	
    <div class="card has-table" style='color:blue'>
		<table>
			<thead>
			  <tr>
			
				<th>Meter No.</th>
				<th>Client Name</th>
                <th>Location</th>
                <th>Schedule Inspection</th>
				<th>Control</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php
		  		$id = $user['plumber_ID'];
						$qry="SELECT *,inspection_schedule_for_registration_approval.schedule_ID  AS sid FROM inspection_schedule_for_registration_approval
						LEFT JOIN tblclients ON tblclients.client_ID = inspection_schedule_for_registration_approval.client_ID
						LEFT JOIN tbladdress ON tbladdress.address_ID =  tblclients.address_ID
						 WHERE  inspection_schedule_for_registration_approval.inspect_status =1 AND inspection_schedule_for_registration_approval.inspect_visted =0 AND plumber_ID = '$id'  ";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

					
						
				?>
						<tr>
							<td data-label="#"><?php echo $row['meter_no']?></td>
							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
							<td data-label="Location"><?php echo $row['Barangay'].' '.$row['Municipality'].' '. $row['Province']?></td>
							<td data-label="#"><?php echo $row['sched_visited']?></td>

							<td class="actions-cell">
						
							<form method='POST' action='visited_inspection.php?cmp=<?php echo $row['schedule_ID'];?>'>
										<button type='submit' name='btnsend' class='button small green --jb-modal'  data-target='sample-modal-3'  onclick='doSomething()' id='myButton' style='width:100px'>
										  <span class='icon'>Visited</span>
										</button>	</form>

										
									
							
								
							</td>
						</tr>
							<?php
					}
				}else
				{
					echo
					"
						<tr>
							<td colspan='7' style='text-align:center;font-weight:bold;background:white'><br><br>--NO INSPECTION--</td>
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
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
			</br>


<?php include 'includes/footer.php' ?>


<?php

if(isset($_POST['submit']))
{

	$id = $_GET['cmp'];


	$kunin=mysqli_query($connect,"SELECT * FROM  inspection_schedule_for_registration_approval WHERE schedule_ID='$id' ")or die(mysqli_error($connect));
	$k=mysqli_fetch_assoc($kunin);
	$client_ID=$k['client_ID'];



	$sql = "UPDATE inspection_schedule_for_registration_approval SET inspect_status='1' WHERE schedule_ID='$id'";
			if($connect->query($sql)){
		$_SESSION['success'] = 'Already Installed The Client!';

		$name = $user['Fname'].' '.$user['Mname'].' '.$user['Lname']; 
		$insert = "INSERT INTO activity( name, position,  time_loged, status)
			VALUES( '$name', 'Plumber',   NOW(),  'Already Installed')";
			$query = mysqli_query($connect,$insert);

			
	$sql = "UPDATE tblclients SET Status='1' WHERE client_ID ='$client_ID'";
	$connect->query($sql);
		echo
		"
		<script>
		window.location='inspections.php';
		</script>
		";
	}

	else{
		$_SESSION['error'] = $connect->error;
	}
	
}

?>