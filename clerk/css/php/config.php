
<?php
$host="localhost";
$user="root";
$password="";
$db_name="srms";
$conn=mysqli_connect($host,$user,$password,$db_name);

if(!$conn)
{
	die("Please Check Your Connection".mysqli_error());
}


?>