<?php 
  session_start();

include 'includes/conn.php' ?>
<?php include 'includes/header.php' ?>
<?php $slide='register'; include 'includes/leftbar.php' ?>

<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


	
	
<div class="container" style="margin-top:15px">
<nav class="secondary-nav" >
	    
	  </nav>


      <div class="panel-body p-20 " style="margin-top:150px">
        
      <div class="colm-form">

        <div class="form-container">
          <center>
				<div class="col" ><img src="images/logo.png" width="80px" height="80px" style="margin-bottom:5px" >

      <h3 class="login"style="margin-bottom:25px">Requirements applying as new applicant:</h3>
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
 	



                    <label style="margin-bottom:-15px"><svg style="color:green;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					 <path fill="currentColor" 
					 d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275q-.275.275-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7q-.275-.275-.7-.275t-.7.275L10.6 13.8ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z"/></svg>
					 Personal Information (First Name, Last Name, Middle Name (Optional))</label>
					<br>
					<br>
                    <label style="margin-bottom:-15px"><svg style="color:green;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					 <path fill="currentColor" 
					 d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275q-.275.275-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7q-.275-.275-.7-.275t-.7.275L10.6 13.8ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z"/></svg>
					 A valid email address</label>
					<br>
					<br>

					<center>
					<div>
					<button type="submit" name="submit" class="btn btn-primary" onclick=window.location.href="register.php" >Start</button>
					<button type="submit" name="submit" class="btn btn-danger" onclick=window.location.href="index.php">Cancel</button>

					</div>
					</center>

                </div>
            </div>
        </div>

</div>
	</section>
<br>
<br>
    <?php include 'includes/footer.php' ?>


	
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
box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

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