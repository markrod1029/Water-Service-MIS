<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "advisory"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
    <li style='color:black'>Admin</li>
      <li style='color:black'>Complaint Category</li>
      <li style='color:black'>Add Category</li>
    </ul>

  </div>
  </section>

  <section class="section main-section">
  
    <div class="card has-table" style='color:blue'>

   
		<form method="POST">
		<table>
			<tr>
				<th>What</th>
				<td style='background:white'><input type='text' name="category" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
				<button type="button" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="window.location.href='dashboard.php'">Cancel</button>
				</center>
				</td>
			</tr>
		</table>
		</form>
    </div>
    </div>

  </section>

  <br>
<br>
<br>
<br>
<br>
<?php include 'includes/footer.php' ?>
<?php
		if(isset($_POST['submit']))
		{
			$category = htmlspecialchars( $_POST['category'], ENT_QUOTES, 'UTF-8');
			
			
			$adv="INSERT INTO complaint_category(category) VALUES('$category')";
			if($connect->query($adv)){
				$_SESSION['success'] = 'Complaint Category Added successfully';

				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Added as a new Complaint Category')";
					$query = mysqli_query($connect,$insert);

				echo
				"
					<script>
					window.location='complaint-category.php';

					</script>
				";
			}

			else{
				$_SESSION['error'] = $connect->error;
			}
            echo
            "
                <script>
                window.location='complaint-category.php';

                </script>
            ";
		}
		?>