<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "report"; include 'includes/leftbar.php' ?>



<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Reports</li>
      <li style='color:black'> Advisory Reports</li>
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
 <a href = "print/print-advisory-daily.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Print Daily</a> 
<a href = "print/print-advisory-monthly.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Print Monthly</a>
<a href = "print/print-advisory-annually.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Print Annually</a>

		<input type="date" id="customFilter" class=" custom-cls" aria-controls="userTable">

	<table id="userTable"  class="cell-border" >
			<thead>
			  <tr>
              <th>What</th>
                <th>Reason</th>
                <th>When</th>
                <th>time</th>
				<th>Affected Area/s</th>
				<th>Memorandum</th>
			  </tr>
			  </thead>
			  <tbody>
				
			<?php

                    $qry="SELECT *,tbladvisory.advisory_ID AS aid FROM tbladvisory WHERE Status!='0' ORDER BY date DESC";
					$query = $connect->query($qry) ;
					$num=mysqli_num_rows($query);
				
                    $c = 1;
					while($row = $query->fetch_assoc()){

						
				?>
						<tr>
                        <td data-label="What"><?php echo $row['Wht']?></td>
						<td data-label="Reason"><?php echo $row['Reason']?></td>
						<td data-label="When"><?php echo  date('F-d-Y ', strtotime($row['date']))?></td>
						<td data-label="When"><?php echo  date('h:i A', strtotime($row['time_start'])). date(' h:i A', strtotime($row['time_end'])) ?></td>
						<td data-label="Reason"><?php echo $row['affected_area']?></td>
						<td>
						<div class="image">
						    <img class="pic"  src="<?php echo (!empty($row['advisory_photo']))? '../advisory_images/'.$row['advisory_photo']:'../advisory_images/images.jpg'; ?>"
						 width='10%' height='10%' style='border: solid blue 1px' >
						  </div>
						</td>
	
							

						
						</tr>
							<?php
					$c++;
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
                if ($($(this)).html() == "When") {
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
