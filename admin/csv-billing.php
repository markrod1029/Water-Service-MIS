<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "client"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>SOA</li>
      <li style='color:black'> Import CSV</li>
    </ul>

  </div>
  </section>
  <br>

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

    <form method="POST"  enctype='multipart/form-data'>
		<table>

       
            
			




			<tr>
				<th>Upload SOA CSV</th>
				<td  style='background:white'><input type="file" name="upcsv"  style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"    /></td>
													</tr>
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
				<button type="button" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="window.location.href='clients.php'">Cancel</button>
				</center>
				</td>
			</tr>
		</table>
		</form>
    </div>

  </section>
  <br><br><br><br><br>
  <br><br><br><br><br>
  <br><br><br><br><br>
<?php include 'includes/footer.php' ?>

<?php
if (isset($_POST['submit'])) {
    // (B) READ UPLOADED CSV
    $fh = fopen($_FILES["upcsv"]["tmp_name"], "r");
    if ($fh === false) {
      exit("Failed to open uploaded CSV file");
    }
  
    // Skip the header row
    fgetcsv($fh);
  
    // (C) IMPORT ROW BY ROW
    $stmt = $connect->prepare("INSERT INTO billing (client_ID, billed_ID, present, previous, cubic_meter, penalties, total, status)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt = $connect->prepare("INSERT INTO billing (client_ID, billed_ID, present, previous, cubic_meter, penalties, total, status)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

while (($row = fgetcsv($fh)) !== false) {
  try {
    if (count($row) != 8) {
      // Handle error: the number of columns in the CSV doesn't match the expected number
      continue; // Skip this row and move to the next one
    }

    $client_ID = mysqli_real_escape_string($connect, $row[0]);
    $billed_ID = mysqli_real_escape_string($connect, $row[1]);
    $present = mysqli_real_escape_string($connect, $row[2]);
    $previous = mysqli_real_escape_string($connect, $row[3]);
    $cubic_meter = mysqli_real_escape_string($connect, $row[4]);
    $penalties = mysqli_real_escape_string($connect, $row[5]);
    $total = mysqli_real_escape_string($connect, $row[6]);
    $status = mysqli_real_escape_string($connect, $row[7]);

    $stmt->bind_param("ssssssss", $client_ID, $billed_ID, $present, $previous, $cubic_meter, $penalties, $total, $status);
    $stmt->execute();

    $_SESSION['success'] = 'Import SOA added Successfully';
    $name = $user['Firstname'] . ' ' . $user['Middlename'] . ' ' . $user['Lastname'];
    $position = $user['position'];
    $id = $user['admin_ID'];
    $activityInsert = "INSERT INTO activity (name, position, time_loged, status)
                       VALUES ('$name',  '$position', NOW(), 'Import  as a new SOA')";
    $query = mysqli_query($connect, $activityInsert);

    // ...
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
}
    fclose($fh);
    echo
  "
      <script>
          window.location='billing.php';
      </script>
  ";
  }
  
  
  
?>