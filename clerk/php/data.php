<?php
error_reporting(0);

$plumber = $_SESSION['clerk'];




    while($row1 = mysqli_fetch_assoc($query1)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row1['client_ID']}
                OR outgoing_msg_id = {$row1['client_ID']} )  AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

        if($row2['message_status']==1 &&  $plumber != $row2['outgoing_msg_id'] ){
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
        ($outgoing_id == $row1['admin_ID']) ? $hid_me = "hide" : $hid_me = "";
        
        

        $output .= '<a href="chat.php?client='.$row1['client_ID'] .'">
                     <div class="content" '. $highlight .' >
                     <img src="../upload/ClientPicture/'.$row1['picture'].'" alt="">
                    <div class="details">
                        <span '. $highlight .'>'. $row1['client_fname'].' '. $row1['client_mname'].' '. $row1['client_lname']. '</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';

            


           
    }

    
while($row = mysqli_fetch_assoc($query)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['admin_ID']}
            OR outgoing_msg_id = {$row['admin_ID']} )  AND (outgoing_msg_id = {$outgoing_id} 
            OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

    if($row2['message_status']==1 &&  $plumber != $row2['outgoing_msg_id'] ){
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
    ($outgoing_id == $row1['admin_ID']) ? $hid_me = "hide" : $hid_me = "";
    


    $output .= '<a href="chat.php?client='.$row['admin_ID'] .'">
                 <div class="content" '. $highlight .' >
                 <img src="../images/logo.png" alt="">
                <div class="details">
                    <span '. $highlight .'>'. $row['position']. '</span>
                    <p>'. $you . $msg .'</p>
                </div>
                </div>
                <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
            </a>';

        


       
}


    

?>