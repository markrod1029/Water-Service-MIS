<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['admin'];


    $sql = "SELECT * FROM tblplumber WHERE position='clerk' ORDER BY plumber_ID ";
    $query = mysqli_query($conn, $sql);
    $output = "";


    $sql1= "SELECT * FROM tblclients WHERE Status = 1 ORDER BY client_ID ";
    $query1 = mysqli_query($conn, $sql1);
    $output = "";

    if( mysqli_num_rows($query1) == 0 || mysqli_num_rows($query)  == 0  ){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0 || mysqli_num_rows($query1) >  0){
        include_once "data.php";
    }
    echo $output;
?>