<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "system"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Complaint Category</li>
      <li style='color:black'>Manage Category</li>
    </ul>
	<div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h2 class="title">
    </h2>
    <a href = "add-category.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add Category</a>
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



	
	
	</div>
	<div id='em' >
	
    <div class=" has-table" >
		<table id="dataTable"  class="cell-border">
			<thead>
			  <tr>
			
				<th>Complaint Category</th>
				<th>Action</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php

						$qry="SELECT * FROM complaint_category";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
                        $c = 1;

				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						
				?>
						<tr>
						
							<td data-label="Complaint"><?php echo $row['category']?></td>
							
							<td class="actions-cell">
						
                                    <a type='button' name='cancel' href='edit-category.php?id=<?php echo $row['category_ID'] ?>' class='button small green --jb-modal' data-target='sample-modal' type='button'>
									  <span class='icon'><i class='fa fa-edit'></i></span>
                    </a>

									<a type='button'onclick="return confirm('Are you sure you want to Delete this Complaint Category?')" href="complaint-category.php?del=<?php echo $row['category_ID'];?>" class='button small red --jb-modal' data-target='sample-modal' type='button'>
							  <span class='icon'><i class='mdi mdi-trash-can'></i></span>
							</a>
							
								
							</td>
						</tr>
							<?php
					  $c++;
                    }
				}else
				{
					echo
					"
						<tr>
							<td colspan='9' style='text-align:center;font-weight:bold;background:white'><br><br>--NO PENDING SOA--</td>
						</tr>
					";
				}
              

						?>
			  </tbody>
		</table>
	</div>
	</div>


    </div>

  </section>
  <br>
  <br>
  <br>
  <br>


<?php include 'includes/footer.php' ?>

<?php
@$del=$_GET['del'];

if($del==TRUE)
{
	


$sql = "DELETE FROM complaint_category WHERE category_ID  = '$del'";

if($connect->query($sql)){
$_SESSION['success'] = 'Complaint Category Delete successfully';


$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 
$insert = "INSERT INTO activity( name, position,  time_loged, status)
	VALUES( '$name', 'Admin',   NOW(),  'Delete a Complaint Category')";
	$query = mysqli_query($connect,$insert);

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