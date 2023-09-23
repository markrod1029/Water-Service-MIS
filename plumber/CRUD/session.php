<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['plumber']) || trim($_SESSION['plumber']) == ''){
		header('location: home.php');
	}

	$sql = "SELECT * FROM tblplumber WHERE plumber_ID  = '".$_SESSION['plumber']."'";
	$query = $connect->query($sql);
	$user = $query->fetch_assoc();
	
?>