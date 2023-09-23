<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "plumber"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Plumbers</li>
      <li style='color:black'>View Plumber</li>
    </ul>
    
  </div>
</section>


<section class="section main-section">
  


    <div class="card has-table" >
	<?php
    $plumberid = $_GET['ctid'];
		$view=mysqli_query($connect,"SELECT * FROM tblplumber WHERE plumber_ID='$plumberid'")or die(mysqli_error($connect));
		$wr=mysqli_fetch_assoc($view);
		$pid=$wr["plumber_ID"];
		$fn55=$wr["Fname"];
		$mn55=$wr["Mname"];
		$ln55=$wr["Lname"];
		$hn=$wr["house_no"];
		$address=$wr["address_ID"];
		$email=$wr["Email"];
		$cn=$wr["ContactNo"];
		$us=$wr["Username"];
		$ps=$wr["Password"];

		if($wr['position']=='plumber')
								{
									$rd = "Administrative Aide 1 - Plumber";
								}else
								{
									$rd =  "Administrative Aide 1 - Customer  Clerk";
								}

		$s=$wr["UserStatus"];
	?>
		<form method="POST">
		<table>
			<tr>
				<th>Firstname</th>
				<td style='background:white'><input type='text' value="<?php echo $fn55?>" name="fn" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
			</tr>
			<tr>
				<th>Middlename</th>
				<td style='background:white'><input type='text' value="<?php echo $mn55?>" name="mn" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
			</tr>
			<tr>
				<th>Lastname</th>
				<td style='background:white'><input type='text' value="<?php echo $ln55?>" name="ln" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
			</tr>
			
			<tr>
				<th>Address</th>
				<td style='background:white'>
						<?php
							$add="SELECT * FROM tbladdress WHERE address_ID='$address'";
							$resadd=mysqli_query($connect,$add)or die(mysqli_error($connect));
							while($rww=mysqli_fetch_assoc($resadd))
							{
								$ai=$rww['address_ID'];
								$b=$rww['Barangay'];
								$m=$rww['Municipality'];
								$p=$rww['Province'];
						?>
								<input type="text" value="<?php echo $hn.' '. $b.' '.$m.' '.$p?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled>
						<?php
							}
						?>
				</td>
			</tr>
			<tr>
				<th>Email</th>
				<td style='background:white'><input type='email' value="<?php echo $email?>"  name="email" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled></td>
			</tr>
			<tr>
				<th>Contact No</th>
				<td style='background:white'><input type='number' value="<?php echo $cn?>" name="contact" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled></td>
			</tr>
			<tr>
				<th>Username</th>
				<td style='background:white'><input type='text' value="<?php echo $us?>" name="contact" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled></td>
			</tr>
			<tr>
				<th>Password</th>
				<td style='background:white'><input type='password' value="<?php echo $ps?>" name="contact" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled></td>
			</tr>
			<tr>
				<th>Position</th>
				<td style='background:white'><input type='text' value="<?php echo $rd?>"  name="regdate" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled></td>
			</tr>
			<tr>
				<th>UserStatus</th>
				<td style='background:white'><input type='text' value="<?php if($s==1)echo 'Activated'; else echo 'Deactivated'?>"  name="regdate" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled></td>
			</tr>
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="button" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="history.back()">Go Back</button>
				</center>
				</td>
			</tr>
		</table>
		</form>
    </div>
  </section>


<?php include 'includes/footer.php' ?>