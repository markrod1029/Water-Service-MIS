<?php include 'includes/session.php';?>

<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "plumber"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
    <li style='color:black'>Admin</li>
        <li style='color:black'>Plumbers</li>
        <li style='color:black'> Plumber List</li>
    </ul>

	<div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h2 class="title">
    </h2>
    <a href = "add-plumber.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add Plumber</a>
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

				$_SESSION['error'] = 'No Plumber Selected!';

				
			}else
			{
				$mark1=implode(',',$mark);
				$up=mysqli_query($connect,"DELETE FROM tblplumber WHERE plumber_ID IN($mark1)")or die(mysqli_error($connect));
			
			
				$_SESSION['success'] = 'Plumber successfully DELETED';
				
			}
		}
	?>

<div  >
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
       
		<button type='button' name='btndel' class='button small green --jb-modal'   onclick="window.open('print/print-plumber.php', '_blank','pagename','resizable,height=500,width=1000')" id='myButton' style='width:100px'>
				<span class='icon'>Print</span>
		</button>

      </div>
    </div>
	<table id="dataTable"  class="cell-border" with="100"  >
	<!-- <button class='button small green' style="font-size:15px;  " onclick=window.location.href="clients.php"   type='button' name="print" > Add Client<button> -->
            
	<thead style="color:black;">
			  <tr>

			  <tr>
				
				<script>
				$('#select-all1').click(function(event) {   
					if(this.checked) {
						// Iterate each checkbox
						$('.all').each(function() {
							this.checked = true;                        
						});
					} else {
						$('.all').each(function() {
							this.checked = false;                       
						});
					}
				}); 
				</script>

				<th>Photo</th>
				<th>Plumber ID</th>
				<th>Plumber Name</th>
                <th>Email</th>
                <th>Contact No.</th>
                <th>Position</th>
                <th>Control</th>
			  </tr>
			  </thead>
			  <tbody >
					<?php

				// 		$qry="SELECT *,tblplumber.plumber_ID AS pid FROM tblplumber
				// LEFT JOIN tbladdress ON tbladdress.address_ID = tblplumber.address_ID ";
				$qry="SELECT *,tblplumber.plumber_ID AS pid FROM tblplumber WHERE position = 'plumber'";
				$query = $connect->query($qry);
						$num=mysqli_num_rows($query);
						if($num>0)
						{

						while($row = $query->fetch_assoc()){

							if($row['position']=='plumber')
								{
									$status = "Administrative Aide 1 - Plumber";
								}else
								{
									$status =  "Administrative Aide 1 - Customer  Clerk";
								}

							?>
	
					
						<tr>

					
						<td class="image-cell">

						<img class="pic"  src="<?php echo (!empty($row['images']))? '../upload/plumber/'.$row['images']:'../upload/plumber/images.jpg'; ?>" 
						width='50%' height='50%' style='border: solid blue 1px' class="rounded-full">
						</td>

						<td data-label="House_No"><?php echo $row['plumber_no']?></td>
						<td data-label="Plumber Name"><?php echo $row['Fname'].' '.$row['Mname'].' '. $row['Lname'] ?></td>
					
						</td>
						<td data-label="Email"><?php echo $row['Email']?></td>
						<td data-label="Contact No."><?php echo $row['ContactNo']?></td>
						<td data-label="position"><?php echo $status?></td>
						
						<td class="actions-cell">
						<div class='buttons right nowrap'>
							<a  href="view-plumber.php?ctid=<?php echo $row['pid'];?>" class='button small blue --jb-modal'  data-target='sample-modal-2' type='button'  >
								  <span class='icon'><i class='mdi mdi-eye'></i></span>
							</a>
							<a type='button' href="edit-plumber.php?ctid=<?php echo $row['pid'];?>"  class='button small green --jb-modal'  data-target='sample-modal-3' type='button'>
							  <span class='icon'><i class='fa fa-edit'></i></span>
							</a>


							<a type='button' href="CRUD/delete-plumber.php?ctid=<?php echo $row['pid'];?>"  onclick="return confirm('Are you sure you want to Delete this User?')" class='button small red --jb-modal' data-target='sample-modal' type='button'>
							  <span class='icon'><i class='mdi mdi-trash-can'></i></span>
						</a>
						  </div>
						  
						</td>
						</tr>
						
									
						<?php }
					}
					else{
					?>
						<tr>
							<td colspan='7' style='text-align:center;font-weight:bold;background:white'><br><br>--NO PLUMBER APPROVE--</td>
						</tr>
					<?php }?>
						
					
								
			  </tbody>
                        </table>

						</form>

	</div>
	</div>


    </div>

  </section>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>


<?php include 'includes/footer.php' ?>


<style>
table.dataTable thead th {
    border-bottom: 1px solid #111;
}
 
table.dataTable tfoot th {
    border-top: 1px solid  #111;
}
	</style>