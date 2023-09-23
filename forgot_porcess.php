<?php
    require 'PHPMailer/class.phpmailer.php';
        require ('includes/conn.php');
        session_start();


        if (isset($_POST['send-link'])) {
            
            $email = $_POST['email'];

            $sql="SELECT * FROM tblclients WHERE ClientEmail = '$email'";
            $result = $conn->query($sql);
    
            $sql="SELECT * FROM tblplumber WHERE Email = '$email'";
            $result1 = $conn->query($sql);
        
            if ($result->num_rows >= 1) {
                
                if ($row = $result->fetch_assoc()) {
                    $fullname = $row['client_fname'].' '.$row['client_mname'].' '.$row['client_lname'];

                    $numbers = '';
                    for($i = 0; $i < 10; $i++){
                        $numbers .= $i;
                    }
                    $reset_token = substr(str_shuffle($numbers), 0, 6);
                    date_default_timezone_set('Asia/Manila');
                    $date = date("Y-m-d");

                    $sql = "UPDATE tblclients SET resettoken ='$reset_token', resettokenexp = '$date' WHERE ClientEmail = '$email'";
                    

                    if (($conn->query($sql)===TRUE)) {

                        $_SESSION['email'] = $email;
                               $mail = new PHPMailer(true); 

        	$mail->IsSMTP();                           
        	$mail->SMTPAuth   = false;                 
        	$mail->Port       = 25;                    
        	$mail->Host       = "localhost"; 
        	$mail->Username   = "preparatory-log.online";   
        	$mail->Password   = "Markrod29";            
        	$mail->IsSendmail();  
        	$mail->From       = "preparatory-log.online";
        	$mail->FromName   = "markrodcadayong17@gmail.com";
        	$mail->AddAddress($email);
            $mail->Subject= "URBIZTONDO WATER SERVICES (Passsword Reset)";
        	$mail->WordWrap   = 80; 
             $mailto= $email;
             $mail->Body    = "Hi $fullname,<br>
             We received a request to reset your  URBIZTONDO WATER SERVICES MIS Account password.<br>
             Enter the following password reset code: '$reset_token'";
                if(!$mail->Send())
                {
                        $_SESSION['error'] = 'Mail Not Sent';
                        header('location:forgot.php');
                }
                else
            {
                        
                        $_SESSION['success'] = 'Password reset the link send to you Gmail';
                header('location:code_recovery.php');
            } 

                    }else{
                    $_SESSION['error'] = 'Something got Wrong';
                    header('location:forgot.php');
                    

                    }

            }else{
            $_SESSION['error'] = 'Server Down';
            
            }   


                
            }
            
            
    // teacher

            else if ($result1->num_rows >= 1) {
                
            if ($row1 = $result1->fetch_assoc()) {
                $fullname = $row1['Fname'].' '.$row1['Mname'].' '.$row1['Lname'];

                
                $numbers = '';
                for($i = 0; $i < 10; $i++){
                    $numbers .= $i;
                }
                $reset_token = substr(str_shuffle($numbers), 0, 6);

                date_default_timezone_set('Asia/Manila');
                $date = date("Y-m-d");


                $sql = "UPDATE tblplumber SET resettoken ='$reset_token', resettokenexp = '$date' WHERE Email = '$email'";


                if (($conn->query($sql)===TRUE)) {

                      $mail = new PHPMailer(true); 

        	$mail->IsSMTP();                           
        	$mail->SMTPAuth   = false;                 
        	$mail->Port       = 25;                    
        	$mail->Host       = "localhost"; 
        	$mail->Username   = "preparatory-log.online";   
        	$mail->Password   = "Markrod29";            
        
        	$mail->IsSendmail();  
        
        	$mail->From       = "preparatory-log.online";
        	$mail->FromName   = "markrodcadayong17@gmail.com";
        
        	$mail->AddAddress($email);
            $mail->Subject= "URBIZTONDO WATER SERVICES (Passsword Reset)";
        	$mail->WordWrap   = 80; 
              $mail->isHTML(true);
                $mailto= $email;
                $mail->Body    = "Hi $fullname,<br>
                We received a request to reset your  URBIZTONDO WATER SERVICES MIS Account password.<br>
                Enter the following password reset code: '$reset_token'";

                
            if(!$mail->Send())
            {
                
                    $_SESSION['error'] = 'Mail Not Sent';
                    header('location:forgot.php');
            }
            else
            {
                        
                        $_SESSION['success'] = 'Password reset the link send to you Gmail';
                header('location:code_recovery.php');
            } 

                    }else{
                    $_SESSION['error'] = 'Something got Wrong';
                    header('location:forgot.php');
                    

                    }

            }else{
            $_SESSION['error'] = 'Server Down';
            
            }   


            
        }



            else{
    
                $_SESSION['error'] = 'Email Address Not Found';
            header('location:forgot.php');

            }
            
            
                    

                
    }     

            