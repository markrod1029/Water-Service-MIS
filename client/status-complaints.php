<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "complaint"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:lightblue'>Client</li>
      <li style='color:lightblue'>Complaint</li>
      <li style='color:darkblue'> Complaints Status</li>
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
	

	<div class="  bg-gray-50">
	  <div class="container mt-4">
        <select id="customFilter" class=" custom-cls" aria-controls="userTable">
		<option value="">Show All</option>
            <option value="Pending">Pending</option>
            <option value="On Going">On Going</option>
            <option value="Done">Done</option>
        </select>

	<table id="userTable"  class="cell-border" with="100" >
			<thead>
			  <tr>
                <th>Complaint Catgeory</th>
                <th>Customer Complaint</th>
				<th>Assigned Plumber</th>
                <th>Status</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php
						$id = $user['client_ID'];
						$qry="SELECT * FROM tblcomplaints
						LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID
						LEFT JOIN tblplumber ON tblplumber.plumber_ID = tblcomplaints.plumber_ID 
						WHERE tblcomplaints.client_ID = '$id' ";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
				if($num>0)
				{
					while($row = $query->fetch_assoc()){

						
				?>
						<tr>
						
							<td data-label="Complaint"><?php echo $row['they_complaint']?></td>
							<td data-label="Complaint"><?php echo $row['complaint']?></td>
							<td data-label="Plumber Name"><?php echo $row['Fname'].' '. $row['Mname'].' '.$row['Lname']?></td>
							<td data-label="Complaint_Status">
								<?php
									if( $row['sentToPlumber']==0)
									{
										echo
										"
                                        Pending...
										";
									}
									
									else if( $row['sentToPlumber']==1 && $row['Complaint_Status']==0)
									{
										echo
										"
											On Going
										";
									}

									
									else 
									{
										echo
										"
											Done
										";
									}
								?>
							</td>
						
						</tr>
							<?php
					}
				}else
				{
					echo
					"
						<tr>
							<td colspan='7' style='text-align:center;font-weight:bold;background:white'><br><br>--NO STATUS COMPLAINTS--</td>
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