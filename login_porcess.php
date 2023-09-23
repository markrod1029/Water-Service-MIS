<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$user = $_POST['user'];
		$password = $_POST['password'];


        $sql = "SELECT * FROM admin WHERE UserName = '$user' OR Email = '$user' ";
		$query = $conn->query($sql);

        $sql1 = "SELECT * FROM tblplumber WHERE Email = '$user' AND UserStatus = '1' ";
		$query1 = $conn->query($sql1);

		$sql2 = "SELECT * FROM tblclients WHERE ClientEmail = '$user' AND Status = '1'";
		$query2 = $conn->query($sql2);
		$status = "Active now";

        if ($query->num_rows >= 1) {

            $row = $query->fetch_assoc();
			$name = $row['Firstname'].' '.$row['Middlename'].' '.$row['Lastname']; 

			if(password_verify($password, $row['Password'])){

				$_SESSION['admin'] = $row['admin_ID'];

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Logged in')";
					$query = mysqli_query($conn,$insert);


			}

			else{
				$_SESSION['error'] = 'Incorrect password';
			}

    
        } 



        else if ($query1->num_rows >= 1) {

            $row1 = $query1->fetch_assoc();
			$name = $row1['Fname'].' '.$row1['Mname'].' '.$row1['Lname']; 
			$position = $row1['position'];

			if(password_verify($password, $row1['Password'])){


				if($position == 'clerk')
				{

					
				$_SESSION['clerk'] = $row1['plumber_ID'];

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Clerk',   NOW(),  'Logged in')";
				$query = mysqli_query($conn,$insert);

				$sql = mysqli_query($conn, "UPDATE tblplumber SET chat_status = '{$status}' WHERE plumber_ID={$row1['plumber_ID']}");


				}

				else{

				$_SESSION['plumber'] = $row1['plumber_ID'];

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Plumber',   NOW(),  'Logged in')";
				$query = mysqli_query($conn,$insert);



			}

			}

			else{
				$_SESSION['error'] = 'Incorrect password';
			}

    
    }


	else if ($query2->num_rows >= 1) {

		$row2 = $query2->fetch_assoc();
		$name = $row2['client_fname'].' '.$row2['client_mname'].' '.$row2['client_lname']; 
			if(password_verify($password, $row2['Password'])){

			$_SESSION['client'] = $row2['client_ID'];
			$_SESSION['clients'] = $row2['meter_no'];

			$insert = "INSERT INTO activity( name, position,  time_loged, status)
			VALUES( '$name', 'Client',   NOW(),  'Logged in')";
			$query = mysqli_query($conn,$insert);

			$sql = mysqli_query($conn, "UPDATE tblclients SET chat_status = '{$status}' WHERE client_ID={$row2['client_ID']}");

		}

		else{
			$_SESSION['error'] = 'Incorrect password';
		}


}


    else{
        $_SESSION['error'] = 'Cannot find account with the Username';


    }
}



	header('location: login.php');

?>