<?php include 'includes/session.php';?>

 <?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "location"; include 'includes/leftbar.php' ?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
     <li style='color:black'>Admin</li>
      <li style='color:black'>Location</li>
      <li style='color:black'>Location List</li>
    </ul>
	<div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h2 class="title">
    </h2>
    <a href = "add-locations.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
		Add Location</a>
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

      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        
		<button type='button' name='btndel' class='button small green --jb-modal'   onclick="window.open('print/print_loc.php', '_blank','pagename','resizable,height=500,width=1000')" id='myButton' style='width:100px'>
				<span class='icon'>Print</span>
		</button>
<!--<button type='submit' name='btnPM' class='button small green --jb-modal'   onclick='doSomething()' id='myButton' style='width:100px'>
				<span class='icon'>Private Marked</span>
		</button>
		<button type='submit' name='btnsend' class='button small green --jb-modal'   id='myButton' style='width:100px'>
				<span class='icon'>Send to Plumber</span>
		</button>-->
      </div>
    </div>
   <div class="  bg-gray-50" >

	<table id="dataTable"  class="cell-border" >
			<thead>
			  <tr>
			  
				<th>Barangay</th>
                <th>Municipality</th>
                <th>Province</th>
                <th>Control</th>
			  </tr>
			  </thead>
			  <tbody>
				
			
			  <?php

						$qry="SELECT * FROM tbladdress";
						$query = $connect->query($qry);
						$c =1;
						while($row = $query->fetch_assoc()){
							?>
				
					<tr>
						<td data-label="Barangay"><?php echo $row['Barangay']?></td>
						<td data-label="Municipality"><?php echo $row['Municipality']?></td>
						<td data-label="Province"><?php echo $row['Province']?></td>
						<td class="actions-cell">
						


						<a type='button' href="view-locations.php?ctid=<?php echo  $row['address_ID'] ?>" class='button small blue --jb-modal'  data-target='sample-modal-3' type='button'>
							  <span class='icon'><i class='fa fa-eye'></i></span></a>

							<a type='button' href="edit-locations.php?ctid=<?php echo  $row['address_ID'] ?>" class='button small green --jb-modal'  data-target='sample-modal-3' type='button'>
							  <span class='icon'><i class='fa fa-edit'></i></span>
						<!-- </a>
							<a type='button'  href="locations.php?ctid=<?php echo  $row['address_ID'] ?>" class='button small red --jb-modal' data-target='sample-modal' type='button'>
							  <span class='icon'><i class='mdi mdi-trash-can'></i></span>
						</a> -->
						
						</td>
					</tr>
					<?php
							$c++;
						} ?>
				
			  </tbody>
		</table>
    </div>
	</form>
  </section>
  <script>
		document.onkeyup = function(e) {
		  if (e.which == 113 ) {
			if(confirm('Are sure to End Process?'))
			{
				window.location='dashboard.php';
			}else
			{
				return false;
			}
		  } else if (e.ctrlKey && e.which == 80) 
		  {
			if(confirm('Do Really want to Print?'))
			{
				window.open('print_loc.php', '_blank','pagename','resizable,height=500,width=1000');
			}else
			{
				return false;
			}
		  } 
		};
		document.addEventListener("keydown", function (event) {
		if (event.ctrlKey) {
        event.preventDefault();
		}   
});
	</script>
<br>
<br>
<br>
<br>
<br>


<?php include 'includes/footer.php' ?>

