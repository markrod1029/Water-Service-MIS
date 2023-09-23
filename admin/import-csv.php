<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "client"; include 'includes/leftbar.php' ?>
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

    <form method="POST"  enctype='multipart/form-data'>
		<table>

       
            
			
			<tr>
				<th>Import CSV</th>
				<td  style='background:white'><input type="file" name="image3[]" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"   required /></td>
													</tr>
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
				<button type="button" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="window.location.href='clients.php'">Cancel</button>
				</center>
				</td>
			</tr>
		</table>
		</form>
    </div>

  </section>
  <br><br><br><br><br><br><br><br><br><br><br><br>


<?php include 'includes/footer.php' ?>


<?php
		if(isset($_POST['submit']))
		{
		
			$fname=$_POST['fname'];
			$mname=$_POST['mname'];
			$lname=$_POST['lname'];
			$hn=$_POST['houseno'];
			$address=$_POST['address'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$status=0;

				$numbers = '';
					
				for($i = 0; $i < 10; $i++){
					$numbers .= $i;
				}
				$mno = substr(str_shuffle($numbers), 0, 9);
				//


				
$output_dir3 = "../upload/ClientPicture";/* Path for file upload */
$RandomNum3   = time();
$ImageName3      = str_replace(' ','-',strtolower($_FILES['image3']['name'][0]));
$ImageType3      = $_FILES['image3']['type'][0];
											 
$ImageExt3 = substr($ImageName3, strrpos($ImageName3, '.'));
$ImageExt3       = str_replace('.','',$ImageExt3);
$ImageName3      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName3);
$NewImageName3 = $ImageName3.'-'.$RandomNum3.'.'.$ImageExt3;
$ret3[$NewImageName3]= $output_dir3.$NewImageName3;
												
/* Try to create the directory if it does not exist */
if (!file_exists($output_dir3))
{
	@mkdir($output_dir3, 0777);
}               
move_uploaded_file($_FILES["image3"]["tmp_name"][0],$output_dir3."/".$NewImageName3 );


$qry="SELECT * FROM admin";
$query = $connect->query($qry) ;
$num=mysqli_num_rows($query);

while($row1 = $query->fetch_assoc()){
	$admin = $row1['admin_ID'];
}


    $validemail="SELECT * FROM tblclients WHERE ClientEmail='$email'";
	$resvalidemail=mysqli_query($connect,$validemail)or die(mysqli_error($connect));
	$countvalidemail=mysqli_num_rows($resvalidemail);
	if($countvalidemail>0)
	{

    $_SESSION['error'] = 'Email Already Exist!';

		echo
		"
			<script>
				history.back();
			</script>
		";
		return false;
	}
	
	else{
	    
	
	
			$add="INSERT INTO tblclients(meter_no,client_fname,client_mname,client_lname,House_No, address_ID, ClientEmail, Contact, application,  RegDate,password, Status, picture, chat_status, admin_ID)
			VALUES('$mno','$fname','$mname','$lname','$hn','$address','$email','$contact', 'New Applicant', NOW(), '$mno', '$status', '$NewImageName3', 'Offline Now', '$admin')";
			if($connect->query($add)){
				$_SESSION['success'] = 'Client Added successfully';
				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Added as a new Client')";
					$query = mysqli_query($connect,$insert);

				echo
				"
					<script>
						window.location='clients.php';
					</script>
				";
			}

			else{
				$_SESSION['error'] = $connect->error;
			}

				
		}
		}
		?>