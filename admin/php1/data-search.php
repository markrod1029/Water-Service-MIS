<?php
error_reporting(0); 

$admin = $_SESSION['admin'];

    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['plumber_ID']}
                OR outgoing_msg_id = {$row['plumber_ID']} )  AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

        if($row2['message_status']==1 &&  $admin != $row2['outgoing_msg_id'] ){
            $highlight = 'Style="font-weight:bold;"';

        }
        else if($row2['msg']==null ){
            $highlight = '';

        }
        else{
            $highlight = '';
        }



        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['chat_status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['plumber_ID']) ? $hid_me = "hide" : $hid_me = "";
        


        $output .= '<a href="chat.php?plumber_ID='. $row['plumber_ID'] .'">
                   <div class="content" '. $highlight .' >
                    <img src="../upload/plumber/'. $row['images'] .'" alt="">
                    <div class="details">
                        <span  '. $highlight .'>'. $row['Fname']. ' '. $row['Mname'].' '.$row['Lname']. '</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';

            


       
    }

    while($row1 = mysqli_fetch_assoc($query1)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row1['meter_no']}
                OR outgoing_msg_id = {$row1['meter_no']} )  AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

        if($row2['message_status']==1 &&  $admin != $row2['outgoing_msg_id'] ){
            $highlight = 'Style="font-weight:bold;"';

        }
        else if($row2['msg']==null ){
            $highlight = '';

        }
        else{
            $highlight = '';
        }


        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row1['chat_status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row1['client_ID']) ? $hid_me = "hide" : $hid_me = "";
        


        $output .= '<a href="chat.php?plumber_ID='. $row1['meter_no'] .'">
                     <div class="content" '. $highlight .' >
                    <img src="../upload/ClientPicture/'. $row1['picture'] .'" alt="">
                    <div class="details">
                        <span '. $highlight .'>'. $row1['client_fname']. ' '. $row1['client_mname'].' '.$row1['client_lname']. '</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';

            


           
    }
?>

<style>

.highlight{
    font-weight:bold;
}
</style>