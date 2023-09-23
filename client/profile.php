<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "profile"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:lightblue'>Client</li>
      <li style='color:lightblue'>Profile</li>
      <li style='color:darkblue'>Update Profile</li>
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

      
    <center>    
    <div class="image">
        <img src="../upload/ClientPicture/<?php echo $user['picture']; ?>" class="img-circle elevation-2 d-flex " style="height:110px; width:120px; margin-top:10px;  margin-bottom:10px;  border-radius: 50%;" >
      </div>

</center>



    <div class="card has-table"></div>

    <form method="POST" enctype='multipart/form-data'>
	
    
		<table>
			<tr>
				<th>Meter No</th>
				<td style='background:white'><input type='text' value="<?php echo $user["meter_no"];;?>" name="mno" name="name" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
			</tr>
            <tr>
				<th>First Name</th>
				<td style='background:white'><input type='text' name="fname" value="<?php echo $user["client_fname"];;?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
            <tr>
				<th>Middle Name</th>
				<td style='background:white'><input type='text' name="mname" value="<?php echo $user["client_mname"];;?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
            <tr>
				<th>Last Name</th>
				<td style='background:white'><input type='text' name="lname" value="<?php echo $user["client_lname"];;?>"style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>

			<th>Addresss</th>

				<?php
							$address = $user["address_ID"];
							$add="SELECT * FROM tbladdress WHERE address_ID = '$address'";
							$resadd=mysqli_query($connect,$add)or die(mysqli_error($connect));
							while($row=mysqli_fetch_assoc($resadd))
							{
								$ai=$row['address_ID'];
								$b=$row['Barangay'];
								$m=$row['Municipality'];
								$p=$row['Province'];
						?>
							<td style='background:white'><input type='text'  value="<?php echo $ai." ".$b." ".$m." ".$p?>"  name="houseno" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>

						<?php
							}
						?>
			</tr>

			
			<tr>
				<th>House No</th>
				<td style='background:white'><input type='text'  value="<?php echo $user["House_No"];;?>"  name="houseno" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			<tr>
				
			<tr>
			<th>Location: </th>
				<td style='background:white'>
					<select name="address" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px">
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
				<td style='background:white'><input type="email" value="<?php echo$user["ClientEmail"];;?>" name="email"  style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required></td>
			</tr>
			<tr>
				<th>Contact</th>
				<td style='background:white'><input type='number' value="<?php echo $user["Contact"]; ?>" name="contact"style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required></td>
			</tr>
			
			<tr>
				<th>Password</th>
				<td style='background:white'><input type='password' value="<?php echo $user['Password'];?>"   name="pass" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required></td>
			</tr>
		
			<tr>
				<th>Upload Images</th>
				<td style='background:white'><input type='file'  value="<?php echo $user['picture'];?>"  name="image3[]" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" ></td>
			</tr>
		
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="submit" value="Done" name="btnupdate" style="background:lightblue;font-weight:bold;padding:5px;width:100px">Submit</button>
				<button type="button"  style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="window.location.href='home.php'">Cancel</button>
				</center>
				</td>
			</tr>
			
		</table>
		</form>
    </div>

  </section>


<?php include 'includes/footer.php' ?>


<?php
if(isset($_POST['btnupdate']))
			{
				$mno=$_POST['mno'];
				$fname=$_POST['fname'];
				$mname=$_POST['mname'];
				$lname=$_POST['lname'];
				$houseno=$_POST['houseno'];
				$address=$_POST['address'];
				$email=$_POST['email'];
				$contact=$_POST['contact'];
				$pass=$_POST['pass'];

                $name = $fname.' '.$mname.' '.$lname; 
				
                
			$output_dir3 = "../upload/ClientPicture";/* Path for file upload */
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



				if( empty($NewImageName3) ){

				$update="UPDATE tblclients SET meter_no='$mno', client_fname='$fname', client_mname='$mname', client_lname='$lname',address_ID='$address',House_No='$houseno',ClientEmail='$email',Contact='$contact', Password='$pass'  WHERE meter_no='$mno'";
			if($connect->query($update)){
				$_SESSION['success'] = 'Client Updated successfully';


				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Updated a Client')";
					$query = mysqli_query($connect,$insert);

						
			}

			else{
				$_SESSION['error'] = $connect->error;
			}

			}

            else{

                $update="UPDATE tblclients SET meter_no='$mno', client_fname='$fname', client_mname='$mname', client_lname='$lname',address_ID='$address',House_No='$houseno',ClientEmail='$email',Contact='$contact', Password='$pass' , picture='$NewImageName3' WHERE meter_no='$mno'";
                if($connect->query($update)){
                    $_SESSION['success'] = 'Client Updated successfully';
    
    
                    $insert = "INSERT INTO activity( name, position,  time_loged, status)
                        VALUES( '$name', 'Admin',   NOW(),  'Updated a Client')";
                        $query = mysqli_query($connect,$insert);
    
                            
                }
    
                else{
                    $_SESSION['error'] = $connect->error;
                }
    

            }

            echo
            "
                <script>
                    window.location='profile.php';
              </script>
            ";	  
		}
		?>