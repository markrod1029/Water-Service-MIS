


<?php
 include 'session.php';
			
				$id=$_GET['id'];
	
				$sql = "DELETE FROM billing WHERE billing_ID = '$id'";
		            if($connect->query($sql)){
				$_SESSION['success'] = 'Billing Delete successfully';
				
				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 
				$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Admin',   NOW(),  'Delete a Billing')";
				$query = mysqli_query($connect,$insert);
			

			}

			else{
				$_SESSION['error'] = $connect->error;
			}

            header('location: ../billing.php');

		?>