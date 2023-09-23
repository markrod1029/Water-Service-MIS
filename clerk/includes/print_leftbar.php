


<aside class="aside is-placed-left is-expanded" style="background:darkblue ;overflow-y:auto;">
  <div class="aside-tools">
    <div><br><br>
      <img src="../images/logo.png" height='80px' width='80px'>
	  
    </div>
  </div><br>
  <div class="menu is-menu-main">
    <p class="menu-label"></p>
    <ul class="menu-list">
      <li>
        <a href="home.php">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
    </ul>
	<ul class="menu-list">
      <li>
        <a onclick="window.print()">
          <span class="icon"><i class="fa fa-print" aria-hidden="true"></i></span>
          <span class="menu-item-label">Print</span>
        </a>
      </li>
    </ul>
	<ul class="menu-list">
      <li>
        <a href="clients.php" >
          <span class="icon"><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
          <span class="menu-item-label">Go Back</span>
        </a>
      </li>
    </ul>
  </div>
</aside>


<style>
/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid lightblue;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 10px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 10px 15px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
@media only screen and (max-width:500px) {
  /* For mobile phones: */
  .img1 {
    width: 100%;
  }
   .cedula{
    width: 100%;
  }
  .pic{
    width: 100%;
  }
  .clearance{
    width: 100%;
  }
}
@media print
				{
					body *
					{
						visibility:hidden;background:white;
					}
					.print-area, .print-area *
					{
						visibility:visible;
					}
					.print-area
					{
						position:absolute;
						top:0% !important;
						left:0% !important;
						right:0% !important;
						bottom:0% !important;
						
						
						width:100%;
						height:100%;display: block;
					    margin-left: auto;
					    margin-right: auto;
						
					}
					.img1
					{
						width:100%;
						height:100%;
						
					}
					.pic
					{
						width:200px;
						height:200px;
						overflow: hidden;
						
					}
					.cedula
					{
						width:70%;
						height:30%;
						margin-top:50px;
					}
					.clearance
					{
						clear:both;
						width: 90%;
						height:100%;
						bottom:0% !important;
						overflow: hidden;
					}
				}
				#myImg {
					  border-radius: 5px;
					  cursor: pointer;
					  transition: 0.3s;
					}
				#myImg2 {
					  border-radius: 5px;
					  cursor: pointer;
					  transition: 0.3s;
					}
				#myImg3 {
					  border-radius: 5px;
					  cursor: pointer;
					  transition: 0.3s;
					}

					#myImg:hover {opacity: 0.7;}
					#myImg:hover2 {opacity: 0.7;}
					#myImg:hover3 {opacity: 0.7;}

					/* The Modal (background) */
					.modal {
					  display: none; /* Hidden by default */
					  position: fixed; /* Stay in place */
					  z-index: 1; /* Sit on top */
					  padding-top: 100px; /* Location of the box */
					  left: 0;
					  top: 0;
					  width: 100%; /* Full width */
					  height: 100%; /* Full height */
					  overflow: auto; /* Enable scroll if needed */
					  background-color: rgb(0,0,0); /* Fallback color */
					  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
					}

					/* Modal Content (image) */
					.modal-content {
					  margin: auto;
					  display: block;
					  width: 80%;
					  max-width: 700px;
					}

					/* Caption of Modal Image */
					#caption {
					  margin: auto;
					  display: block;
					  width: 80%;
					  max-width: 700px;
					  text-align: center;
					  color: #ccc;
					  padding: 10px 0;
					  height: 150px;
					}
					/* Caption of Modal Image */
					#caption2 {
					  margin: auto;
					  display: block;
					  width: 80%;
					  max-width: 700px;
					  text-align: center;
					  color: #ccc;
					  padding: 10px 0;
					  height: 150px;
					}
					#caption3 {
					  margin: auto;
					  display: block;
					  width: 80%;
					  max-width: 700px;
					  text-align: center;
					  color: #ccc;
					  padding: 10px 0;
					  height: 150px;
					}
					/* Add Animation */
					.modal-content, #caption, #caption2,#caption3 {  
					  -webkit-animation-name: zoom;
					  -webkit-animation-duration: 0.6s;
					  animation-name: zoom;
					  animation-duration: 0.6s;
					}

					@-webkit-keyframes zoom {
					  from {-webkit-transform:scale(0)} 
					  to {-webkit-transform:scale(1)}
					}

					@keyframes zoom {
					  from {transform:scale(0)} 
					  to {transform:scale(1)}
					}

					/* The Close Button */
					.close {
					  position: absolute;
					  
					  right: 35px;
					  color:white;
					  font-size: 40px;
					  font-weight: bold;
					  transition: 0.3s;
					}

					.close:hover,
					.close:focus {
					  color: #bbb;
					  text-decoration: none;
					  cursor: pointer;
					}
					
					/* The Close Button */
					.close2 {
					  position: absolute;
					  
					  right: 35px;
					  color:white;
					  font-size: 40px;
					  font-weight: bold;
					  transition: 0.3s;
					}

					.close2:hover,
					.close2:focus {
					  color: #bbb;
					  text-decoration: none;
					  cursor: pointer;
					}
					
					/* The Close Button */
					.close3 {
					  position: absolute;
					  
					  right: 35px;
					  color:white;
					  font-size: 40px;
					  font-weight: bold;
					  transition: 0.3s;
					}

					.close3:hover,
					.close3:focus {
					  color: #bbb;
					  text-decoration: none;
					  cursor: pointer;
					}
					
					/* 100% Image Width on Smaller Screens */
					@media only screen and (max-width: 700px){
					  .modal-content {
						width: 100%;
					  }
					  .close {
					  position: absolute;
					  
					  right: 35px;
					  color:black;
					  font-size: 40px;
					  font-weight: bold;
					  transition: 0.3s;
					}
					.close2 {
					  position: absolute;
					  
					  right: 35px;
					  color:black;
					  font-size: 40px;
					  font-weight: bold;
					  transition: 0.3s;
					}
					.close3 {
					  position: absolute;
					  
					  right: 35px;
					  color:black;
					  font-size: 40px;
					  font-weight: bold;
					  transition: 0.3s;
					}
					}
</style>