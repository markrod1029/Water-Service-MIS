
<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "location"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
    <li style='color:black'>Admin</li>
      <li style='color:black'>Locations</li>
      <li style='color:black'>Add Location</li>
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
   
		<form method="POST">
		<table>
			<tr>
				<th>Barangay</th>
				<td style='background:white'><input type='text' name="b" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			<tr>
				<th>Municipality</th>
				<td style='background:white'>
				<input type='text' value="Urbiztondo" name="m" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>
			<tr>
				<th>Province</th>
				<td style='background:white'>
				<input type='text' value="Pangasinan" name="p" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>
		
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
				<button type="button" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="window.location.href='locations.php'">Cancel</button>
				</center>
				</td>
			</tr>
		</table>
		</form>
    </div>

  </section>
  <br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include 'includes/footer.php' ?>
<div class="card has-table" style='color:blue'>
	<?php
		if(isset($_POST['submit']))
		{
		
			$b = htmlspecialchars( $_POST['b'], ENT_QUOTES, 'UTF-8');
			$m = htmlspecialchars( $_POST['m'], ENT_QUOTES, 'UTF-8');
			$p = htmlspecialchars( $_POST['p'], ENT_QUOTES, 'UTF-8');

			
			$add="INSERT INTO tbladdress(Barangay, Municipality, Province)
			VALUES('$b','$m','$p')";
			$resadd=mysqli_query($connect,$add);
			
		

			if($connect->query($add)){
				$_SESSION['success'] = 'Location Added successfully';
				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Admin',   NOW(),  'Added as a new Location')";
				$query = mysqli_query($connect,$insert);


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
		?>