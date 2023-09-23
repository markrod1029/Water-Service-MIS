
<?php

if(isset($_POST['submit']))
{

	$id = $_GET['cmp'];


    
	$kunin=mysqli_query($connect,"SELECT * FROM  inspection_schedule_for_registration_approval 
    LEFT JOIN tblclients ON tblclients.client_ID = inspection_schedule_for_registration_approval.client_ID
    WHERE inspection_schedule_for_registration_approval.schedule_ID='$id' ")or die(mysqli_error($connect));
	$k=mysqli_fetch_assoc($kunin);
	$email=$k['ClientEmail'];
	$name= $k['client_fname'].' '.$k['client_mname'].' '. $k['client_lname'] ;


	$sql = "UPDATE inspection_schedule_for_registration_approval SET inspected='1', date_install = NOW() WHERE schedule_ID='$id'";
			if($connect->query($sql)){

		$name = $user['Fname'].' '.$user['Mname'].' '.$user['Lname']; 
		$insert = "INSERT INTO activity( name, position,  time_loged, status)
			VALUES( '$name', 'Plumber',   NOW(),  'Visited and Installed')";
			$query = mysqli_query($conn,$insert);
            
			require("PHPMailer-Master/src/PHPMailer.php");
			require("PHPMailer-Master/src/SMTP.php");
			
			$mailto= $email;
			$body="Dear Ma'am/Sir ".$name.";\n \nwe notice that you successfully paid your application and membership fee to the cashier.\n
            Your installation of a water line has been scheduled for ".$date.".\n
            Have a great day";
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
			$mail->Subject= "URBIZTONDO WATER SERVICES (Installation Response)";
			$mail->Body= $body;
			if(!$mail->send())
			{
			
				
			$_SESSION['error'] = "Mailer Error".$mail->ErrorInfo;;

				
			}else
			{
				
		$_SESSION['success'] = 'Marked Visited and Installed The Client!';


                echo
                "
                <script>
                window.location='inspections.php';
                </script>
                ";
			}
		
	}

	else{
		$_SESSION['error'] = $connect->error;
	}
	


    header('location:../inspections.php');
    
}

?>