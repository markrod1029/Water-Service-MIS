<?php
include('includes/session.php')?>
<?php include('includes/header.php')?>
<?php include('includes/print_leftbar.php')?>


<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:lightblue'>Admin</li>
      <li style='color:darkblue'>Individual Client Application Form  </li>
    </ul>
  
  </div>
</section>


  <section class="section main-section">
 

	
    <div class="card has-table" style='color:black'>
<?php

$id=$_GET['view'];
	if(@$id==True)
		{
?>
			<center>
				<br>
				<div>
					<div class='print-area'>
						<img id="myImg" class='img1' src="<?php echo 'img/'.$id.'.jpg'; ?>" width='30%'height='60%'><br><br>
						<!-- The Modal -->
						<div id="myModal" class="modal">
						  <span class="close">&times;</span>
						  <img class="modal-content" id="img01">
						  <div id="caption"></div>
						  <script>
							// Get the modal
							var modal = document.getElementById("myModal");

							// Get the image and insert it inside the modal - use its "alt" text as a caption
							var img = document.getElementById("myImg");
							var modalImg = document.getElementById("img01");
							var captionText = document.getElementById("caption");
							img.onclick = function(){
							  modal.style.display = "block";
							  modalImg.src = this.src;
							  captionText.innerHTML = this.alt;
							}

							// Get the <span> element that closes the modal
							var span = document.getElementsByClassName("close")[0];

							// When the user clicks on <span> (x), close the modal
							span.onclick = function() { 
							  modal.style.display = "none";
							}
						</script>
						</div>
						<?php
							$req="SELECT * FROM tblclients WHERE client_ID='$id'";
							$res=mysqli_query($connect,$req)or die(mysqli_error($connect));
							$row=mysqli_fetch_assoc($res);
							
							$clientid=$row['client_ID'];
						
							$picture=$row['picture'];
							 $sketch=$row['sketch_location'];
							$email=$row['ClientEmail'];
							$client_ID=$row['client_ID'];
							$fullname=$row['client_fname'].' '.$row['client_mname'].' '.$row['client_lname'];
						?>
					
						 <div id="myModal3" class="modal">
						  <span class="close3">&times;</span>
						  <img class="modal-content" id="img03">
						  <div id="caption3"></div>
						  <script>
							// Get the modal
							var modal3 = document.getElementById("myModal3");

							// Get the image and insert it inside the modal - use its "alt" text as a caption
							var img3 = document.getElementById("myImg3");
							var modalImg3 = document.getElementById("img03");
							var captionText3 = document.getElementById("caption3");
							img3.onclick = function(){
							  modal3.style.display = "block";
							  modalImg3.src = this.src;
							  captionText3.innerHTML = this.alt;
							}

							// Get the <span> element that closes the modal
							var span3 = document.getElementsByClassName("close3")[0];

							// When the user clicks on <span> (x), close the modal
							span3.onclick = function() { 
							  modal3.style.display = "none";
							}
						</script>
						</div>
					</div><br><br>
					

					<?php
						$vld=mysqli_query($connect,"SELECT * FROM inspection_schedule_for_registration_approval WHERE client_ID='$clientid'  AND inspected='0'")or die(mysqli_error($connect));
						$v=mysqli_num_rows($vld);
						if($v>0)
						{
						?>
						<table width='100%' border='2' style="border-collapse:collapse;text-align:center;">
			  <tr>
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;;font-family:arial black"><img src="img/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()"><br>URBIZTONDO WATER SERVICES (Scheduled Pending Client)</td>
			  </tr>
			 
					<?php
						$pending="SELECT * FROM tblclients WHERE Status='0' and Viewed='1' and scheduled='1' and client_ID='$clientid'";
						$rp=mysqli_query($connect,$pending)or die(mysqli_error($connect));
						while($rw=mysqli_fetch_assoc($rp))
						{
							$cid=$rw["client_ID"];
							$cn=$rw["client_fname"].' '.$rw["client_lname"].' '.$rw["client_lname"];
							$hn=$rw["House_No"];
							$cadd=$rw["address_ID"];
						    $cem=$rw["ClientEmail"];
							$ccon=$rw["Contact"];
							$rd=$rw["RegDate"];
							$st=$rw["Status"];
							$pic=$rw['picture'];
						?>
						<!--
						<tr>
							<th>Date Register</th>
							<td style='background:white'><?php echo $rd?></td>
						</tr>
						<tr>
							<th>Status</th>
							<td style='background:white'>
							<?php
								if($st==1)
								{
									echo "Active";
								}else
								{
									echo "Pending...";
								}
							?>
							</td>
						</tr>
							-->
						<tr>
							<th>Inspection Schedule</th>
							<td style='background:white'>
							<?php
								$valid69=mysqli_query($connect,"SELECT * FROM inspection_schedule_for_registration_approval WHERE client_ID='$clientid'  AND inspected='0'")or die(mysqli_error($connect));
								$vc69=mysqli_fetch_assoc($valid69);
								$sche=$vc69['date'];
								$p=$vc69['plumber_ID'];
								echo $sche;
							?>
							</td>
						</tr>
						<tr>
							<th>Assigned Plumber:</th>
							<td style='background:white'>
								<?php
									$ins=mysqli_query($connect,"SELECT * FROM tblplumber WHERE plumber_ID='$p'")or die(mysqli_error($connect));
									$insrw=mysqli_fetch_assoc($ins);
									$nf=$insrw['Fname'];
									$nm=$insrw['Mname'];
									$nl=$insrw['Lname'];
									echo $nf.' '.$nm.' '.$nl;
								?>
							</td>
						</tr>
						<?php
						}
						?>
		</table>
						<?php
						}
						
						
						else
						{
					?>
					<form method="POST" action="CRUD/send-client.php">
					
					  <table>
						
							<tr>
								<th>Select Plumber</th>
								<td style='background:white'>
								<select name="plumber" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
								<?php
								$plum = mysqli_query($connect, "SELECT * FROM tblplumber WHERE position = 'plumber' ") or die(mysqli_error($connect));
								while ($rowplumber = mysqli_fetch_assoc($plum)) {
									$plumber_ID = $rowplumber['plumber_ID'];
									$fnfn = $rowplumber['Fname'];
									$lnln = $rowplumber['Lname'];
									
									$id = $rowplumber['schedule_ID'];

								// 	if ($status == 1 && $inspected == 1) {
								// 		mysqli_query($connect, "UPDATE inspection_schedule_for_registration_approval SET avail_status = 0 WHERE schedule_ID = $id") or die(mysqli_error($connect));
								// 	}
								
								// sa part ng sqp 	AND inspection_schedule_for_registration_approval.avail_status = 1
								

								?>
									<?php // if ($status == 0) : ?>
										<option value="<?php echo $plumber_ID  ?>"><?php echo $fnfn . ' ' . $lnln; ?></option>
										
									<?php // endif; ?>
								<?php
								}
								?>
								</select>

								<input type='hidden' name="c" value="<?php echo $clientid?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required>
								<input type='hidden' name="email" value="<?php echo $email?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required>
								<input type='hidden' name="fullname" value="<?php echo $fullname?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required>


								</td>
							</tr>

							<tr>
								<td style='background:white' colspan="2">
								<div style="text-align:right">
								<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
								<button type="button" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="history.back();">Cancel</button>
								</div>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</center>
<?php
						}
		}
?>
    </div>
  </section>
<br>
<br>
<br>
<br>
<br>
<?php include 'includes/footer.php' ?>
