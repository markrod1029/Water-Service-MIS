<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "plumber"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Plumber</li>
      <li style='color:black'> Edit Plumber Information</li>
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
    <div class="card has-table" >	

	<form method="POST">
		<?php
			$id = $_GET['ctid'];
			$client="SELECT * FROM tblplumber WHERE plumber_ID='$id' ";
			$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
			while($rw=mysqli_fetch_assoc($res))
			{
				$ID=$rw["plumber_ID"];
				$fn555=$rw["Fname"];
				$mn555=$rw["Mname"];
				$ln555=$rw["Lname"];
				$hn=$rw["house_no"];
				$add=$rw["address_ID"];
				$em=$rw["Email"];
				$con=$rw["ContactNo"];
				$us=$rw["Username"];
				$rd=$rw["RegDate"];
				$s=$rw["UserStatus"];
		?>
		<table>
			<tr>
				<th>Plumber_ID</th>
				<td style='background:white'><input type='text' value="<?php echo $ID;?>" name="cid" name="name" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
			</tr>
			<tr>
				<th>Firstname</th>
				<td style='background:white'><input type='text' value="<?php echo $fn555;?>" name="fn" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			<tr>
				<th>Middlename</th>
				<td style='background:white'><input type='text' value="<?php echo $mn555;?>" name="mn" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			<tr>
				<th>Lastname</th>
				<td style='background:white'><input type='text' value="<?php echo $ln555;?>" name="ln" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			<tr>
				<th>House No</th>
				<td style='background:white'><input type='text' value="<?php echo $hn;?>" name="houseno" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			<tr>
			<th>Location: </th>
				<td style='background:white'>
					<select name="address" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px">
					<?php
							$add2="SELECT * FROM tbladdress WHERE address_ID='$add'";
							$resadd2=mysqli_query($connect,$add2)or die(mysqli_error($connect));
							$rww2=mysqli_fetch_assoc($resadd2);
								$ai2=$rww2['address_ID'];
								$b2=$rww2['Barangay'];
								$m2=$rww2['Municipality'];
								$p2=$rww2['Province'];
						?>
						<option value="<?php echo $add?>"> <?php echo $b2." ".$m2." ".$p2?> </option>
						<?php
							$add="SELECT * FROM tbladdress";
							$resadd=mysqli_query($connect,$add)or die(mysqli_error($connect));
							while($rww=mysqli_fetch_assoc($resadd))
							{
								$ai=$rww['address_ID'];
								$b=$rww['Barangay'];
								$m=$rww['Municipality'];
								$p=$rww['Province'];
						?>
								<option value="<?php echo $ai;?>"><?php echo $ai." ".$b." ".$m." ".$p?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<th>Email</th>
				<td style='background:white'><input type="email" value="<?php echo $em;?>" name="email"  style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required></td>
			</tr>
			<tr>
				<th>Contact</th>
				<td style='background:white'><input type='number' value="<?php echo $con;?>" name="contact"style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required></td>
			</tr>
			<tr>
				<th>Username</th>
				<td style='background:white'><input type='text' value="<?php echo $us;?>" name="username"style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required></td>
			</tr>
			
		
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="submit" value="Done" name="btnupdate" style="background:lightblue;font-weight:bold;padding:5px;width:100px">Submit</button>
				<button type="submit" value="Cancel" name="btncancel" style="background:lightblue;font-weight:bold;padding:5px;width:100px">Cancel</button>
				<?php
					if($s==1)
					{
						echo
						"
						<button type='submit' value='Cancel' name='btnD' style='background:lightblue;font-weight:bold;padding:5px;width:100px'>Deactivate</button>
						";
					}else
					{
						echo
						"
						<button type='submit' value='Cancel' name='btnA' style='background:lightblue;font-weight:bold;padding:5px;width:100px'>Activate</button>
						";
					}
				?>
				</center>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
		</form>
    </div>

  </section>


<?php include 'includes/footer.php' ?>



<?php
		if(isset($_POST['btnupdate']))
			{
		
													
			$firstname = htmlspecialchars( $_POST['fn'], ENT_QUOTES, 'UTF-8');
			$middlename = htmlspecialchars( $_POST['mn'], ENT_QUOTES, 'UTF-8');
			$lastname = htmlspecialchars( $_POST['ln'], ENT_QUOTES, 'UTF-8');
			$houseno = htmlspecialchars( $_POST['houseno'], ENT_QUOTES, 'UTF-8');
			$address = htmlspecialchars( $_POST['address'], ENT_QUOTES, 'UTF-8');
			$email = htmlspecialchars( $_POST['email'], ENT_QUOTES, 'UTF-8');
			$contact = htmlspecialchars( $_POST['contact'], ENT_QUOTES, 'UTF-8');
			$username=$_POST['username'];
			$password = password_hash($firstname, PASSWORD_DEFAULT);
			
				
				$update="UPDATE tblplumber SET Fname='$firstname',Mname='$middlename',Lname='$lastname',address_ID='$address',house_no='$houseno',Email='$email',ContactNo='$contact', Password	='$password' WHERE plumber_ID='$id'";
				if($connect->query($update)){
				$_SESSION['success'] = 'Plumber Updated successfully';
				
				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Updated a Plumber')";
					$query = mysqli_query($connect,$insert);
				echo
				"
					<script>
						window.location='plumber.php';
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
									window.location='plumber.php';
								</script>
							";
					}

					if(isset($_POST['btnA']))
		{
			$activate="UPDATE tblplumber SET UserStatus='1' WHERE plumber_ID='$id'";
			if($connect->query($activate)){


				$_SESSION['success'] = 'Plumber Account Activated!';
				
				echo
			"
			<script>
				history.back();
			</script>
			";
			}
			
		}
		if(isset($_POST['btnD']))
		{
			$deactivate="UPDATE tblplumber SET UserStatus='0' WHERE plumber_ID='$id'";
			
			if($connect->query($deactivate)){

			$_SESSION['success'] = 'Plumber Account Deactivated!';

			echo
			"
			<script>
				history.back();
			</script>
			";
		}
	}

				
	?>

