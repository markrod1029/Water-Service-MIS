<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "complaint"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:lightblue'>Client</li>
      <li style='color:lightblue'>Complaints</li>
      <li style='color:darkblue'>Client Complaints</li>
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

<div class="colm-form">

<div class="form-container">
  <center>
		<div class="col" ><img src="../images/logo.png" width="80px" height="80px" style="margin-bottom:5px" >

<h3 class="login"style="margin-bottom:25px">Complaint</h3>
</center>


<form  method="POST">
			

			<label style="margin-bottom:-15px">Complaint</label>
			<select type = "text" class="form-control" name="they_complaint" id="position" style="margin-bottom:15px" required>

			<?php
						$add="SELECT * FROM complaint_category";
						$resadd=mysqli_query($connect,$add)or die(mysqli_error($connect));
						while($rww=mysqli_fetch_assoc($resadd))
						{

							
							$ai=$rww['category_ID'];
							$b=$rww['category'];
					?>
							<option value="<?php echo $ai;?>"> <?php echo $b?></option>

					<?php
						}
					?>

         

            </select>


			<textarea type="text" placeholder="what's your complaint"  name="complaint"   height="50" style="margin-bottom:25px" required></textarea>
			<button class="btn-login" name="submit">Submit</button>

</form>
		</div>
	</div>
</div>



  </section>


<?php include 'includes/footer.php' ?>


<?php
	

	require("PHPMailer-Master/src/PHPMailer.php");
	require("PHPMailer-Master/src/SMTP.php");

	
if(isset($_POST['submit']))
		{
		    
		    

			$today = date("Y-m-d");
			$id=$user['client_ID'];
			$tcom=$_POST['they_complaint'];
			$com=$_POST['complaint'];
			$email=$user['ClientEmail'];
			$fullname=$user['client_fname'].' '.$user['client_mname'].' '.$user['client_lname'];
			

			$view = "SELECT * from tblcomplaints where client_ID = '$id' AND Date = '$today'";
			$result = $connect->query($view);
			echo $result->num_rows ;
			if ($result->num_rows >= 1) {

				
				$_SESSION['error'] = "Already Complaint Today Try Next Day";
				"
				<script>
					window.location='complaints.php';
				</script>
			";
	

			}

		
			else{

			$add="INSERT INTO tblcomplaints(client_ID, Date, they_complaint, complaint) VALUES('$id', NOW(), '$tcom','$com')";
			if($connect->query($add)){

				$_SESSION['success'] = 'Complaint Successfully Send to Admin';

				$name = $user['client_fname'].' '.$user['client_mname'].' '.$user['client_lname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Client',   NOW(),  'Send  Complaint')";
				$query = mysqli_query($connect,$insert);




				
$mailto= $email;
$body="Dear Ma'am/Sir ".$fullname.";\n \nYour concern has been received. Your concern or complaint will be addressed as soon as possible. Thank you very much!
We sincerely apologize for any inconvenience these issues may have caused you. \n

Please don't hesitate to contact us if you need further assistance. Thank you for taking the time to provide us with valuable feedback.
Sincerely, 

Customer Service
";
$mail= new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host= "mail.smtp2go.com";
$mail->SMTPAuth= true;
$mail->Username="psu.edu.ph";
$mail->Password="Jmt564956495649";
$mail->SMTPSecure="tls";
$mail->Port="2525";
$mail->From="jhonhelterrado@gmail.com";
$mail->FromName="JMT";
$mail->addAddress($mailto,"JMT");
$mail->isHTML= true;
$mail->Subject= "URBIZTONDO WATER SERVICES (Approve the Application)";
$mail->Body= $body;
if(!$mail->send())
{


$_SESSION['error'] = "Mailer Error".$mail->ErrorInfo;;


}else
{

 
echo
"
<script>
	window.location='complaints.php';
</script>
";
}


				echo
				"
					<script>
						window.location='complaints.php';
					</script>
				";
			}

			else{
				$_SESSION['error'] = $connect->error;
			}
	
	
		}

		"
			<script>
				window.location='complaints.php';
			</script>
		";



			
		}
		?>

