<?php
	session_start();
	include 'conn.php';
	if(isset($_SESSION['clerk']) ){

	if(!isset($_SESSION['clerk']) || trim($_SESSION['clerk']) == ''){
		header('location: home.php');
	}

	$sql = "SELECT * FROM tblplumber WHERE plumber_ID  = '".$_SESSION['clerk']."'";
	$query = $connect->query($sql);
	$user = $query->fetch_assoc();
}
		
else{

	header('location: ../login.php');

}
?>