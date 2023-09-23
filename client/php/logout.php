<?php
    session_start();
    if(isset($_SESSION['client'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['client']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE tblclients SET chat_status = '{$status}' WHERE client_ID ={$_GET['client']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../../index.php");
            }
        }else{
            header("location: ../message.php");
        }
    }else{  
        header("location: ../../index.php");
    }
?>