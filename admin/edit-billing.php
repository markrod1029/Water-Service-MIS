<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "billing"; include 'includes/leftbar.php' ?>

<section class="is-title-bar">
 
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
	  
	  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>SOA</li>
      <li style='color:black'> Update Customer SOA</li>
    </ul>

  </div>
  </section>

  <section class="section main-section">
    <div class="card has-table" >

    <form method="POST" enctype='multipart/form-data'>

    <?php

            $id = $_GET['id'];
            $qry="SELECT *, billing.billing_ID AS bid FROM billing 
            LEFT JOIN tblclients ON tblclients.client_ID =  billing.client_ID
            LEFT JOIN date_billed ON date_billed.billed_ID =  billing.billed_ID	
			 WHERE billing.billing_ID = '$id'  ";
            $res=mysqli_query($connect, $qry)or die(mysqli_error($connect));
            while($rw=mysqli_fetch_assoc($res))
            {

				$due_date = $rw['due_date'];
				$date_now = date("Y-m-d");
				
							if ($date_now > $due_date && $status == 'Unpaid' ) {

									   $penalties = 10;

									   $add="UPDATE billing SET penalties = '$penalties'  WHERE billing_ID ='$id' ";
									   $query = mysqli_query($connect,$add);
								   
						   }
   
						   else{
						   	$penalties = 0;
						   	$all = '';
   
						   }

						   $penal = $rw['penalties'] / 100 * $rw['total'] ;
						   $all = $penal + $rw['total'] ;


?>

	<table>
	<tr>
			<th>Bill Number</th>
			<td style='background:white'>
			<input type="number"id="price" name="meter"  value ="<?php echo $rw['bill_num']?>"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled>
			<input type="hidden"id="price" name="billing_ID"  value ="<?php echo $rw['billing_ID']?>"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled>
		</td>
		</tr>

<tr>
			<th>Client Name</th>
			<td style='background:white'>
				<select name="client" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" >
					
							<option value="<?php echo $rw['client_ID'];?>"  > <?php echo $rw['client_fname']." ".$rw['client_mname']." ".$rw['client_lname']?></option>
                
					
				</select>
			</td>
		</tr>



		<!-- <tr>
			<th>Consumption Month</th>
			<td style='background:white'>
			<select name="date_billed" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px">
					<?php
					// $billed = $rw['billed_ID'];
					// 	$add="SELECT * FROM date_billed WHERE billed_ID = '$billed'";
					// 	$resadd=mysqli_query($connect,$add)or die(mysqli_error($connect));
					// 	while($rww=mysqli_fetch_assoc($resadd))
					// 	{

							
					// 		$ai=$rww['date_billled'];
					// 		$id=$rww['billed_ID'];
					?>
							<option value="<?php echo $id;?>"> <?php echo $ai?></option>

					<?php
						// }
					?>
				</select>	
		</td>
		</tr> -->
		<!-- <tr>
			<th>Classification</th>
			<td style='background:white'><input type="number"id="price" name="meter"  value ="<?php //echo $rw['cubic_meter']?>"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
		</tr> -->
		<tr>
			<th>Size</th>
			<td style='background:white'><input type="text"id="price" name="meter"  value ="&#189;"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
		</tr>
		<tr>
			<th>Date Billed</th>
			<td style='background:white'>
			<input type='text' name="duedate"  value ="<?php echo $rw['date_billled']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" disabled>
			</td>
		</tr> 
	
		<tr>
			<th>Consumption Month</th>
			<td style='background:white'><input type="text"   value ="<?php echo $rw['from_date'].' -'.$rw['to_date']?>"   id="present" name="present"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
		</tr>



		<tr>
			<th>Due Date </th>
			<td style='background:white'><input type="date" id="previous" name="previous"     value ="<?php echo $rw['due_date']?>"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
		</tr>

		<tr>
			<th>Meter Reading Previous</th>
			<td style='background:white'><input type="number"id="price" name="previous"  value ="<?php echo $rw['previous']?>"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
		</tr>
		<tr>
			<th>Meter Reading Present</th>
			<td style='background:white'><input type="number"id="price" name="present"  value ="<?php echo $rw['present']?>"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
		</tr>
		<tr>
			<th>Cubic Meter Consumed</th>
			<td style='background:white'><input type="text" id="price" name="meter"  value ="<?php echo$rw['cubic_meter']?> Cubic Meters"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
		</tr>
		<tr>
			<th>Amount</th>
			<td style='background:white'><input type="text"id="price" name="meter"  value ="<?php echo $rw['total']?> Pesos"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
		</tr>
		<tr>
			<th>Penalty after due date</th>
			<td style='background:white'><input type="text"id="price" name="meter"  value ="<?php echo  $rw['penalties']?>%"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
		</tr>
		<tr>
		<th>Amount due after due date</th>
			<td style='background:white'><input type="number"id="price" name="meter"  value ="<?php echo $all?>"  placeholder="Total Cubic Meter" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"disabled></td>
		</tr>
	
	
		<tr>
			<th>Status </th>
			<td style='background:white'>
				<select name="status" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
					
							<option value="Paid">Paid </option>
							<option value="Unpaid">Unpaid</option>

				</select>
			</td>
		</tr>

		<tr>
			<td style='background:white' colspan="2">
			<center>
			<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
			<a type="button" href="billing.php" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="window.location.href='dashboard.php'">Cancel</a>
			</center>
			</td>
		</tr>
	</table>
    <?php
				}
			?>
    </form>

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


<!-- JavaScript to calculate and display the billing -->
<script>
  // Get the input elements
  var quantityInput = document.getElementById('previous');
  var priceInput = document.getElementById('present');

  // Add an input event listener to the input elements
  quantityInput.addEventListener('input', calculateBilling);

  function calculateBilling() {
    // Get the values from the input elements
    var previous = quantityInput.value;

    var present = priceInput.value;

    // Calculate the billing
    var billing = previous -  present;

    // Display the result
    document.getElementById('price').value =  billing;
  }




</script>




<?php include 'includes/footer.php' ?>
<?php
		if(isset($_POST['submit']))
		{
			
			$status=$_POST['status'];
	

			$add="UPDATE billing SET  status = '$status' WHERE billing_ID ='$id' ";
			if($connect->query($add)){
				$_SESSION['success'] = 'Update SOA Successfully';
				echo $name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Updated as a SOA')";
					$query = mysqli_query($connect,$insert);

				echo
				"
					<script>
						window.location='billing.php';
					</script>
				";
			}

			else{
				$_SESSION['error'] = $connect->error;
			}

				
		}
		?>