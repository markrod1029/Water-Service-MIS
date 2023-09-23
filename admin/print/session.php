<?php
	session_start();
	include 'conn.php';


	if(isset($_SESSION['admin']) ){

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: home.php');
	}

	$sql = "SELECT * FROM admin WHERE admin_ID  = '".$_SESSION['admin']."'";
	$query = $connect->query($sql);
	$user = $query->fetch_assoc();
}
	
else{

	header('location: ../login.php');

}
?>



<style>
@media print
				{
					@page {size: landscape}
					
					.print-area, .print-area *
					{
						visibility:visible;
					}
					.print-area
					{
						position:absolute;
						top:0% !important;
						left:0% !important;
						right:0% !important;
						bottom:0% !important;
						
						
						width:100%;
						height:100%;display: block;
					    margin-left: auto;
					    margin-right: auto;
						
					}
					.img1
					{
						width:100%;
						height:100%;
						
					}
					.pic
					{
						width:100px;
						height:100px;
						overflow: hidden;
						
					}
					.cedula
					{
						width:70%;
						height:30%;
						margin-top:50px;
					}
					.clearance
					{
						clear:both;
						width: 90%;
						height:100%;
						bottom:0% !important;
						overflow: hidden;
					}
				}
</style>
