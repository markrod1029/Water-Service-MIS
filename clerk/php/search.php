<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['plumber'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);



    $sql = "SELECT * FROM admin 
    LEFT JOIN tblclients ON tblclients.admin_ID = admin.admin_ID
    WHERE  (client_fname  LIKE '%{$searchTerm}%' OR client_lname LIKE '%{$searchTerm}%' OR Firstname  LIKE '%{$searchTerm}%' OR Lastname LIKE '%{$searchTerm}%') AND  tblclients.Status ='1'  ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No Patient found related to your search term';
    }
    echo $output;
?>