



<?php
 include 'session.php';
			
				$id=$_GET['id'];
	
				$sql = "DELETE FROM tblclients WHERE client_ID = '$id'";
		            if($connect->query($sql)){
				$_SESSION['success'] = 'Client Delete successfully';
				
				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Admin',   NOW(),  'Delete a Client')";
				$query = mysqli_query($connect,$insert);
			


			}

			else{
				$_SESSION['error'] = $connect->error;
			}

            header('location: ../clients.php');

		?>