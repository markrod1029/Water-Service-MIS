<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "plumber"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
    <li style='color:black'>Admin</li>
      <li style='color:black'>Plumbers</li>
      <li style='color:black'>Add Plumber</li>
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
 	
 	

    <div class="card has-table" style='color:blue' >
    <form method="POST" enctype='multipart/form-data'>
    <table>
			<tr>
				<th>Firstname</th>
				<td style='background:white'><input type='text' name="fn" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			<tr>
				<th>Middlename</th>
				<td style='background:white'><input type='text' name="mn" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"></td>
			</tr>
			<tr>
				<th>Lastname</th>
				<td style='background:white'><input type='text' name="ln" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			<tr>
				<th>House No</th>
				<td style='background:white'>
				<input type='number' name="houseno" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" >
				</td>
			</tr>
			<tr>
				<th>Address</th>
				<td style='background:white'>
					<select name="address" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px">
						<option>Select Plumber Address</option>
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
				<td style='background:white'><input type='email' name="email" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required></td>
			</tr>
			<tr>
				<th>Contact No</th>
				<td style='background:white'><input type='tel' name="contact" minlength="11" maxlength="11" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required></td>
			</tr>

			<tr>
				<th>Position</th>
				<td style='background:white'>
					<select name="position" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px">
						<option value ="plumber" >Administrative Aide 1 - Plumber</option>
						<option value ="clerk" >Administrative Aide 1 - Customer Account Clerk</option>
			
					</select>
				</td>


			</tr>
			<tr>
				<th>Upload Images</th>
				<td style='background:white'><input type='file' name="image3[]" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" ></td>
			</tr>

			
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
				<button type="button" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="window.location.href='plumber.php'">Cancel</button>
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


<?php
		if(isset($_POST['submit']))
		{
			$admin=$user['admin_ID'];
			$fn = htmlspecialchars( $_POST['fn'], ENT_QUOTES, 'UTF-8');
			$mn = htmlspecialchars( $_POST['mn'], ENT_QUOTES, 'UTF-8');
			$ln = htmlspecialchars( $_POST['ln'], ENT_QUOTES, 'UTF-8');
			$hn = htmlspecialchars( $_POST['houseno'], ENT_QUOTES, 'UTF-8');
			$address = htmlspecialchars( $_POST['address'], ENT_QUOTES, 'UTF-8');
			$email = htmlspecialchars( $_POST['email'], ENT_QUOTES, 'UTF-8');
			$contact = htmlspecialchars( $_POST['contact'], ENT_QUOTES, 'UTF-8');
			$position = htmlspecialchars( $_POST['position'], ENT_QUOTES, 'UTF-8');
			$password = password_hash($fn, PASSWORD_DEFAULT);
			
			
			


			
			$output_dir3 = "../upload/plumber";/* Path for file upload */
			$ImageName3      = str_replace(' ','-',strtolower($_FILES['image3']['name'][0]));
			$ImageType3      = $_FILES['image3']['type'][0];
														
			$ImageExt3 = substr($ImageName3, strrpos($ImageName3, '.'));
			$ImageExt3       = str_replace('.','',$ImageExt3);
			$ImageName3      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName3);
			$NewImageName3 = $ImageName3.$ImageExt3;
			$ret3[$NewImageName3]= $output_dir3.$NewImageName3;
															
			/* Try to create the directory if it does not exist */
			if (!file_exists($output_dir3))
			{
				@mkdir($output_dir3, 0777);
			}               
			move_uploaded_file($_FILES["image3"]["tmp_name"][0],$output_dir3."/".$NewImageName3 );





			$email2=mysqli_query($connect,"SELECT * FROM tblplumber WHERE Email='$email'")or die(mysqli_error($connect));
			$emrow=mysqli_num_rows($email2);
			if($emrow>0)
			{

				$_SESSION['error'] = 'Email Already Exist!';
				return false;
			}
			
			$cn=mysqli_query($connect,"SELECT * FROM tblplumber WHERE ContactNo='$contact'")or die(mysqli_error($connect));
			$cnrow=mysqli_num_rows($cn);
			if($cnrow>0)
			{

				$_SESSION['error'] = 'ContactNo Already Exist!';
				
				return false;
			}


			$clerk=mysqli_query($connect,"SELECT * FROM tblplumber WHERE position='$position'")or die(mysqli_error($connect));
			$clerkrow=mysqli_num_rows($cn);
			if($clerkrow>0)
			{

				$_SESSION['error'] = 'Clerk Already Exist!';
				
				return false;
			}
			
			else
			{


				$add="INSERT INTO tblplumber(Fname,Mname,Lname,house_no, address_ID,Email, ContactNo, RegDate,Password,position,UserStatus,images,admin_ID)
				VALUES('$fn','$mn','$ln','$hn','$address','$email','$contact',NOW(),'$fn','$position,1,'$NewImageName3','$admin')";
				$resadd=mysqli_query($connect,$add)or die((mysqli_error($connect)));
				


				$_SESSION['success'] = 'Added Plumber Succesfully!';


				if($position = 'plumber'){
					echo
					"
						<script>
							window.location='plumber.php';
						</script>
					";
				}
				else{

					echo
					"
						<script>
							window.location='clerk.php';
						</script>
					";
				}
				
				
			}
		}
		?>
<?php include 'includes/footer.php' ?>
