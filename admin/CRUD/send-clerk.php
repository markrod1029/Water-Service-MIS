<link rel="icon" href="logo.png">
<?php
 include 'session.php';

 $complaint_ID = $_POST['complaint_ID'];
 $outgoing_id = $_POST['id'];
 $status = 1;
 $message = $_POST['complaint'].'<br>(Concern By '.$_POST['name'].')';
 $client="SELECT * FROM tblplumber WHERE position='clerk' ";
 $res=mysqli_query($connect, $client)or die(mysqli_error($connect));
 while($rw=mysqli_fetch_assoc($res))
 {
    $incoming_id = $rw['plumber_ID'];

 }

 if(!empty($message)){
    $sql = mysqli_query($connect, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, message_status)
                                VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '{$status}')") or die();

			$update=mysqli_query($connect,"UPDATE tblcomplaints SET Complaint_Status = '1', sentToPlumber='2', plumber_ID='$incoming_id'  WHERE complaint_ID='$complaint_ID'")or die(mysqli_error($connect));
           
			$_SESSION['success'] = "Successfully Sent to Clerk";

			$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 
			$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Clerk',   NOW(),  'Cocern Sent to Clerk')";
				$query = mysqli_query($connect,$insert);
	


            echo
			"
				<script>
					window.location='../complaints.php';
				</script>
			";
}else{
	"
				<script>
					window.location='../complaints.php';
				</script>
			";
}


?>