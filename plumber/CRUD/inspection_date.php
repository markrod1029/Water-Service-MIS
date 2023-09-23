<link rel="icon" href="logo.png">
<?php
 include 'session.php';

 
if(isset($_POST["submit"]))
{
	$plumber_ID=$_POST['plumber_ID'];
	$schedule_ID=$_POST['schedule_ID'];
	$client_ID32=$_POST['client_ID'];
	$date=$_POST['date'];
	


	$client=mysqli_query($connect,"SELECT * FROM tblclients WHERE client_ID='$client_ID32' ")or die(mysqli_error($connect));
	$crw=mysqli_fetch_assoc($client);
	$email=$crw['ClientEmail'];
	$name= $crw['client_fname'].' '.$crw['client_mname'].' '. $crw['client_lname'] ;
	
	if(empty($date))
	{

		$_SESSION['error'] = 'Date is Empty!';


		echo
		"
			<script>
				window.location='../sched_inspection.php?cmp=$schedule_ID';
			</script>
		";
	}else
	{
		$invalid=mysqli_query($connect,"SELECT * FROM inspection_schedule_for_registration_approval WHERE date='$date' and plumber_ID='$plumber_ID' ")or die(mysqli_error($connect));
		$rw=mysqli_num_rows($invalid);
		if($rw>0)
		{

			$_SESSION['error'] = "Entered Date ($date) Unavailable!";

			
			$name = $user['Fname'].' '.$user['Mname'].' '.$user['Lname']; 
			$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Plumber',   NOW(),  'Inspection Date ($date) Unavailable')";
				$query = mysqli_query($connect,$insert);
	


			echo
			"
				<script>
					window.location='../complaints.php?cmp=$complaint_ID';
				</script>
			";
			return false;
		}
        
        
        else
		{
			 
            $sql = "UPDATE inspection_schedule_for_registration_approval SET inspect_status='1', sched_visited='$date' WHERE schedule_ID='$schedule_ID'";
			if($connect->query($sql)){

			
			require("PHPMailer-Master/src/PHPMailer.php");
			require("PHPMailer-Master/src/SMTP.php");



			$mailto= $email;
			$body="Dear Ma'am/Sir ".$name.";\nWe have already received your application. This is a formal notice for the inspection in your area that has been scheduled for".$date."\n Assigned plumber: Leandro A. Hakdog After the inspection in your area, we will notify you immediately if your application is approved.
            Thanks for your understanding
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
			$mail->Subject= "URBIZTONDO WATER SERVICES (Complaint Response)";
			$mail->Body= $body;
			if(!$mail->send())
			{
			
				
			$_SESSION['error'] = "Mailer Error".$mail->ErrorInfo;;

				
			}else
			{
				
			$_SESSION['success'] = "Successfully Scheduled ($date) and Sent to Client!";
				 

			
			$name = $user['Fname'].' '.$user['Mname'].' '.$user['Lname']; 
			$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Plumber',   NOW(),  'Successfully Scheduled ($date) and Sent to Client')";
				$query = mysqli_query($connect,$insert);

			echo
			"
				<script>
					window.location='../inspections.php';
				</script>
			";
			}

			}

            else{
				$_SESSION['error'] = $connect->error;
			}

            
			
		}
		
		
	}
}



?>
