<!DOCTYPE html>
<html lang="en">
<?php include 'layout/conn.php'?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milcen's Resort (Booking)</title>
    <link rel="icon" href="../images/logo.png" type="image/x-icon" sizes="96x96">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <header>
        <div class="nav-bar">
            <a href="" class="logo"><img src="../images/logo.png" alt="" style="width: 2.3em;" /></a>
            <div class="navigation">
                <div class="nav-items">
                    <i class="uil uil-times nav-close-btn"></i>
                    <a href="../index.html"><i class="uil uil-home"></i> Home</a>
                    <a href="../index.html#Info"><i class="uil uil-info-circle"></i> Details</a>
                    <a href="#"><i class="uil uil-book-open"></i> Booking</a>
                    <a href="../assets/registration.html"> <i class="uil uil-user-plus"></i> Sign up</a>
                </div>
            </div>
            <i class="uil uil-apps nav-menu-btn"></i>
        </div>
    </header>

    <div class="main" id="Cottage">
        <div class="wrapper">
            <div class="bg"> Cottage </div>
            <div class="fg"> Cottage </div>
        </div>
        <hr>
        <ul class="cards">
            
        <?php 
          $qry="SELECT * FROM reservation WHERE res_type = 'Cottage'";
          $query = $conn->query($qry);
          while($row = $query->fetch_assoc()){
        ?>
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="../reservation_image/<?php $row['photo']?>"></div>
                    <div class="card_content">
                        <h2 class="card_title"><?php $row['res_name']?></h2>
                        <p class="card_text"><?php $row['capacity']?> pax</p>
                        <p class="card_price"><?php $row['price']?></p>
                        <button class="btn card_btn">Reserve Now</button>
                    </div>
                </div>
            </li>

            <?php }?>
        </ul>
    </div>

    <div class="main" id="PrivatePool">
        <div class="wrapper">
            <div class="bg"> Private pool </div>
            <div class="fg"> Private pool </div>
        </div>
        <hr>
        <ul class="cards">
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="../images/bg2.jpg"></div>
                    <div class="card_content">
                        <h2 class="card_title">Private Pool</h2>
                        <p class="card_text">25 - 30 pax</p>
                        <p class="card_price">₱ 5,500</p>
                        <button class="btn card_btn">Reserve Now</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>



    <div class="main" id="NightSwimming">
        <div class="wrapper">
            <div class="bg"> Night Swimming </div>
            <div class="fg"> Night Swimming </div>
        </div>
        <hr>
        <ul class="cards">
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="../images/bg3.jpg"></div>
                    <div class="card_content">
                        <h2 class="card_title">Night Swimming</h2>
                        <p class="card_text">Maximum of 30 pax
                            <br> included: <br>
                            - Kitchen & Room <br>
                            - 2 Rooms & 3 Beds
                        </p>
                        <p class="card_price">₱ 10,000</p>
                        <button class="btn card_btn">Reserve Now</button>
                    </div>
                </div>
            </li>

        </ul>
    </div>
    <div class="main" id="Functionhall">
        <div class="wrapper">
            <div class="bg"> Funtion Hall </div>
            <div class="fg"> Funtion Hall </div>
        </div>
        <hr>
        <ul class="cards">
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="../images/bg4.jpg"></div>
                    <div class="card_content">
                        <h2 class="card_title">Function Hall</h2>
                        <p class="card_text">Maximum of 150 people <br> - 500 per plate <br>- Per hour</p>
                        <p class="card_price">₱ 15,000</p>
                        <button class="btn card_btn">Reserve Now</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- Main-->
    <script src="../js/swiper-bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>