<?php 
// error_reporting(0);
include 'includes/session.php';?>
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
      <li style='color:black'> Add Customer SOA</li>
    </ul>

  </div>
  </section>

  <section class="section main-section">
    <div class="card has-table" >

	<table>
    <form method="POST" enctype='multipart/form-data'>

		</form>

		<form method="POST" enctype='multipart/form-data'>

		<?php
$id = $_GET['client'];

$qry="SELECT * FROM tblclients WHERE meter_no = '$id' AND Status = 1";
$query = $connect->query($qry) ;
$num=mysqli_num_rows($query);
if($num>0)
{

            $qry="SELECT * FROM billing 
             LEFT JOIN date_billed ON billing.billed_ID =  date_billed.billed_ID
            LEFT JOIN tblclients ON billing.client_ID =  billing.client_ID
			 WHERE  tblclients.meter_no = '$id' ORDER BY date_billed.due_date DESC";
           $result = $connect->query($qry);
		   $rw = $result->fetch_assoc();
		   $num=mysqli_num_rows($result);
		  // billing_ID
		 
?>
<tr>
			<th>Meter No</th>
			<td style='background:white'><input type='text' name="billing" value="<?php echo $id?>"   style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"readonly></td>
		</tr> 
<tr>
			<th>Client Name</th>
			<td style='background:white'>
				<select name="client" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px">
					<?php
						$add="SELECT * FROM tblclients WHERE meter_no = '$id' 
						  AND Status = 1";
						$resadd=mysqli_query($connect,$add)or die(mysqli_error($connect));
						while($rww=mysqli_fetch_assoc($resadd))
						{

							
							$ai=$rww['client_ID'];
							$b=$rww['client_fname'];
							$m=$rww['client_mname'];
							$p=$rww['client_lname'];
					?>
							<option value="<?php echo $ai;?>"> <?php echo $b." ".$m." ".$p?></option>

					<?php
						}
					?>
				</select>
			</td>
		</tr>

 <tr>
  <th>Date Billed</th>
  <td style="background:white">
    <select name="date_billed" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px">
      <?php
      $currentMonth = date('m');
      $add = "SELECT * FROM date_billed WHERE DATE_FORMAT(to_date, '%m') LIKE '$currentMonth%'";
      $resadd = mysqli_query($connect, $add) or die(mysqli_error($connect));
      while ($rww = mysqli_fetch_assoc($resadd)) {
        $ai = $rww['date_billled'];
        $id = $rww['billed_ID'];
        ?>
        <option value="<?php echo $id; ?>"><?php echo $ai; ?></option>
    
    </select>
  </td>
</tr>


		<tr>
			<th>Consumption Month</th>
			<td style='background:white'><input type="text"   name="previous" value="<?php echo $rww['from_date'].' - '.$rww['to_date']?>"  style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>

		</tr>



	<tr>
			<th>Due Datw</th>
			<td style='background:white'><input type="text"  name="previous" value="<?php echo $rww['due_date']?>"  style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			<!-- value="<?php //echo $rw['invoice_date']?>"  -->
		</tr>


	
	  <?php
      }
      ?>	
		
		<tr>
			<th>Previous Meter Reading</th>
			<td style='background:white'><input type="number"  id="present" name="previous" value="<?php echo $rw['present']?>"  style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			<!-- value="<?php //echo $rw['invoice_date']?>"  -->
		</tr>


		<tr>
			<th>Present Meter Reading</th>
			<td style='background:white'><input type="number" id="previous" name="present"   style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
		</tr>

		<tr>
			<th>Cubic Meter Consumed</th>
			<td style='background:white'><input type="number"id="price" name="meter"  style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
		</tr>

		<tr>
			<th>Amount Due</th>
			<td style='background:white'><input type="text" id="total" name="total" placeholder="Total Bill" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			<input type="hidden" id="total" name="status" value="Unpaid" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px">
		</tr>

		

	
		
		

		
		<tr>
			<td style='background:white' colspan="2">
			<center>
			<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
			<a type="button" href="billing.php" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="window.location.href='dashboard.php'">Cancel</a>
			</center>
			</td>
		</tr>
		<?php 

					}
					else{
						?>

				<tr>
					<td colspan='2' style='text-align:center;font-weight:bold;background:#ADD8E6;'><br><br>--NO SOA --</td>
					</tr>
				
					<?php }
				
						?>
	</table>
	
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

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
	var consume = 25;

	if(billing<=10 && billing>=1){

		var total = 250;
	}

	else{

		var total = consume * billing;
	}


    document.getElementById('total').value =  total;

  }





// document.addEventListener("DOMContentLoaded", function() {
//   var today = document.getElementById("today").value;
//   var later = moment(today, "YYYY-MM-DD").add(30, "days").format("YYYY-MM-DD");
//   document.getElementById("later").value = later;
// });

// document.getElementById("today").addEventListener("input", function() {
//   var today = moment(this.value, "YYYY-MM-DD");
//   var later = today.add(30, "days").format("YYYY-MM-DD");
//   document.getElementById("later").value = later;
// });

</script>




<?php include 'includes/footer.php' ?>


<style>
		
		.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #ADD8E6;
  border-right: none;
  padding: 5px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00008B;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #ADD8E6;
  background: #ADD8E6;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/

			</style>

<?php
		if(isset($_POST['submit']))
		{
			$client = htmlspecialchars( $_POST['client'], ENT_QUOTES, 'UTF-8');
			$billed_ID = htmlspecialchars( $_POST['date_billed'], ENT_QUOTES, 'UTF-8');
			$meter = htmlspecialchars( $_POST['meter'], ENT_QUOTES, 'UTF-8');
			$present = htmlspecialchars( $_POST['present'], ENT_QUOTES, 'UTF-8');
			$previous = htmlspecialchars( $_POST['previous'], ENT_QUOTES, 'UTF-8');
			$total = htmlspecialchars( $_POST['total'], ENT_QUOTES, 'UTF-8');
			$status= 'Unpaid';
			$bill_num=$_POST['billing'];
			

			// $billdate = date('Y-m-15', strtotime($duedate));

			$vld=mysqli_query($connect,"SELECT * FROM billing WHERE client_ID='$client'  AND status='Unpaid'")or die(mysqli_error($connect));
			$v=mysqli_num_rows($vld);
			if($v>0){

				$_SESSION['error'] = 'Already Create billing in this Client';
				echo
					"
						<script>
							window.location='billing.php';
						</script>
					";

			}

			else{

				$add="INSERT INTO billing( client_ID, billed_ID, present, previous, cubic_meter, total,  status)
				VALUES(  '$client', '$billed_ID', '$present', '$previous', '$meter', '$total', '$status')";
				if($connect->query($add)){
					$_SESSION['success'] = 'Create SOA Successfully';
					echo $name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 
	
					$insert = "INSERT INTO activity( name, position,  time_loged, status)
						VALUES( '$name', 'Admin',   NOW(),  'Added as a new SOA')";
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
		
				

			

				
		}
		?>
