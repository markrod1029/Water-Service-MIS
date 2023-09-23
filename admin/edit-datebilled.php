<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "advisory"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
    <li style='color:black'>Admin</li>
      <li style='color:black'>SOA</li>
      <li style='color:black'>Date Billed</li>
    </ul>

  </div>
  </section>

  <section class="section main-section">
  <?php
        if(isset($_SESSION['error'])){
          echo "
		  <div class='notification red'>
		  <div class='flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0'>
			<div>
			  <span class='icon'><i class='fa fa-warning'></i></span>

              ".$_SESSION['error']."
			  </div>
			  <button type='button' class='button small textual --jb-notification-dismiss'>Dismiss</button>
			</div>
		  </div>
          ";
          unset($_SESSION['error']);
        }
		
        if(isset($_SESSION['success'])){
          echo "
		  <div class='notification green'>
		  <div class='flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0'>
			<div>
			  <span class='icon'><i class='fa fa-check'></i></span>

              ".$_SESSION['success']."
			  </div>
			  <button type='button' class='button small textual --jb-notification-dismiss'>Dismiss</button>
			</div>
		  </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
    <div class="card has-table" style='color:blue'>

	<form method="POST">
		<?php
        $id = $_GET['edit'];
			$client="SELECT * FROM date_billed WHERE billed_ID = '$id'";
			$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
			while($rw=mysqli_fetch_assoc($res))
			{
				$billed=$rw["date_billled"];
				$from=$rw["from_date"];
				$to=$rw["to_date"];
				$due=$rw["due_date"];
		?>
		<table>
			<tr>
				<th>Date Billed</th>
				<td style='background:white;'><input type='text' value="<?php echo $billed?>" name="billed" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			
			<tr>
				<th>From</th>
				<td style='background:white'>
				<input type='date' name="from"  value="<?php echo $from?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>

			<tr>
				<th>To</th>
				<td style='background:white'>
				<input type='date' name="to"  value="<?php echo $to?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>
			<tr>
				<th>Due Date</th>
				<td style='background:white'>
				<input type='date' name="due"  value="<?php echo $due?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>

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
	<?php } ?>
    </form>
    </div>

  </section>


<?php include 'includes/footer.php' ?>


<?php
			if(isset($_POST['submit']))
			{
			
                $billed=$_POST['billed'];
                $from=$_POST['from'];
                $to=$_POST['to'];
                $due=$_POST['due'];
													
													
				$update="UPDATE date_billed SET date_billled='$billed',from_date='$from', to_date='$to', due_date='$due' WHERE billed_ID='$id'";
			if($connect->query($update)){
				$_SESSION['success'] = 'Date Billed Updated successfully';


				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Updated a Date Billed')";
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

        if(isset($_POST['btncancel']))
		{
			echo
				"
					<script>
                    window.location='private-advisory.php';

					</script>
				";
		}
		?>

