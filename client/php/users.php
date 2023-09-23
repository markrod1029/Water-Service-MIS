<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['clients'];

    $sql1= "SELECT * FROM admin  ORDER BY admin_ID ";
    $query1 = mysqli_query($conn, $sql1);
    $output = "";

    if( mysqli_num_rows($query1) == 0 ){
        $output .= "No users are available to chat";
    }elseif( mysqli_num_rows($query1) >  0){

        include_once "../includes/topbar.php";
    }
    echo $output;
?>