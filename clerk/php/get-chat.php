<?php 
    session_start();
    if(isset($_SESSION['clerk'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['clerk'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages
         LEFT JOIN tblclients ON tblclients.client_ID  = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details" >
                                    <p   style="background-color:#3B5998;">'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{

                    if($row['client_ID'] ==  $incoming_id){

                    $output .= '<div class="chat incoming">
                                <img src="../upload/ClientPicture/'.$row['picture'].'" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }

                else{

                    $output .= '<div class="chat incoming">
                    <img src="../images/logo.png" alt="">
                    <div class="details">
                        <p>'. $row['msg'] .'</p>
                    </div>
                    </div>';
                }
            }



            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../message.php");
    }

?> 