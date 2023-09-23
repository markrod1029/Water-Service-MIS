<?php
error_reporting(0);
include 'includes/session.php';
include 'includes/header.php';
include 'includes/topbar.php';
$page = "chat";
include 'includes/leftbar.php';
?>

<section class="section main-section">
    <?php
    if (isset($_SESSION['error'])) {
        echo '
        <div class="notification red">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                <div>
                    <span class="icon"><i class="fa fa-warning"></i></span>
                    ' . $_SESSION['error'] . '
                </div>
                <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
            </div>
        </div>';
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
        echo '
        <div class="notification green">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                <div>
                    <span class="icon"><i class="fa fa-check"></i></span>
                    ' . $_SESSION['success'] . '
                </div>
                <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
            </div>
        </div>';
        unset($_SESSION['success']);
    }
    ?>

    <div class="content-wrapper wrapper">
        <body>
            <div class="wrapper">
                <section class="chat-area">
                    <header>
                        <?php
                        $plumber = mysqli_real_escape_string($connect, $_GET['client']);
                        $id = mysqli_real_escape_string($connect, $_GET['ID']);

                        $sql1 = mysqli_query($connect, "SELECT * FROM tblclients WHERE client_ID = {$plumber}");

                        if (mysqli_num_rows($sql1) > 0) {
                            $row1 = mysqli_fetch_assoc($sql1);
                            $sql1 = "UPDATE messages SET message_status = '5' WHERE outgoing_msg_id = '$plumber'";
                            $connect->query($sql1);
                        } else {
                            echo '
                            <script>
                                window.location="message.php";
                            </script>';
                        }
                        ?>

                        <a href="message.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>

                    
                            <img src="../upload/ClientPicture/<?php echo $row1['picture']; ?>" alt="">
                            <div class="details">
                                <span><?php echo $row1['client_fname'] . ' ' . $row1['client_mname'] . ' ' . $row1['client_lname']; ?></span>
                                <p><?php echo
                                $row1['chat_status']; ?></p>
                                </div>
                          
                        </header>
                        <div class="chat-box"></div>
                        <form action="#" class="typing-area" style="display:none;">
                            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $plumber; ?>" hidden>
                            <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                            <button style="background-color:#3B5998;"><i class="fab fa-telegram-plane"></i></button>
                        </form>
                    </section>
                </div>
        </div>
        <script src="javascript/chat.js"></script>
        <?php include 'includes/footer.php'; ?>
    