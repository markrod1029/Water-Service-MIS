<link rel="icon" href="logo.png">
<?php
 include 'session.php';

 
if(isset($_POST["submit"]))
{
	@$plumber_ID=$_GET['plumber_ID'];
	@$complaint_ID=$_GET['complaint_ID'];
	@$client_ID32=$_GET['client_ID'];
	@$date=$_POST['date'];
	@$visited='0';
	
	$client=mysqli_query($connect,"SELECT * FROM tblclients WHERE client_ID='$client_ID32' ")or die(mysqli_error($connect));
	$crw=mysqli_fetch_assoc($client);
	$email=$crw['ClientEmail'];
	$name=$crw['ClientName'];
	
	if(empty($date))
	{

		$_SESSION['error'] = 'Date is Empty!';


		echo
		"
			<script>
				window.location='../setschedule.php?cmp=$complaint_ID';
			</script>
		";
	}else
	{
		$invalid=mysqli_query($connect,"SELECT * FROM inspection_schedule_for_complaints WHERE date='$date' and plumber_ID='$plumber_ID' ")or die(mysqli_error($connect));
		$rw=mysqli_num_rows($invalid);
		if($rw>0)
		{

			
		$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

		$insert = "INSERT INTO activity( name, position,  time_loged, status)
			VALUES( '$name', 'Admin',   NOW(),  ' Complaint Date ($date) Unavailable')";
			$query = mysqli_query($connect,$insert);
			
			$_SESSION['error'] = "Entered Date ($date) Unavailable!";

			
			echo
			"
				<script>
					window.location='../setschedule.php?cmp=$complaint_ID';
				</script>
			";
			return false;
		}else
		{
			$set=mysqli_query($connect, "INSERT INTO inspection_schedule_for_complaints(complaint_ID,plumber_ID,date,visited)
			VALUES('$complaint_ID','$plumber_ID','$date','0')
			")or die(mysqli_error($connect));
			
			$update=mysqli_query($connect,"UPDATE tblcomplaints SET Complaint_Status ='1', scheduled = '1' WHERE complaint_ID='$complaint_ID'")or die(mysqli_error($connect));
			

			$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

			$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Admin',   NOW(),  ' Complaint Succesfuly Complete')";
				$query = mysqli_query($connect,$insert);
			
				

			
            require 'PHPMailer/class.phpmailer.php';
			
			$mailto= $email;
			$body="Dear Ma'am/Sir ".$name.";\n \nYour concern has been received. Your concern or complaint will be addressed and scheduled for inspection.\n Your Schedule: ".$date."\n Thank you very much!";
            $mail = new PHPMailer(true); 

        	$mail->IsSMTP();                           
        	$mail->SMTPAuth   = false;                 
        	$mail->Port       = 25;                    
        	$mail->Host       = "localhost"; 
        	$mail->Username   = "luz22@uws-mis.online";   
        	$mail->Password   = "buaya22";            
        	$mail->IsSendmail();  
        	$mail->From       = "luz22@uws-mis.online";
        	$mail->FromName   = "Urbiztondo Water Service";
        	$mail->AddAddress($email);
        	$mail->WordWrap   = 80; 
            $mail->isHTML= true;
			$mail->Subject= "URBIZTONDO WATER SERVICES (Complaint Response)";
			$mail->Body= $body;
			if(!$mail->send())
			{
			
				
			$_SESSION['error'] = "Mailer Error".$mail->ErrorInfo;;

				
			}else
			{
				
			$_SESSION['success'] = "Successfully Scheduled ($date) and Sent to Client!";
				 
			
			$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

			$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Admin',   NOW(),  'Successfully Scheduled ($date) and Sent to Client')";
				$query = mysqli_query($connect,$insert);
			
			echo
			"
				<script>
					window.location='../scheduled-complaints.php';
				</script>
			";
			}
			
		}
		
		
	}
}



?>
