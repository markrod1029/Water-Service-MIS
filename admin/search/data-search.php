<?php

$admin = $_SESSION['admin'];

    
    while($row1 = mysqli_fetch_assoc($query1)){
        $sql2 = "SELECT * FROM tblclients WHERE (client_ID = {$row1['client_ID']})  ";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);

        $output .= '<a href="add-billing.php?client='. $row1['meter_no'] .'">
                     <div class="content" '. $highlight .' >
                    <img src="../upload/ClientPicture/'. $row1['picture'] .'" alt="">
                    <div class="details">
                        <span '. $highlight .'>'. $row1['client_fname']. ' '. $row1['client_mname'].' '.$row1['client_lname']. '</span>
                    </div>
                    </div>
                </a>';
           
    }
?>

<style>

.highlight{
    font-weight:bold;
}
</style>