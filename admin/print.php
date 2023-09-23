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
						<img id="myImg" class='img1' src="<?php echo '../admin/img/'.$id.'.jpg'; ?>" width='30%'height='60%' style='border: solid blue 2px'><br><br>
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
							$req="SELECT * FROM tblclients WHERE meter_no='$id'";
							$res=mysqli_query($connect,$req)or die(mysqli_error($connect));
							$row=mysqli_fetch_assoc($res);
							$picture=$row['picture'];
							$clientid=$row['client_ID'];
						

						?>
					
						</div>
							<div style="break-after:page">

						 </div>
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
							
					
				</div>
			</center>
<?php
						}
?>



						<table width='100%' border='2' style="border-collapse:collapse;text-align:center;">
			  <tr>
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black">APPLICATION & CONTRACT</td>
			  </tr>
			 
					<?php
						$pending="SELECT * FROM tblclients 
						LEFT JOIN tbladdress ON tblclients.address_ID = tbladdress.address_ID
						LEFT JOIN inspection_schedule_for_registration_approval ON inspection_schedule_for_registration_approval.client_ID = tblclients.client_ID
						LEFT JOIN tblplumber ON tblplumber.plumber_ID =  inspection_schedule_for_registration_approval.plumber_ID WHERE  tblclients.Viewed='1' AND tblclients.scheduled='1'AND tblclients.client_ID='$clientid'";
						$rp=mysqli_query($connect,$pending)or die(mysqli_error($connect));
						while($rw=mysqli_fetch_assoc($rp))
						{
							$cid=$rw["meter_no"];
							$name=$rw["client_fname"].' '.$rw["client_lname"].' '.$rw["client_lname"];
							$plumber=$rw["Fname"].' '.$rw["Mname"].' '.$rw["Lname"];
							$address=$rw["Barangay"].' '.$rw["Municipality"].' '.$rw["Province"];
							$hn=$rw["House_No"];
							$cadd=$rw["address_ID"];
						    $cem=$rw["ClientEmail"];
							$ccon=$rw["Contact"];
							$rd=$rw["RegDate"];
							$st=$rw["Status"];
							$classification=$rw['classification'];
							$install=  date('F-d-Y H:i A', strtotime($rw['date_install']));
							
						?>
						<tr>
							<th>Location of Service</th>
							<td style='background:white'><?php echo $address?></td>
						</tr>
						<tr>
							<th>Meter No</th>
							<td style='background:white'><?php echo $cid?></td>
						</tr>
						<tr>
							<th>Date Connected</th>
							<td style='background:white'><?php echo $install?></td>
						</tr>
						<tr>
							<th>Installed By</th>
							<td style='background:white'><?php echo $plumber?></td>
							
						</tr>
						<tr>
							<th>Classification</th>
							<td style='background:white'><?php echo $classification?></td>
						</tr>
						<tr>
							<th>Size</th>
							<td style='background:white'>&#189;</td>
						<tr>
						<tr>
							<th>Remarks</th>
							<td style='background:white'><?php  if($rw['inspected']==1){
								echo 'Installed';}
								
								else{
								}?></td>
						</tr>
						<tr>

						<?php
						}
						?>
		</table>

    </div>
  </section>
<br>
<br>
<br>
<br>
<br>
<?php include 'includes/footer.php' ?>
