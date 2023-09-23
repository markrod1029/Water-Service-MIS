<?php
    session_start();
    if(isset($_SESSION['admin'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['admin']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE admin SET chat_status = '{$status}' WHERE admin_ID ={$_GET['admin']}");
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