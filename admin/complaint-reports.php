<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "report"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Reports</li>
      <li style='color:black'> Complaints Reports</li>
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



	
	
	</div>
	

 
     <div class="  bg-gray-50" >
	 <div class="container mt-4">
		<input type="date" id="customFilter" class=" custom-cls" aria-controls="userTable">

		<a href = "print/print-complaint-daily.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Print Daily</a> 
<a href = "print/print-complaint-monthly.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Print Monthly</a>
<a href = "print/print-complaint-annually.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Print Annually</a>

	<table id="userTable"  class="cell-border" >
			<thead>
			  <tr>
			  <th>Date</th>
				<th>Meter No.</th>
				<th>Client Name</th>
				<th>Address</th>
				<th>Complaint Category</th>
				<th>Complaint</th>
                <th>Complaint/Concern</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php
						$qry="SELECT * FROM tblcomplaints 
						LEFT JOIN inspection_schedule_for_complaints ON inspection_schedule_for_complaints.complaint_ID = tblcomplaints.complaint_ID
						LEFT JOIN complaint_category ON complaint_category.category_ID = tblcomplaints.they_complaint 
						LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID
						LEFT JOIN tbladdress ON tbladdress.address_ID = tblclients.address_ID 
						LEFT JOIN tblplumber ON tblplumber.plumber_ID = inspection_schedule_for_complaints.plumber_ID 
						WHERE  tblcomplaints.Complaint_Status='1' ORDER BY tblcomplaints.Date DESC ";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				
					while($row = $query->fetch_assoc()){

						
				?>
						<tr>
						<td data-label="Date"><?php echo date('F-d-Y H:i A', strtotime($row['Date']))?></td>
							<td data-label="#"><?php echo $row['meter_no']?></td>
							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
						<td data-label="Location"><?php echo $row['House_No'].'. '. $row['Barangay'].' '.$row['Municipality'].' '. $row['Province']?></td>

							<td data-label="Complaint"><?php echo $row['category']?></td>
							<td data-label="Complaint"><?php echo $row['complaint']?></td>
							<td data-label="Complaint"><?php
									if( $row['sentToPlumber']==1)
									{
										echo
										"
											Complaint
										";
									}else
									{
										echo
										"
										Concern
										";
									}
								?></td>

							<!-- <td data-label="Complaint_Status">
								<?php
								// 	if( $row['visited']==1)
								// 	{
								// 		echo
								// 		"
								// 			Done
								// 		";
								// 	}else
								// 	{
								// 		echo
								// 		"
								// 			Pending...
								// 		";
								// 	}
								// ?>
							</td> -->
						
						</tr>
							<?php
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
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>


<?php include 'includes/footer.php' ?>


<script>
        $("document").ready(function () {

            $("#userTable").dataTable({
                "searching": true,
				"lengthChange": false
            });

            var table = $('#userTable').DataTable();

            $("#userTable_filter.dataTables_filter").append($("#customFilter"));

            var index = 0;
            $("#userTable th").each(function (i) {
                if ($($(this)).html() == "Complaint Date") {
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
        });
    </script>
