<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "billing"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Statement Of Account</li>
    </ul>
	<div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h2 class="title">
    </h2>
    <a href = "csv-billing.php"  style="position:relative; right:10px;" class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-4">
		Import CSV</a>

    <a href = "search.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add Billing</a>
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

	<div class="container mt-4">


		<!-- <style>
  .custom-cls {
    position: absolute;
    top: 150px;
    right: 12px;
    margin: 10px;
    z-index: 1;
  }
  
  .dataTables_filter {
    position: relative;
    padding-right: 200px; /* Adjust this value according to the width of your select elements */
  }
		</style> -->

		<style>
  .custom-cls {
    margin-bottom: 10px;
    margin-right: 0px;
  }

  .custom-filter-container {
    margin-bottom: 10px;
    text-align: right;
  }
</style>

<!-- <a href = "print/print-client.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Print Daily</a> -->
<a href = "print/print-billing-monthly.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Print Monthly</a>
<a href = "print/print-billing-annually.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Print Annually</a>


<div class="custom-filter-container">
  <select id="customFilter" class="custom-cls" aria-controls="userTable">
    <option value="">Select Month</option>
    <option value="January">January</option>
    <option value="February">February</option>
    <option value="March">March</option>
    <option value="April">April</option>
    <option value="May">May</option>
    <option value="June">June</option>
    <option value="July">July</option>
    <option value="August">August</option>
    <option value="September">September</option>
    <option value="October">October</option>
    <option value="November">November</option>
    <option value="December">December</option>
  </select>

  <select id="customFilter1" class="custom-cls" aria-controls="userTable">
	<option value="">Select Year</option>
  <?php
  $currentYear = date('Y');
  $startYear = $currentYear - 10; // Start 10 years ago
  $endYear = $currentYear + 10; // End 10 years from now
  
  for ($year = $startYear; $year <= $endYear; $year++) {
    echo '<option value="' . $year . '">' . $year . '</option>';
  }
  ?>
  </select>


		<table id="userTable"  class="cell-border">
			<thead>
			  <tr>
				<th>Meter No.</th>
				<th>Client Name</th>
				<th>Date Billed</th>
         <th>Consumption Month</th>
         <th>Due Date</th>
				<th>Cubic Meter Consumed</th>
				<th>Amount Due</th>
				<th>Penalty</th>
				
                <th>Control</th>
			  </tr>
			  </thead>
			  <tbody>

			<?php

						$qry="SELECT *, billing.billing_ID AS bid FROM billing 
                        LEFT JOIN tblclients ON tblclients.client_ID =  billing.client_ID
                        LEFT JOIN date_billed ON billing.billed_ID =  date_billed.billed_ID
					LEFT JOIN tbladdress ON tbladdress.address_ID = tblclients.address_ID
						 WHERE billing.status  = 'Unpaid' ORDER BY date_billed.due_date DESC";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						
				?>
						<tr>
							<td data-label="#"><?php echo $row['meter_no']?></td>
								<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
							<td data-label="Date"><?php echo $row['date_billled'] ?></td>
							<td data-label="Plumber Name"><?php echo date('F-d-Y', strtotime( $row['from_date'])).' - '.date('F-d-Y', strtotime( $row['to_date']))  ?></td>
							<td data-label="Date"><?php echo date('F-d-Y', strtotime( $row['due_date']));?></td>
							<td data-label="Complaint"><?php echo $row['cubic_meter']?> Cubic Meters</td>
							<td data-label="Complaint"><?php echo $row['total']?> Pesos</td>
							<td data-label="Complaint"><?php echo $row['penalties']?> Pesos</td>
							
							<td class="actions-cell">
						
									<a class='button small blue --jb-modal' href="SOA.php?id=<?php echo $row['bid'] ?>"  data-target='sample-modal-2' type='button' >
									  <span class='icon'><i class='mdi mdi-eye'></i></a>
									</button>
                                    <button type='button' name='cancel' onclick=window.location.href='edit-billing.php?id=<?php echo $row['bid'] ?>' class='button small green --jb-modal' data-target='sample-modal' type='button'>
									  <span class='icon'><i class='fa fa-edit'></i></span>
									</button>

									<a type='button'onclick="return confirm('Are you sure you want to Delete this Billing?')" href="CRUD/delete-billing.php?id=<?php echo $row['bid'];?>" class='button small red --jb-modal' data-target='sample-modal' type='button'>
							  <span class='icon'><i class='mdi mdi-trash-can'></i></span>
							</a>
							
								
							</td>
						</tr>
							<?php
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

<?php include 'includes/footer.php' ?>


<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script>
        $("document").ready(function () {

            $("#userTable").dataTable({
                "searching": true,
				"lengthChange": false,
	
            });

            var table = $('#userTable').DataTable();

            $("#userTable_filter.dataTables_filter").append($("#customFilter"));

            var index = 0;
            $("#userTable th").each(function (i) {
                if ($($(this)).html() == "Consumption Month") {
                    index = i;
                    return false;
                }
            });

            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var selectedItem = $('#customFilter').val()
                    var gender = data[index];
                    if (selectedItem === "" || gender.includes(selectedItem)) {
                        return true;
                    }
                    return false;
                }
            );

         
            $("#customFilter").change(function (e) {
                table.draw();
            });

            table.draw();


			

            $("#userTable_filter.dataTables_filter").append($("#customFilter1"));

            var index = 0;
            $("#userTable th").each(function (i) {
                if ($($(this)).html() == "Consumption Month") {
                    index = i;
                    return false;
                }
            });

            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var selectedItem = $('#customFilter1').val()
                    var gender = data[index];
                    if (selectedItem === "" || gender.includes(selectedItem)) {
                        return true;
                    }
                    return false;
                }
            );

         
            $("#customFilter1").change(function (e) {
                table.draw();
            });

            table.draw();
        });
    </script>
