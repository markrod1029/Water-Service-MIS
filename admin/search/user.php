<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['admin'];
  


    $sql1 = "SELECT * FROM tblclients   ORDER BY client_ID ";
    $query1 = mysqli_query($conn, $sql1);
    $output = "";

    if(mysqli_num_rows($query) == 0 ){
        $output .= "No Client are available to Create SOA";
    }elseif( mysqli_num_rows($query1) >  0){

        include_once "data.php";
    }
    echo $output;
?>