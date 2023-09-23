
<?php
 include 'session.php';
			
				$id=$_GET['ctid'];
	
				$sql = "DELETE FROM tblplumber WHERE plumber_ID = '$id'";
		            if($connect->query($sql)){
				$_SESSION['success'] = 'Plumber Delete successfully';

				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Admin',   NOW(),  'Delete a Plumber')";
				$query = mysqli_query($connect,$insert);
			

			}

			else{
				$_SESSION['error'] = $connect->error;
			}

            header('location: ../plumber.php');

		?>