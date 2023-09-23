	<?php include 'includes/session.php';?>
	<?php include 'includes/header.php' ?>
	<?php include 'includes/topbar.php' ?>
	<?php $page = "client"; include 'includes/leftbar.php' ?>


	<?php

		@$diwow=$_GET['ctid'];
		@$printnow=$_GET['YesToPrint'];
		if($printnow==1)
		{
			echo
			"
				<script>
				window.onload = function(){
					window.open('print.php', '_blank','pagename','resizable,height=500,width=1000');
				}		
					
				</script>
			";
			
			
		}
		if($diwow==TRUE)
		{
			$clientf="SELECT * FROM tblclients WHERE client_ID='$diwow' ";
			$res=mysqli_query($connect, $clientf)or die(mysqli_error($connect));
			while($rw=mysqli_fetch_assoc($res))
			{
				
				$cidt=$rw["client_ID"];
				$name=$rw["client_fname"].' '.$rw["client_mname"].' '.$rw["client_lname"];
				$address=$rw["address_ID"];
				$houseno=$rw["House_No"];
				$email=$rw["ClientEmail"];
				$contact=$rw["Contact"];
				$regdate=$rw["RegDate"];
				$status="Status: Active";
				$zip=2421;
				
				$add2="SELECT * FROM tbladdress WHERE address_ID='$address'";
				$resadd2=mysqli_query($connect,$add2)or die(mysqli_error($connect));
				$rww2=mysqli_fetch_assoc($resadd2);
				$b2=$rww2['Barangay'];
				$m2=$rww2['Municipality'];
				$p2=$rww2['Province'];
				$all=$b2." ".$m2." ".$p2;
				
				$font=realpath('font/calibri.ttf');
				$image=imagecreatefromjpeg("img/application-form.jpg");
				$color=imagecolorallocate($image,19,21,22);
	         
				
				imagettftext($image,30,0,1100,620,$color,$font,$cidt);
				imagettftext($image,30,0,300,730,$color,$font,$name);
				imagettftext($image,30,0,200,850,$color,$font,$houseno);
				imagettftext($image,30,0,290,850,$color,$font,$all);
				imagettftext($image,30,0,250,950,$color,$font,$email);
				imagettftext($image,30,0,1100,840,$color,$font,$contact);
				imagettftext($image,30,0,300,620,$color,$font,$regdate);
				imagettftext($image,30,0,1300,540,$color,$font,$status);
				imagettftext($image,30,0,1100,950,$color,$font,$zip);
	
             
				imagejpeg($image,"img/".$cidt.".jpg");
				imagedestroy($image);
				
				$up="UPDATE tblclients SET Viewed='1' WHERE client_ID='$diwow'";
				$resup=mysqli_query($connect,$up)or die(mysqli_error($connect));
				
				$admin = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 
				
				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$admin', 'Admin',   NOW(),  ' View $name Information')";
					$query = mysqli_query($connect,$insert);
				echo
				"
				<script>
						window.location='print_now.php?view=$cidt';
					</script>
				";
			}
		}
		?>


	<section class="is-title-bar">
	<div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
		<ul>
		<li style='color:black'>Admin</li>
		<li style='color:black'>Clients</li>
		<li style='color:black'>New Applicant/s</li>
		</ul>
		<div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
		<h2 class="title">
		</h2>
		<a href = "csv-client.php"  style="position:relative; right:10px;" class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-4">
		Import CSV</a>
		<a href = "add-clients.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add CLient</a>
	</div>
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
		


	    <div class="  bg-gray-50" >

	<table id="dataTable"  class="cell-border" >
				<thead>
				<tr>
					<th>Application No.</th>
					<th>Client Name</th>
					<th>Address</th>
					<th>Email Address</th>
					<th>Contact No.</th>
					<th>Classification</th>
					<th>Status</th>
					<th>Control</th>
				</tr>
				</thead>
				<tbody>
						<?php

							$qry="SELECT *,tblclients.client_ID AS cid FROM tblclients
							LEFT JOIN tbladdress ON tbladdress.address_ID = tblclients.address_ID 
							LEFT JOIN inspection_schedule_for_registration_approval ON inspection_schedule_for_registration_approval.client_ID  = tblclients.client_ID 
							WHERE  tblclients.Status = 0";
							$query = $connect->query($qry);
							$num=mysqli_num_rows($query);
							if($num>0)
							{

							while($row = $query->fetch_assoc()){

								if($row['plumber_ID']==0)
									{
										$status = "Pending";
									}else
									{
										$status =  "On Going";
									}
								?>
		
						
							<tr>

							<td data-label="House_No"><?php echo $row['cid']?></td>	
							<td data-label="Client Name"><?php echo $row['client_fname'].' '.$row['client_mname'].' '. $row['client_lname'] ?></td>
							<td data-label="Location"><?php echo $row['House_No'].' '.$row['Barangay'].' '.$row['Municipality'].' '. $row['Province']?></td>
							<td data-label="Email"><?php echo $row['ClientEmail']?></td>
							<td data-label="Contact No."><?php echo $row['Contact']?></td>
							<td data-label="Status"> <?php echo $row['classification']?> </td>
								<td data-label="Reg Date"><?php echo $status?></td>
							<td class="actions-cell">
							<div class='buttons center nowrap'>

						
								<button class='button small blue' onclick=window.location.href="pending-clients.php?ctid=<?php echo $row['cid'];?>"   type='button' name="print" >
									<span class='icon'><i class='mdi mdi-eye'></i></span>
									</button>

							
								<!-- <a type='button' href="edit-client.php?id=<?php echo $row['cid'];?>" class='button small green --jb-modal'  data-target='sample-modal-3' type='button'>
								<span class='icon'><i class='fa fa-edit'></i></span>
								</a> -->
							</div>
							
							</td>
							</tr>
							<?php }
						}
						else{
						?>
							<tr>
								<td colspan='10' style='text-align:center;font-weight:bold;background:white'><br><br>--NO PENDING CLIENTS--</td>
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

