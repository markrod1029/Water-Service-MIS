<?php
	error_reporting(0);
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
 

	
    <div class="card has-table" style='color:blue'>
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
							$cedula=$row['cedula'];
							$clearance=$row['clearance'];
							$picture=$row['picture'];
						?>
						<div style="break-after:page">
							<img class="pic" src="../upload/ClientPicture/<?php echo $picture; ?>" width='30%' height='60%' style='border: solid blue 2px'><br><br>
							<img id="myImg2" class='cedula' src="../upload/cedula/<?php echo $cedula; ?>" width='30%' height='60%' style='border: solid blue 2px'><br><br>
						</div>
						<div id="myModal2" class="modal">
						  <span class="close2">&times;</span>
						  <img class="modal-content" id="img02">
						  <div id="caption2"></div>
						  <script>
							// Get the modal
							var modal2 = document.getElementById("myModal2");

							// Get the image and insert it inside the modal - use its "alt" text as a caption
							var img2 = document.getElementById("myImg2");
							var modalImg2 = document.getElementById("img02");
							var captionText2 = document.getElementById("caption2");
							img2.onclick = function(){
							  modal2.style.display = "block";
							  modalImg2.src = this.src;
							  captionText2.innerHTML = this.alt;
							}

							// Get the <span> element that closes the modal
							var span2 = document.getElementsByClassName("close2")[0];

							// When the user clicks on <span> (x), close the modal
							span2.onclick = function() { 
							  modal2.style.display = "none";
							}
						</script>
						</div>
							<div style="break-after:page">
							<img id="myImg3" class='clearance' src="../upload/Clearance/<?php echo $clearance; ?>" width='30%' height='60%' style='border: solid blue 2px'><br>
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

    </div>
  </section>
<br>
<br>
<br>
<br>
<br>
<?php include 'includes/footer.php' ?>
