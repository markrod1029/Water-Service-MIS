<body>
  <header>
    <div class="nav-bar navbar-dark ftco_navbar bg-dark ftco-navbar-light ">
      <a href="#" class="logo"><img src="images/logo.png" alt="" style="width: 2.3em;  "   /></a>
    <span class="title1" style=""> URBIZTONDO WATER SERVICES</span>

      <div class="navigation">
        <div class="nav-items">
          <i class="uil uil-times nav-close-btn"></i>
          <a href="index.php" class="<?php if($slide == 'index'){?>active<?php } else{}?>"><i class="uil uil-home active"></i> Home</a>
         <div class="dropdown">
        <a class="dropbtn <?php if($slide == 'about' || $slide == 'contact' ){?>active<?php } else{}?>"  >About Us </a>
        <div class="dropdown-content">
          <a href="about_us.php" class="<?php if($slide == 'about' ){?>active<?php } else{}?>">About Us</a>
          <a href="contact_us.php" class="<?php if( $slide == 'contact' ){?>active<?php } else{}?>">Contact Us</a>
        </div>
      </div>
          <!-- <a href="#Info"><i class="uil uil-info-circle"></i> Advisories</a> -->
          <a href="register_category.php" class="<?php if($slide == 'register'){?>active<?php } else{}?>"><i class="uil uil-book-open"></i> Registration</a>
          <a href="login.php" class="<?php if($slide == 'login'){?>active<?php } else{}?>"> <i class="uil uil-user-plus"></i>Log In</a>
         
          
        </div>
      </div>
      <i class="uil uil-apps nav-menu-btn"></i>
    </div>
  </header>

 <style>
  .nav-items a {
  position: relative;
  display: inline-block;
  padding-bottom: 5px;
  margin-right: 20px;
  color: #FFF;
  text-decoration: none;
}

.nav-items a.active::after {
  transform: scaleX(1);
}

.nav-items a:hover::after {
  transform: scaleX(1);
}

.nav-items a::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 2px;
  background-color: #FFF;
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.3s ease-in-out;
}

.nav-items a:hover::after {
  transform: scaleX(1);
}


/* Style The Dropdown Button */
.dropbtn {
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #3e92cc;
  min-width: 150px;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
/* .dropdown-content a:hover {
  background-color: #f1f1f1;
} */

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
/* .dropdown:hover .dropbtn {
  background-color: #3e8e41;
} */

.nav-bar {
  height: 95px;
  transition: all 0.3s ease-in-out;
}

.nav-bar.scrolled {
  height: 80px;
}
/* 
body{
				background-color:#d2d6de;
			} */


			


/* .header{

text-align:center;
    font-family: "Arial Rounded MT Bold", sans-serif;
  color: #00008b;
  font-size: 24px;
  letter-spacing: 0px;
  line-height: 2.2;
  
} */

.secondary-nav{
    "background:#f0f0f0;
     height: 59px; 
     background-color: #f0f0f0;
     overflow: visible;
}

@media (max-width: 768px) {
  /* Your styles here */

  .header{
    font-size: 18px;
    line-height: 3.2;

}


/* Fix the navbar to the top of the screen */
.navbar1 {
  position: fixed;
background-color:#0000FF;
width:100%;
  transition: all 0.3s ease-out;
}

.navbar-nav{
text-align:center;
}

.navbar1.show-navbar {
  top: 0;
}

/* Add some styles to make the transition smoother */
.topbar1 {
  transition: all 0.3s ease-out;
  margin-bottom:30px;
}

.hide-topbar .topbar1 {
  transform: translateY(-100%);
}


}


.about-section {
  padding: 50px;
  text-align: center;
  background-color: #f0f0f0;
  color: #000;
  font-size:18px;
}



td{
	background-color:#F0F0F0;
}
th{
	background-color:#F0F0F0;


}

/* Validation */

body{
			font-family: Arial, Helvetica, sans-serif;
		}

    
		.info1, .success, .warning, .error, .validation {
			border: 1px solid;
			margin: 10px 0px;
			padding: 15px 10px 15px 50px;
			background-repeat: no-repeat;
			background-position: 10px center;
		}
		.info1 {
      font-size:15px;
			color: #00529B;
			background-color: #BDE5F8;
			background-image: url('https://i.imgur.com/ilgqWuX.png');
		}
		.success {
      font-size:15px;
			color: #4F8A10;
			background-color: #DFF2BF;
			background-image: url('https://i.imgur.com/Q9BGTuy.png');
		}
		.warning {
      font-size:15px;
			color: #9F6000;
			background-color: #FEEFB3;
			background-image: url('https://i.imgur.com/Z8q7ww7.png');
		}
		.error{
      font-size:15px;
			color: #D8000C;
			background-color: #FFBABA;
			background-image: url('https://i.imgur.com/GnyDvKN.png');
		}
		.validation{
      font-size:15px;
			color: #D63301;
			background-color: #FFCCBA;
			background-image: url('https://i.imgur.com/GnyDvKN.png');
		}

		</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// Change the height of the navbar on scroll
$(window).scroll(function() {
  if ($(this).scrollTop() > 100) { // adjust the value as needed
    $('.nav-bar').addClass('scrolled');
  } else {
    $('.nav-bar').removeClass('scrolled');
  }
})

  </script>