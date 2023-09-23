<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "client"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Clients</li>
      <li style='color:black'>Edit Client Information</li>
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

    <form method="POST" >
		<?php

            $id = $_GET['id'];
			$client="SELECT * FROM tblclients WHERE client_ID='$id' ";
			$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
			while($rw=mysqli_fetch_assoc($res))
			{
               
		?>
		<table>
			<tr>
				<th>Meter No</th>
				<td style='background:white'><input type='text' value="<?php echo $rw["meter_no"];;?>" name="mno" name="name" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
			</tr>
            <tr>
				<th>First Name</th>
				<td style='background:white'><input type='text' name="fname" value="<?php echo $rw["client_fname"];;?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
            <tr>
				<th>Middle Name</th>
				<td style='background:white'><input type='text' name="mname" value="<?php echo $rw["client_mname"];;?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"></td>
			</tr>
            <tr>
				<th>Last Name</th>
				<td style='background:white'><input type='text' name="lname" value="<?php echo $rw["client_lname"];;?>"style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			<tr>
				<th>House No</th>
				<td style='background:white'><input type='text'  value="<?php echo $rw["House_No"];;?>"  name="houseno" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"></td>
			</tr>
			<tr>
			<th>Address </th>
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
								<option value="<?php echo $ai;?>"><?php echo 	$b." ".$m." ".$p?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<th>Email</th>
				<td style='background:white'><input type="email" value="<?php echo$rw["ClientEmail"];;?>" name="email"  style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required></td>
			</tr>
			<tr>
				<th>Contact</th>
				<td style='background:white'><input type='number' value="<?php echo $rw["Contact"]; ?>" name="contact"style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required></td>
			</tr>
			<tr>
				<th>Classification</th>
				<td style='background:white'>
				<select name='classification' style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				<option value="Residential">Non-Residential </option>
				<option value="Residential">Non-Residential </option>
				<option value="Residential">Establishment </option>
				<option value="Residential">Residential </option>
			</select>	
			</td>
			</tr>
			
			<tr>

			<?php
						if($rw["Status"]==1 || $rw["Status"]==5)
					{
					?>
 
				<th>Status: </th>
				<td>
					<?php
						if($rw["Status"]==1)
					{
					?>
						<input type='radio' value="1" name='status' checked> Active &ensp;
						<input type='radio' value="5" name='status' > Blocked
					<?php
					}else
						{
					?>
						<input type='radio' value="1" name='status' > Active &ensp; 
						<input type='radio' value="5" name='status' checked> Blocked<br>
					<?php
						}
					?>
				</td>
			</tr>


			
			<?php
					}else
						{
					?>
					<?php
						}
					?>
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="submit" value="Done" name="btnupdate" style="background:lightblue;font-weight:bold;padding:5px;width:100px">Submit</button>
				<a type="submit" value="Cancel"href="clients.php" style="background:lightblue;font-weight:bold;padding:5px;width:100px">Cancel</a>
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
error_reporting(0);
if(isset($_POST['btnupdate']))
			{
				$fname = htmlspecialchars( $_POST['fname'], ENT_QUOTES, 'UTF-8');
			$mname = htmlspecialchars( $_POST['mname'], ENT_QUOTES, 'UTF-8');
			$lname = htmlspecialchars( $_POST['lname'], ENT_QUOTES, 'UTF-8');
			$houseno = htmlspecialchars( $_POST['houseno'], ENT_QUOTES, 'UTF-8');
			$address = htmlspecialchars( $_POST['address'], ENT_QUOTES, 'UTF-8');
			$contact = htmlspecialchars( $_POST['contact'], ENT_QUOTES, 'UTF-8');
			$email = htmlspecialchars( $_POST['email'], ENT_QUOTES, 'UTF-8');
				$status=$_POST['status'];
                $name = $fname.' '.$mname.' '.$lname; 
				$classification=$_POST['classification'];
				$mno=$_POST['mno'];

            $password = password_hash($fname, PASSWORD_DEFAULT);
													
				$update="UPDATE tblclients SET client_fname='$fname', client_mname='$mname', client_lname='$lname',address_ID='$address',House_No='$houseno',ClientEmail='$email',Contact='$contact', classification= '$classification', password= '$password', Status='$status' WHERE meter_no='$mno'";
			if($connect->query($update)){
				$_SESSION['success'] = 'Client Updated successfully';

				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Updated a Client')";
					$query = mysqli_query($connect,$insert);

					
           
			
			}

			else{
				$_SESSION['error'] = $connect->error;
			}




            echo
            "
                <script>
                    window.location='clients.php';
              </script>
            ";	
	
		
		}