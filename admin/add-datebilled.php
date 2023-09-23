<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "advisory"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
    <li style='color:black'>Admin</li>
      <li style='color:black'>Advisory</li>
      <li style='color:black'>Add Advisory</li>
    </ul>

  </div>
  </section>

  <section class="section main-section">
  
    <div class="card has-table" style='color:blue'>

   
		<form method="POST">
		<table>
			<tr>
				<th>Date Billed</th>
				<td style='background:white;'><input type='text' name="billed" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			
			<tr>
				<th>From</th>
				<td style='background:white'>
				<input type='date' name="from" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>

			<tr>
				<th>To</th>
				<td style='background:white'>
				<input type='date' name="to" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>
			<tr>
				<th>Due Date</th>
				<td style='background:white'>
				<input type='date' name="due" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>

				</td>
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
	

			$billed = htmlspecialchars( $_POST['billed'], ENT_QUOTES, 'UTF-8');
			$from=$_POST['from'];
			$to=$_POST['to'];
			$due=$_POST['due'];

			$adv="INSERT INTO date_billed(date_billled, from_date ,to_date, due_date)
			VALUES('$billed','$from','$to','$due')";
			if($connect->query($adv)){
				$_SESSION['success'] = 'Date Billed Added successfully';

				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Added as a new Date Billed')";
					$query = mysqli_query($connect,$insert);

				echo
				"
					<script>
					window.location='datebilled.php';

					</script>
				";
			}

			else{
				$_SESSION['error'] = $connect->error;
			}

		}
		?>