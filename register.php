<?php 
  session_start();

include 'includes/conn.php' ?>
<?php include 'includes/header.php' ?>
<?php $slide='register'; include 'includes/leftbar.php' ?>

	
<div class="container" style="margin-top:135px">
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
                                            <div class="panel-body p-20">
										
											<form method="POST"   action="register_porcess.php" enctype='multipart/form-data' >
                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <tr>
														<th colspan='2' style='text-align:center; background-color:#fff ;font-size:30px'>REGISTRATION FORM</th>
													</tr>
												
		
													<tr>
														<th>First Name <label id="fnameLabel" style="color:red">*</label> </th>
														<td><input type="name" name="fname" id="fname"   style="width:100%; height: 35px;" required></td>
													</tr>
                                                    <tr>
														<th>Middle Name(Optional)</th>
														<td><input type="name" name="mname"   style="width:100%; height: 35px;" ></td>
													</tr>
                                                    <tr>
														<th>Last Name <label id="lnameLabel" style="color:red">*</label></th>
														<td><input type="name" name="lname" id="lname"   style="width:100%; height: 35px;" required></td>
													</tr>
													<tr>
														<th>Contact No  <label id="contactLabel" style="color:red">*</label></th>
														<td><input name="contactno" id="contact"  type='tel' minlength="11" maxlength="11"  pattern="^09\d{9}$|^\+63\d{10}$"  style="width:100%; height: 35px;" required></td>
													</tr>
													
													<tr>
														<th>House No. (Optional)</th>
														<td><input type="number" name="houseno"   style="width:100%; height: 35px;"></td>
													</tr>
												

													
													<tr>
														<th>Address <label id="locationLabel" style="color:red">*</label></th>
														<td>
														<select name='location' id='location' style='width:100%;height: 35px;' required>
														<option>Select Barangay</option>
														<?php
															$loc="SELECT * FROM tbladdress";
															$resloc=mysqli_query($conn,$loc)or die(mysqli_error($connect));
															while($rw=mysqli_fetch_assoc($resloc))
															{
																$ai=$rw['address_ID'];
																$b=$rw['Barangay'];
																$m=$rw['Municipality'];
																$p=$rw['Province'];
														?>
															<option value="<?php echo $ai;?>" ><?php echo $b." ".$m." ".$p?></option>
														<?php
															}
														?>
														</select>
													</tr>
													<tr>
														<th>Email Address <label id="emailLabel" style="color:red">*</label></th>
														<td><input type="email" id="email" name="email" style="width:100%; height: 35px;" ></td>
													</tr>


													<tr>
														<th>Password <label id="emailLabel" style="color:red">*</label></th>
														<td><input type="password"  name="password" style="width:100%; height: 35px;" ></td>
													</tr>
													<!-- <tr>
														<th>Password<label id="passwordLabel" style="color:red">*</label></th>
														<td><input type="password" id="password" name="password" style="width:100%; height: 35px;" ></td>
													</tr> -->



													<tr>
														<th>Classification  <label style="color:red">*</label></th>
														<td>
														<select name='classification' style='width:100%;height: 35px;' required>
															<option value="Residential">Residential </option>
															<option value="Residential">Non-Residential </option>
														
														</select>
													</tr>

												
													<tr>
														<th>Upload 2by2 Picture <label style="color:red">*</label></th>
														<td><input type="file" name="image3[]"  required /></td>
													</tr>

													
                                           

													<tr>
													<td colspan="2">
														<center>
														<div id="design" >
														<br>
															
														<div class="tacbox">
															<input id="checkbox" type="checkbox" required>
															<label for="checkbox">
															<a href="#" id="showDesign" style="font-size:18px; color:red" onclick="openModal()">Terms and Conditions</a>
															</label>

															</div>
															<button type="submit" name="submit" class="btn btn-primary px-5" style="font-size:20px;" > Submit</button>
                                                            <a href="register_category.php" id="cancel" name="cancel"  class="btn btn-danger px-5 " style="font-size:20px;">Cancel</a>
															</center>
														</td>

													</tr>
													</form>

										
<!-- 													
													</div>
														</div> -->
											</table>
											<br>



											</div>
							

</div>
	</section>


    <?php
	 include 'includes/footer.php'
	  ?>



<style>
.tacbox {
  display:block;
  margin-top:10px;
}

#showDesign{
color:#0069D9;

}

	</style>


