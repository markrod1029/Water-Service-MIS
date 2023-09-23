<?php

session_start();
include 'includes/conn.php';


	if(isset($_POST['submit'])){

	$fname = htmlspecialchars( $_POST['fname'], ENT_QUOTES, 'UTF-8');
	$mname = htmlspecialchars( $_POST['mname'], ENT_QUOTES, 'UTF-8');
	$lname = htmlspecialchars( $_POST['lname'], ENT_QUOTES, 'UTF-8');
	$houseno = htmlspecialchars( $_POST['houseno'], ENT_QUOTES, 'UTF-8');
	$location = htmlspecialchars( $_POST['location'], ENT_QUOTES, 'UTF-8');
	$contactno = htmlspecialchars( $_POST['contactno'], ENT_QUOTES, 'UTF-8');
	$classification = htmlspecialchars( $_POST['classification'], ENT_QUOTES, 'UTF-8');
	$email = htmlspecialchars( $_POST['email'], ENT_QUOTES, 'UTF-8');
	$Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	//creating doctor_id
// $numbers = '';
	
// for($i = 0; $i < 10; $i++){
// 	$numbers .= $i;
// }
// $mno = substr(str_shuffle($numbers), 0, 9);
// //


$output_dir3 = "upload/ClientPicture";/* Path for file upload */
$RandomNum3   = time();
$ImageName3      = str_replace(' ','-',strtolower($_FILES['image3']['name'][0]));
$ImageType3      = $_FILES['image3']['type'][0];
											 
$ImageExt3 = substr($ImageName3, strrpos($ImageName3, '.'));
$ImageExt3       = str_replace('.','',$ImageExt3);
$ImageName3      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName3);
$NewImageName3 = $ImageName3.'-'.$RandomNum3.'.'.$ImageExt3;
$ret3[$NewImageName3]= $output_dir3.$NewImageName3;
												
/* Try to create the directory if it does not exist */
if (!file_exists($output_dir3))
{
	@mkdir($output_dir3, 0777);
}               
move_uploaded_file($_FILES["image3"]["tmp_name"][0],$output_dir3."/".$NewImageName3 );


											
													
													
	$validemail="SELECT * FROM tblclients WHERE ClientEmail='$email'";
	$resvalidemail=mysqli_query($conn,$validemail)or die(mysqli_error($connect));
	$countvalidemail=mysqli_num_rows($resvalidemail);
	if($countvalidemail>0)
	{

    $_SESSION['error'] = 'Email Already Exist!';

		echo
		"
			<script>
				history.back();
			</script>
		";
		return false;
	}
	$validcontact="SELECT * FROM tblclients WHERE Contact='$contactno'";
	$resvalidcontact=mysqli_query($conn,$validcontact)or die(mysqli_error($connect));
	$countvalidcontact=mysqli_num_rows($resvalidcontact);
	if($countvalidcontact>0)
	{
    $_SESSION['error'] = 'Contact Number Already Exist!';

		echo
		"
			<script>
				history.back();
			</script>
		";
		return false;
	}
	if( $fname && $lname && $location && $email && $contactno)
	{


		$qry="SELECT * FROM admin";
		$query = $conn->query($qry) ;
		$num=mysqli_num_rows($query);

		while($row1 = $query->fetch_assoc()){
			$admin = $row1['admin_ID'];
		}


		$sub="INSERT INTO tblclients( client_fname, client_mname, client_lname,House_No,address_ID, ClientEmail, Contact, classification, Password,   RegDate, picture,chat_status, admin_ID)
		VALUES('$fname', '$mname', '$lname', '$houseno','$location','$email', '$contactno',  '$classification',  '$Password', NOW(), '$NewImageName3', 'Offline Now', '$admin' )";
														
		if (mysqli_query($conn, $sub)) {
														
    $_SESSION['success'] = 'Thanks you for Registration! We will validate your information immediately. Expect the inspection in your area. ';

		echo
		"
			<script>
				window.location='login.php';
			</script>
		";
	}
}

else{
	$_SESSION['error'] = $conn->error;

}

													
}
?>

