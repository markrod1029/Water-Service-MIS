<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "advisory"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Advisory</li>
      <li style='color:black'>Edit Advisory</li>
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
    <div class="card has-table">

	<form method="POST">
		<?php
        $id = $_GET['edit'];
			$client="SELECT * FROM tbladvisory WHERE advisory_ID='$id' ";
			$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
			while($rw=mysqli_fetch_assoc($res))
			{
			
		?>
		<table>
				<tr>
				<th>What</th>
				<td style='background:white'><input type='text' name="what" value ="<?php echo $rw["Wht"]?>"style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			<tr>
				<th>When Date</th>
				<td style='background:white'>
				<input type='date' name="date" value ="<?php echo $rw["date"]?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>

			<tr>
				<th>When Time Start</th>
				<td style='background:white'>
				<input type='time' name="start" value ="<?php echo $rw["time_start"]?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>

			<tr>
				<th>When Time End</th>
				<td style='background:white'>
				<input type='time' name="end" value ="<?php echo $rw["time_end"]?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>

				</td>
			</tr>
			<tr>
				<th>Reason</th>
				<td style='background:white'>
				<input type='text' name="reason" value ="<?php echo $rw["Reason"]?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>
			<tr>
				<td style='background:white' colspan="2">
				<center>
				    	<input type='hidden' name="reason" value ="<?php echo $rw["Reason"]?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				<button type="submit" value="Done" name="btnupdate"  style="background:lightblue;font-weight:bold;padding:5px;width:100px">Submit</button>
				<button type="submit" value="Cancel" name="btncancel" style="background:lightblue;font-weight:bold;padding:5px;width:100px">Cancel</button>
				</center>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
		</form>
    </div>

  </section>


<?php include 'includes/footer.php' ?>


<?php
			if(isset($_POST['btnupdate']))
			{
			
                $what=$_POST['what'];
                $date=$_POST['date'];
                $start=$_POST['start'];
                $end=$_POST['end'];
                $reason=$_POST['reason'];
        							
													
				$update="UPDATE tbladvisory SET Wht='$what',date='$date', time_start='$start', time_end='$end', Reason='$reason' WHERE advisory_ID='$id'";
			if($connect->query($update)){
				$_SESSION['success'] = 'Advisort Updated successfully';


				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Updated a Advisory')";
					$query = mysqli_query($connect,$insert);
				echo
				"
					<script>
                    window.location='public-advisory.php';

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
                    window.location='public-advisory.php';

					</script>
				";
		}
		?>

