<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['admin'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);


    $sql = "SELECT * FROM tblplumber WHERE (Fname  LIKE '%{$searchTerm}%' OR Lname LIKE '%{$searchTerm}%' )";

    $sql1 = "SELECT * FROM tblclients WHERE (client_fname  LIKE '%{$searchTerm}%' OR client_lname LIKE '%{$searchTerm}%' )";

    $output = "";
    $query = mysqli_query($conn, $sql);
    $query1 = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($query) > 0  || mysqli_num_rows($query1) > 0){
        include_once "data-search.php";
    }else{
        $output .= 'No Patient found related to your search term';
    }
    echo $output;
?>