<link rel="icon" href="logo.png">
<?php
 include 'session.php';

if(isset($_POST['submit']))
		{



            $client = $_POST['c'];
            $id = $_POST['schedule_ID'];
            $status = $_POST['status'];

            $kunin=mysqli_query($connect,"SELECT * FROM  inspection_schedule_for_registration_approval 
            LEFT JOIN tblclients ON tblclients.client_ID = inspection_schedule_for_registration_approval.client_ID
            WHERE inspection_schedule_for_registration_approval.schedule_ID='$id' ")or die(mysqli_error($connect));
            $k=mysqli_fetch_assoc($kunin);
            $email=$k['ClientEmail'];
            $fullname= $k['client_fname'].' '.$k['client_mname'].' '. $k['client_lname'] ;

            

            if($status == 1)

            {


            $sql = "UPDATE inspection_schedule_for_registration_approval SET  sentToPlumber='0',   inspection_installation = '1' WHERE schedule_ID ='$id'";
			if($connect->query($sql)){

			   $name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

			   $insert = "INSERT INTO activity( name, position,  time_loged, status)
				   VALUES( '$name', 'Admin',   NOW(),  'Approved The Inspection')";
				   $query = mysqli_query($connect,$insert);


        
               	
            //         require 'PHPMailer/class.phpmailer.php';
            //        $mailto= $email;
            //        $body="Dear Ma'am/Sir ".$fullname.";\n \nThe result of the inspection has been successfully approved. We advise you to pay your application and membership fee to the cashier to set the schedule for installation of the water line. Thank you.";
            //         $mail = new PHPMailer(true); 
            //     	$mail->IsSMTP();                           
            //     	$mail->SMTPAuth   = false;                 
            //     	$mail->Port       = 25;                    
            //     	$mail->Host       = "localhost"; 
            //     	$mail->Username   = "luz22@uws-mis.online";   
            //     	$mail->Password   = "buaya22";            
            //     	$mail->IsSendmail();  
            //     	$mail->From       = "luz22@uws-mis.online";
            //     	$mail->FromName   = "Urbiztondo Water Service";
            //     	$mail->AddAddress($email);
            //     	$mail->WordWrap   = 80; 
            //          $mail->isHTML= true;
            //        $mail->Subject= "URBIZTONDO WATER SERVICES (Installation Response)";
            //        $mail->Body= $body;
            //        if(!$mail->send())
            //        {
                   
                       
            //        $_SESSION['error'] = "Mailer Error".$mail->ErrorInfo;;
       
                       
            //        }else
            //        {
                       
            //    $_SESSION['success'] = 'Approved The Inspection!';
       
       
            //            echo
            //            "
            //            <script>
            //            window.location='../inspections.php';
            //            </script>
            //            ";
            //        }
               
      
 
           
               echo
               "
               <script>
               window.location='../inspections.php';
               </script>
               ";



           }
       
           else{
               $_SESSION['error'] = $connect->error;
           }

        }


        else{


            $sql = "UPDATE inspection_schedule_for_registration_approval SET sentToPlumber = '5',  inspection_installation = '5' WHERE schedule_ID ='$id'";
			if($connect->query($sql)){

                $name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 
                $insert = "INSERT INTO activity( name, position,  time_loged, status)
                    VALUES( '$name', 'Admin',   NOW(),  'Reject The Inspection')";
                    $query = mysqli_query($connect,$insert);
 

                    require 'PHPMailer/class.phpmailer.php';
                     $mailto= $email;
                    $body="Dear Ma'am/Sir ".$fullname.";\n \nWe regret to inform you that the result of the inspection is disapproved. Due didn't meet the water line inspection requirements in your area. Thank you.";
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
                   
                       
                   $_SESSION['error'] = "Mailer Error".$mail->ErrorInfo;
       
                       
                   }else
                   {
                       
               $_SESSION['success'] = 'The Inspection is disapproved!';
       
       
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
	

?>