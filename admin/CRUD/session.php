<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: home.php');
	}

	$sql = "SELECT * FROM admin WHERE admin_ID  = '".$_SESSION['admin']."'";
	$query = $connect->query($sql);
	$user = $query->fetch_assoc();
	
?>