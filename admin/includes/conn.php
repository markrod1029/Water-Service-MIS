
<?php
$host="localhost";
$user="srms_user";
$password="luz_database";
$db_name="srms";
$connect=mysqli_connect($host,$user,$password,$db_name);

if(!$connect)
{
	die("Please Check Your Connection".mysqli_error());
}



?>