<div id="overlay" class="overlay" onclick="closeModal()"></div>

<div id="modal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()" style="font-size:37px;">&times;</span>
    <iframe src="example-term-and-condition.php"></iframe>
    <div class="overlay-close overlay-close-left" onclick="closeModal()"></div>
    <div class="overlay-close overlay-close-right" onclick="closeModal()"></div>
  </div>
</div>



<script>
	function openModal() {
  var modal = document.getElementById("modal");
  var overlay = document.getElementById("overlay");
  modal.style.display = "block";
  overlay.classList.add("modal-open");
  document.body.style.overflow = "hidden"; // Ito ang karagdagang linya para mai-disable ang scrolling ng background
}

function closeModal() {
  var modal = document.getElementById("modal");
  var overlay = document.getElementById("overlay");
  overlay.classList.remove("modal-open");
  modal.style.display = "none";
  document.body.style.overflow = "auto"; // Ito ang karagdagang linya para ibalik ang scrolling ng background
}

</script>

<style>
.modal {
  display: none;
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.6);
}

.modal-content {
  position: relative;
  margin: auto;
  padding: 20px;
  width: 80%;
  max-width: 800px;
  height: 90%;
  max-height: 600px;
  background-color: #fff;
  opacity: 0;
  transform: translateY(-50%);
  animation: modal-show 0.5s forwards;
  overflow: auto;
}

@keyframes modal-show {
  0% {
    opacity: 0;
    transform: translateY(-50%);
  }
  100% {
    opacity: 1;
    transform: translateY(0%);
  }
}

.close {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 18px;
  color: #aaa;
  cursor: pointer;
}

iframe {
  width: 100%;
  height: 100%;
  border: none;
}

body.modal-open {
  overflow: hidden;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.6);
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s ease;
}

.modal-open .overlay {
  opacity: 1;
  pointer-events: auto;
}

.overlay-close {
  position: absolute;
  top: 0;
  bottom: 0;
  width: 20%;
  cursor: pointer;
}

.modal-open .overlay-close {
  left: 0;
}

.overlay-close-right {
  right: 0;
}

.overlay-close-left {
  left: 0;
}

</style>







<script type="text/javascript">
		const form = document.querySelector('form');
		const fnameInput = document.querySelector('#fname');
		const lnameInput = document.querySelector('#lname');
		const contactInput = document.querySelector('#contact');
		const locationInput = document.querySelector('#location');

		const emailInput = document.querySelector('#email');
		const passwordInput = document.querySelector('#password');


		const fnameLabel = document.querySelector('#fnameLabel');
		const lnameLabel = document.querySelector('#lnameLabel');
		const contactLabel = document.querySelector('#contactLabel');
		const locationLabel = document.querySelector('#locationLabel');
		const emailLabel = document.querySelector('#emailLabel');
		const passwordLabel = document.querySelector('#passwordLabel');


		fnameInput.addEventListener('input', (event) => {
			if (event.target.value === '') {
				fnameLabel.style.color = 'red';
			} else {
				fnameLabel.style.color = 'black';
			}
		});


		lnameInput.addEventListener('input', (event) => {
			if (event.target.value === '') {
				lnameLabel.style.color = 'red';
			} else {
				lnameLabel.style.color = 'black';
			}
		});



		contactInput.addEventListener('input', (event) => {
			if (event.target.value === '') {
				contactLabel.style.color = 'red';
			} else {
				contactLabel.style.color = 'black';
			}
		});



		locationInput.addEventListener('input', (event) => {
			if (event.target.value === '') {
				locationLabel.style.color = 'red';
			} else {
				locationLabel.style.color = 'black';
			}
		});



		emailInput.addEventListener('input', (event) => {
			if (event.target.value === '') {
				emailLabel.style.color = 'red';
			} else {
				emailLabel.style.color = 'black';
			}
		});

		passwordInput.addEventListener('input', (event) => {
			if (event.target.value === '') {
				passwordLabel.style.color = 'red';
			} else {
				passwordLabel.style.color = 'black';
			}
		});

		form.addEventListener('submit', (event) => {
			event.preventDefault(); // prevent default form submission
			const name = form.elements['name'].value;
			const email = form.elements['email'].value;
			const output = document.createElement('p');
			output.textContent = `Name: ${name}, Email: ${email}`; // create output
			document.body.appendChild(output); // add output to body
		});
	</script>