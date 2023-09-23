<?php
    session_start();
    if(isset($_SESSION['clerk'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['clerk']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE tblplumber SET chat_status = '{$status}' WHERE plumber_ID ={$_GET['plumber']}");
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