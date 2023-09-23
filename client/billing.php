<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "billing"; include 'includes/leftbar.php' ?>


<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Client</li>
      <li style='color:black'>Statement Of Account</li>
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
	<div id='em' >
	
    <div class=""  style='' >
    <div class="container mt-4">
        <select id="customFilter" class=" custom-cls" aria-controls="userTable">
            <option value="">Show All</option>
            <option value="Unpaid">Unpaid</option>
            <option value="Paid">Paid</option>
        </select>

	<table id="userTable"  class="cell-border" with="100" >
            
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
                				<th>Status</th>
								<th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
							<?php	
						$id = $user['client_ID'];
							$qry="SELECT *, billing.billing_ID AS bid FROM billing 
                        LEFT JOIN tblclients ON tblclients.client_ID =  billing.client_ID
                        LEFT JOIN date_billed ON billing.billed_ID =  date_billed.billed_ID
					LEFT JOIN tbladdress ON tbladdress.address_ID = tblclients.address_ID
						 WHERE   billing.client_ID = '$id'  ";
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
										<td data-label="Complaint"><?php echo $row['status']?></td>
							<td class="actions-cell">
						
									<a class='button small green --jb-modal' href="SOA.php?id=<?php echo $row['bid'] ?>"  data-target='sample-modal-2' type='button' >
									  <span class='icon'><i class='fa fa-eye'></i></a>
									</button>
                                 

									
							
								
							</td>
						</tr>

						<?php
					}
				}?>
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


<?php include 'includes/footer.php' ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

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
                if ($($(this)).html() == "Status") {
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