
<?php
  session_start();

?>

<?php include 'includes/conn.php'; ?>
 
 <?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php  $slide = "login"; include 'includes/leftbar.php' ?>

	
	
<div class="container" style="margin-top:15px">
<nav class="secondary-nav" >
	    
	  </nav>


      <div class="panel-body p-20 " style="margin-top:55px">
        
      <div class="colm-form">

        <div class="form-container">
          <center>
				<div class="col" ><img src="images/logo.png" width="80px" height="80px" style="margin-bottom:5px"  >

      <h3 class="login"style="margin-bottom:25px">Recover Password</h3>
        </center>



      <?php
        if(isset($_SESSION['error'])){
          echo "
		  <div class='error '>
		  <div class='flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0'>
			<div>
			  <span class='icon'><i class='fa fa-warning'></i></span>

              ".$_SESSION['error']."
			  </div>
			</div>
		  </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
		  <div class='success '>
		  <div class='flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0'>
			<div>
			  <span class='icon'><i class='fa fa-check'></i></span>

              ".$_SESSION['success']."
			  </div>
			</div>
		  </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
 	

    <form action="code_recovery.php" method="POST">


                    <label style="margin-bottom:-15px">Please Enter The Authentication Cod</label>
					<input type="text" class="form-control effect-3 " name="reset_token" placeholder="A 6 Digit Code" minlength="6" maxlength="6"  pattern="\d{6}" title="6-digit Code"  required autofocus>
					<input type="hidden" class="form-control effect-3 " value="<?php echo $_SESSION['email']?>"name="email" placeholder="Enter Email" required autofocus>

                    <button class="btn-login" name="submit" >Reset</button>
    

    </form>
    <a class="form-check-label text-secondary text-right mr-4" href='login.php' style="font-size:16px; "> Do You have Account? Login here </a>
                </div>
            </div>
        </div>

</div>
<center><br><br>

<h4 style="font-family:arial black; color:blue">URBIZTONDO WATER SEVICES</h4>
<h5 style="color:blue">Pasimbalo Urbiztondo<br>“Makabago, Malaya at Organisadong Bayan"</h5><br>

      </center>
	</section>

    

  <?php include 'includes/footer.php' ?>



  <?php

if (isset($_POST['submit'])) {

date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d");

$email = $_POST['email'];    
$reset_token = $_POST['reset_token'];

$sql="SELECT * FROM tblclients  WHERE ClientEmail = '$email' AND resettoken = '$reset_token' AND resettokenexp = '$date'";
$result = $conn->query($sql);


$sql1="SELECT * FROM tblplumber WHERE Email = '$email' AND resettoken = '$reset_token' AND resettokenexp = '$date'";
$result1 = $conn->query($sql1);


    
    if ($result->num_rows == 1) {
       
        $_SESSION['email'] = $email;
        $_SESSION['reset_token'] = $reset_token;
        
        echo "
        <script>
            window.location.href='update_password.php'
        </script>";

    }

    else if ($result1->num_rows == 1) {
     
      $_SESSION['email'] = $email;
      $_SESSION['reset_token'] = $reset_token;
      
      echo "
      <script>
          window.location.href='update_password.php'
      </script>";
      $_SESSION['success'] = 'Enter New Password';

  }

    else{
      $_SESSION['error'] = 'Code is Wrong';


        echo "
            <script>
                window.location.href='code_recovery.php'
            </script>";
      }

    


}



?>
  <style>

    label{
      color: #666;
  font-size:16px;
    }




.login{


font-family: "Arial Rounded MT Bold", sans-serif;
color: #666;
  font-size: 22px;
  letter-spacing: 0px;
  line-height: 1.2;

}


.colm-form .form-container {
    background-color: #ffffff;
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 8px 16px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    padding: 20px;
    max-width: 450px;
    margin: auto;
}

.colm-form .form-container input, .colm-form .form-container .btn-login {
    width: 100%;
    margin: 5px 0;
    height: 45px;
    vertical-align: middle;
    font-size: 16px;
}

.colm-form .form-container input {
    border: 1px solid #dddfe2;
    color: #1d2129;
    padding: 0 8px;
    outline: none;
}

.colm-form .form-container input:focus {
    border-color: #1877f2;
    box-shadow: 0 0 0 2px #e7f3ff;
}

.colm-form .form-container .btn-login {
    background-color: #1877f2;
    border: none;
    border-radius: 6px;
    font-size: 20px;
    padding: 0 16px;
    color: #ffffff;
    font-weight: 700;
}

.colm-form .form-container a {
    display: block;
    color: #1877f2;
    font-size: 14px;
    text-decoration: none;
    padding: 10px 0 20px;
    border-bottom: 1px solid #dadde1;
}

.colm-form .form-container a:hover {
    text-decoration: underline;
}

.colm-form .form-container .btn-new {
    background-color: #42b72a;
    border: none;
    border-radius: 6px;
    font-size: 17px;
    line-height: 48px;
    padding: 0 16px;
    color: #ffffff;
    font-weight: 700;
    margin-top: 20px; 
}

.colm-form p {
    font-size: 14px;
}

.colm-form p a {
    text-decoration: none;
    color: #1c1e21;
    font-weight: 600;
}

.colm-form p a:hover {
    text-decoration: underline;
}




    </style>