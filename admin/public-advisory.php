<?php include 'includes/session.php';?>
 <?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "advisory"; include 'includes/leftbar.php' ?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
     <li style='color:black'>Admin</li>
      <li style='color:black'>Advisory</li>
      <li style='color:black'>Advisory/Announcement</li>
    </ul>
	<div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h2 class="title">
    </h2>
    <a href = "add-advisory.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
		Add Advisory</a>
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
	<?php
		if(isset($_POST['btndel']))
		{
			@$mark=$_POST['chk'];
			if(empty($mark))
			{
				$_SESSION['error'] = 'No Public Advisory Selected!';

			}else
			{
				$mark1=implode(',',$mark);
				$up=mysqli_query($connect,"DELETE FROM tbladvisory WHERE advisory_ID IN($mark1)")or die(mysqli_error($connect));
				
				
				$_SESSION['success'] = 'Public Advisory successfully DELETED';


				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 
				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Selected  Public Advisory Deleted ')";
					$query = mysqli_query($connect,$insert);

			}
			echo
			"
				<script>
					window.location='public-advisory.php';
				</script>
			";
		}
		if(isset($_POST['btnPM']))
		{
			@$mark=$_POST['chk'];
			if(empty($mark))
			{

				$_SESSION['error'] = 'No Public Advisory Selected!';

			
			}else
			{
				$mark1=implode(',',$mark);
				$up=mysqli_query($connect,"UPDATE tbladvisory SET Status='0' WHERE advisory_ID IN($mark1)")or die(mysqli_error($connect));
				
				
				$_SESSION['success'] = 'Selected Advisory Turn Private!';
				
				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 
				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Selected Public Advisory Turn Private ')";
					$query = mysqli_query($connect,$insert);
			}
			echo
			"
				<script>
					window.location='public-advisory.php';
				</script>
			";
		}
	?>
	
    </div>
   <div class="  bg-gray-50" >

	<table id="dataTable"  class="cell-border" >
			<thead>
			  <tr>
			 
			
			
				<th>What</th>
                <th>When</th>
                <th>Time</th>
                <th>Affected Area/s</th>
				<th>Reason</th>
				<th>Picture</th>
                <th>Control</th>
			  </tr>
			  </thead>


			  
			  <tbody>

			  <?php

						$qry="SELECT *,tbladvisory.advisory_ID AS aid FROM tbladvisory
						LEFT JOIN tbladdress ON tbladdress.address_ID = tbladvisory.address_ID  WHERE tbladvisory.Status='1'  ";
						$query = $connect->query($qry);
						while($row = $query->fetch_assoc()){
							?>
				
	
						<td data-label="What"><?php echo $row['Wht']?></td>
						<td data-label="Reason"><?php echo $row['Reason']?></td>
						<td data-label="Reason"><?php echo date('F-d-y ', strtotime($row['date']))?></td>
						<td data-label="When"><?php echo  date('H:i A', strtotime($row['time_start'])).' - '.date(' H:i A', strtotime($row['time_end'])) ?></td>
						<td data-label="What"><?php echo $row['Wht']?></td>
						<td data-label="Reason"><?php echo $row['affected_area']?></td>
					
	
						
						<td class="actions-cell">
						
							
						
						<!-- <a   href='public-advisory.php?pub=<?php echo  $row['aid'] ?>'  class='button small blue --jb-modal'  data-target='sample-modal-3'  id='myButton' style='width:100px' >
							<span class='icon'>Private </span></a>
						 -->

					
						
							<a type='button' href='edit-advisory.php?edit=<?php echo  $row['aid'] ?>'  class='button small green --jb-modal'  data-target='sample-modal-3' type='button'>
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

@$del=$_GET['del'];




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
