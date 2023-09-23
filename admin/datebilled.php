<?php include 'includes/session.php';?>
 <?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "billing"; include 'includes/leftbar.php' ?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
     <li style='color:black'>Admin</li>
      <li style='color:black'>SOA</li>
      <li style='color:black'>Date Billed</li>
    </ul>
	<div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h2 class="title">
    </h2>
    <a href = "add-datebilled.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
		Add Date Billed</a>
  </div>
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

	  
  <form method="POST">

    </div>
   <div class="  bg-gray-50" >

	<table id="dataTable"  class="cell-border" >
			<thead>
			  <tr>
			 
			
	
				<th>Date Billed</th>
                <th>From</th>
                <th>To</th>
                <th>Due Date</th>
                <th>Control</th>
			  </tr>
			  </thead>


			  
			  <tbody>

			  <?php

						$qry="SELECT * FROM date_billed ORDER BY from_date ASC";
						$query = $connect->query($qry);
						while($row = $query->fetch_assoc()){
							?>
				
	
					
						<td data-label="What"><?php echo $row['date_billled']?></td>
						<td data-label="When"><?php echo  date('F-d-Y', strtotime($row['from_date']))?></td>
						<td data-label="When"><?php echo  date('F-d-Y', strtotime($row['to_date']))?></td>
						<td data-label="When"><?php echo  date('F-d-Y', strtotime($row['due_date']))?></td>

					
						<td class="actions-cell">
						
							<a type='button' href='edit-datebilled.php?edit=<?php echo  $row['billed_ID'] ?>'  class='button small green --jb-modal'  data-target='sample-modal-3' type='button'>
							  <span class='icon'><i class='fa fa-edit'></i></span>
						</a>

							<a type='button' href='public-advisory.php?del=<?php echo $row['aid'] ?>'  onclick="return confirm('Are you sure you want to Delete this Advisory?')"  class='button small red --jb-modal' data-target='sample-modal' type='button'>
							  <span class='icon'><i class='mdi mdi-trash-can'></i></span>
						</a>
						
						
						  
						</td>
						</tr>
						<?php } ?>

					
			  </tbody>
		</table>
    </div>
	</form>
  </section>
  <br>
<br>
<br>
<br>
<br>

<?php include 'includes/footer.php' ?>


  
<?php

@$pub=$_GET['pub'];
@$del=$_GET['del'];
if($pub==TRUE)
{

	$sql = "UPDATE tbladvisory SET Status='0' WHERE  advisory_ID = '$pub'";
	if($connect->query($sql)){

		$_SESSION['success'] = 'Advisory Turn Private!';
		$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 
		$insert = "INSERT INTO activity( name, position,  time_loged, status)
			VALUES( '$name', 'Admin',   NOW(),  'Public Advisory Turn Private')";
			$query = mysqli_query($connect,$insert);
		}
	
		else{
		$_SESSION['error'] = $connect->error;
		}

		echo
				"
					<script>
						window.location='public-advisory.php';
					</script>
				";
}



if($del==TRUE)
{
	


$sql = "UPDATE tbladvisory SET Status='5' WHERE advisory_ID = '$del'";

if($connect->query($sql)){
$_SESSION['success'] = 'Public Delete successfully';


$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 
$insert = "INSERT INTO activity( name, position,  time_loged, status)
	VALUES( '$name', 'Admin',   NOW(),  'Delete a Public Advisory')";
	$query = mysqli_query($connect,$insert);

}

else{
$_SESSION['error'] = $connect->error;
}

echo
"
	<script>
		window.location='public-advisory.php';
	</script>
";

}



?>
