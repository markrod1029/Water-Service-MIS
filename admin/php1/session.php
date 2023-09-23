<?php
	 include 'includes/session.php';


	if(isset($_SESSION['client'])){

	if(!isset($_SESSION['client']) || trim($_SESSION['client']) == ''){
		header('location: home.php');
	}

	$sql = "SELECT * FROM tblclients WHERE client_ID  = '".$_SESSION['client']."'";
	$query = $connect->query($sql);
	$user = $query->fetch_assoc();
}
	
else{

	header('location: ../login.php');

}
?>