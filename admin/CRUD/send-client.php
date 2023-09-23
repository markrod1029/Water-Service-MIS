<link rel="icon" href="logo.png">
<?php
 include 'session.php';

require 'PHPMailer/class.phpmailer.php';



 
if(isset($_POST['submit']))
{
	$admin=$user['admin_ID'];
	$client111=$_POST['c'];
	$insdate= date('Y-m-d');
	$plumber=$_POST['plumber'];
	$email=$_POST['email'];
	$fullname=$_POST['fullname'];
	


	
	$qry="SELECT * FROM tblplumber WHERE plumber_ID = '$plumber'";
	$query = $connect->query($qry) ;
	$num=mysqli_num_rows($query);

	while($row1 = $query->fetch_assoc()){
		$plumbername = $row1['Fname']. ' '.$row1['Mname'].' '.$row1['Lname'] ;
	}


	$valid3=mysqli_query($connect,"SELECT * FROM inspection_schedule_for_registration_approval WHERE client_ID='$client111' AND inspected='0' ")or die(mysqli_error($connect));
	$vc3=mysqli_num_rows($valid3);
	if($vc3>=1)
	{

		$_SESSION['error'] = 'Pending Client Already Scheduled!';

		
		echo
		"
		<script>
		window.location='../pending-clients.php';
	</script>
		";
		return false;
	}
	
	
	$valid=mysqli_query($connect,"SELECT * FROM inspection_schedule_for_registration_approval WHERE plumber_ID='$plumber'  AND inspected='0'")or die(mysqli_error($connect));
	$vc=mysqli_num_rows($valid);
	if($vc>=3)
	{

		echo
		"
		<script>
		window.location='../pending-clients.php';
	</script>
		";

	
		return false;
	}
	
	$valid2=mysqli_query($connect,"SELECT * FROM inspection_schedule_for_registration_approval WHERE date='$insdate' AND inspected='0'")or die(mysqli_error($connect));
	$vc2=mysqli_num_rows($valid2);
	if($vc2>=3)
	{
		

		$_SESSION['error'] = 'Client Already Scheduled!';

		
		echo
		"
		<script>
		window.location='../pending-clients.php';
	</script>
		";

		return false;
	}
	
	else if($insdate&&$plumber&&$client111)
	{
		$sched=mysqli_query($connect,"INSERT INTO inspection_schedule_for_registration_approval (date,plumber_ID,client_ID,inspected,sentToPlumber,avail_status)
		VALUES('$insdate','$plumber','$client111',0,1,1)
		")or die(mysqli_error($connect));
		
	
        $c=mysqli_query($connect,"UPDATE tblclients SET  Viewed='1',scheduled='1',admin_ID = '$admin' WHERE client_ID='$client111'")or die(mysqli_error($connect));

		$_SESSION['success'] = 'Successfully!';
	
		echo
		"
			<script>
					window.location='../pending-clients.php';
			</script>
		";



		
		$insert = "INSERT INTO activity( name, position,  time_loged, status)
		VALUES( '$name', 'Admin',   NOW(),  'Send to a Plumber a Pending Client')";
		$query = mysqli_query($connect,$insert);


$_SESSION['success'] = ' Successfully';
$mailto= $email;
$body="Dear Ma'am/Sir ".$fullname.";\n \nWe have already received your application. This is a formal notice for the inspection in your area that has been scheduled for".$insdate.".
 Assigned plumber:".$plumbername.". After the inspection in your area, we will notify you immediately if your application is approved.
Thanks for your understanding.

";
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
$mail->Subject= "URBIZTONDO WATER SERVICES (Approve the Application)";
$mail->Body= $body;
if(!$mail->send())
{


$_SESSION['error'] = "Mailer Error".$mail->ErrorInfo;;
echo
"
<script>
	window.location='../pending-clients.php';
</script>
";

}else
{

 
echo
"
<script>
	window.location='../pending-clients.php';
</script>
";
}


	}
}




 
echo
"
<script>
	window.location='../pending-clients.php';
</script>
";