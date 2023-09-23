<link rel="icon" href="logo.png">
<?php
 include 'session.php';

if(isset($_POST['submit']))
		{




            $date = $_POST['date'];
            $id = $_POST['schedule_ID'];
            $id = $_POST['schedule_ID'];
            // $status = $_POST['status'];
            $meter_no = $_POST['meter_no'];
            $client = $_POST['c'];

            $kunin=mysqli_query($connect,"SELECT * FROM  inspection_schedule_for_registration_approval 
            LEFT JOIN tblclients ON tblclients.client_ID = inspection_schedule_for_registration_approval.client_ID
            WHERE inspection_schedule_for_registration_approval.schedule_ID='$id' ")or die(mysqli_error($connect));
            $k=mysqli_fetch_assoc($kunin);
            $email=$k['ClientEmail'];
            $fullname= $k['client_fname'].' '.$k['client_mname'].' '. $k['client_lname'] ;

			$update=mysqli_query($connect,"UPDATE tblclients SET meter_no = '$meter_no' WHERE client_ID='$client'")or die(mysqli_error($connect));

            $sql = "UPDATE inspection_schedule_for_registration_approval SET  sentToPlumber='1', date_install='$date' WHERE schedule_ID ='$id'";
			if($connect->query($sql)){

			   $name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

			   $insert = "INSERT INTO activity( name, position,  time_loged, status)
				   VALUES( '$name', 'Admin',   NOW(),  'Approved The Inspection')";
				   $query = mysqli_query($connect,$insert);


        
               	
                    require 'PHPMailer/class.phpmailer.php';
                   $mailto= $email;
                   $body="Dear Ma'am/Sir ".$fullname.";\n \nWe notice that you successfully paid your application and membership fee to the cashier. Your installation of a water line has been scheduled for ". date('F j, Y', strtotime($date)).".\n
                   Have a great day";
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
                   $mail->Subject= "URBIZTONDO WATER SERVICES (Installation Response)";
                   $mail->Body= $body;
                   if(!$mail->send())
                   {
                   
                       
                   $_SESSION['error'] = "Mailer Error".$mail->ErrorInfo;;
       
                       
                   }else
                   {
                       
               $_SESSION['success'] = 'Successfully send to plumber and ready for installation';
       
       
                       echo
                       "
                       <script>
                       window.location='../approved-inspections.php';
                       </script>
                       ";
                   }
               
      
 
           
               echo
               "
               <script>
               window.location='../approved-inspections.php';
               </script>
               ";



           }
       
           else{
               $_SESSION['error'] = $connect->error;
           }

     

  }
      
	

?>