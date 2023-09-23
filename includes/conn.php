

<?php
$host="localhost";
$user="srms_user";
$password="luz_database";
$db_name="srms";
$conn=mysqli_connect($host,$user,$password,$db_name);

if(!$conn)
{
	die("Please Check Your Connection".mysqli_error());
}


?>