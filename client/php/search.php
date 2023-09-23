<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['client'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);



    $sql = "SELECT * FROM admin 
    LEFT JOIN  tblplumber ON tblplumber.admin_ID = admin.admin_ID 
    WHERE  (Fname  LIKE '%{$searchTerm}%' OR Lname LIKE '%{$searchTerm}%' OR Firstname  LIKE '%{$searchTerm}%' OR Lastname LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No Patient found related to your search term';
    }
    echo $output;
?>