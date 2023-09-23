<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "location"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Clients</li>
      <li style='color:black'> Add Client</li>
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
    <div class="card has-table" style='color:blue'>

	<form method="POST">
		<?php
		$id = $_GET['ctid'];
			$client="SELECT * FROM tbladdress WHERE address_ID='$id' ";
			$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
			while($rw=mysqli_fetch_assoc($res))
			{
				$cid=$rw["address_ID"];
				$cn=$rw["Barangay"];
				$cadd=$rw["Municipality"];
				$cem=$rw["Province"];
		?>
			<table>
				<tr>
					<th>#</th>
					<td style='background:white'><input type="text" value="<?php echo $cid;?>" name="cid" name="name" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
				</tr>
				<tr>
					<th>Barangay</th>
					<td style='background:white'><input type="text" value="<?php echo $cn;?>" name="name" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
				</tr>
				<tr>
					<th>Municipality</th>
					<td style='background:white'><input type="text" value="<?php echo $cadd;?>" name="address" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
				</tr>
				<tr>
					<th>Province</th>
					<td style='background:white'><input type="text" value="<?php echo $cem;?>" name="email" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
				</tr>
				<tr>
					<td style='background:white' colspan="2">
					<center>
					<button type="submit" value="Done" name="btnupdate"  style="background:lightblue;font-weight:bold;padding:5px;width:100px">Submit</button>
					<button type="submit" value="Cancel" name="btncancel" style="background:lightblue;font-weight:bold;padding:5px;width:100px">Cancel</button>
					</center>
					</td>
				</tr>
				<?php
			}
				?>
			</table>
		</form
    </div>

  </section>


<?php include 'includes/footer.php' ?>



<?php




		if(isset($_POST['btnupdate']))
			{
		
			$name = htmlspecialchars( $_POST['name'], ENT_QUOTES, 'UTF-8');
			$address = htmlspecialchars( $_POST['address'], ENT_QUOTES, 'UTF-8');
			$email = htmlspecialchars( $_POST['email'], ENT_QUOTES, 'UTF-8');
													
				$update="UPDATE tbladdress SET Barangay='$name',Municipality='$address',Province='$email' WHERE address_ID='$id'";
				if($connect->query($update)){
				$_SESSION['success'] = 'Location Updated successfully';

				echo
				"
					<script>
					window.location='locations.php';
					</script>
				";
			}

			else{
				$_SESSION['error'] = $connect->error;
			}


				
			
			}

			if(isset($_POST['btncancel']))
					{
						echo
							"
								<script>
									window.location='locations.php';
								</script>
							";
					}

				

				
	?>

