<?php
include('includes/session.php');
?>
    <style>

.design{
	font-weight: bold;
	font-style: italic;
	text-align:center;
	font-size:16px;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 2px;
}

table{

	border-collapse:collapse;
	text-align:center;
	font-size:15px;
	font-family:Helvetica;
}

</style>
<body onload="
// window.print()
">
<?php

						$id = $_GET['id'];
						$qry="SELECT *, billing.billing_ID AS bid FROM billing 
                        LEFT JOIN tblclients ON tblclients.client_ID =  billing.client_ID
						LEFT JOIN tbladdress ON tbladdress.address_ID =  tblclients.address_ID	
						 WHERE billing.billing_ID  = '$id'	 ";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);


					
						while($row = $query->fetch_assoc()){
							
						$date_now = date("Y-m-d");	
						$due_date=  $row['invoice_due_date'];
						$status=  $row['status'];

							if ($date_now >=  $due_date && $status == 'Unpaid' ) {
 
								$penalties = 10;

								$add="UPDATE billing SET penalties = '$penalties'  WHERE billing_ID ='$id' ";
								$query = mysqli_query($connect,$add);

								// $penal = $penalties / 100 * $row['total'] ;
								// $all = $penal + $row['total'] ;
							}
	
							else{
								$penalties = 0;
								$all = '';
	
							}
   
?>
<center>
<table width="700" style="height:100px; margin-top:50px;">
	<tbody>
		<tr>
			<td colspan="6" rowspan="3" width="388" style="border-bottom: none;  ">

			<div style="height:500xpx;">
					<img src="../images/logo.png" width="50px" height="50px" style="float:left" onclick="window.close()">
				</div>
				
					<img src="../images/seal-logo.jpg"  width="50px" height="50px" style="float:right" onclick="window.close()">

					
					<p style="text-left;"><strong style="color:blue;">URBIZTONDO WATER SERVICES</strong><br>
					<strong>Urbiztondo, Pangasinan</strong><br>
					Contact No. :09454064800/09295097707<br>
					Email Address: <a href="http://www.urbiztondopang.gov.ph" style="text-decoration:none;">www.urbiztondopang.gov.ph</a></p>

	
					
						</div>	
			

			</td>


			<td width="175">
				<h4 style="color:red;"> <br>STATEMENT OF ACCOUNT</h4>
			</td>
		</tr>
			
		<tr>
			<td width="175">
			<p style='text-align:left;'>Due Date:<br>  </p>
			<span class="design"> <?php echo $row['invoice_due_date']?> <span>

		<tr>

			<td width="175">
			<p  style='text-align:left;'>Date Billed:</p>
			<span class="design"> <?php echo $row['invoice_date']?> <span>
			</td>
		</tr>

		<tr>
			<td   colspan="6"  width="175"  style=" text-align:left; border-top:none;   
 ">
				<div style="margin-left:90px;">


			<span>Name:<strong><?php echo $row['client_fname']. ' '.$row['client_mname']. ' '.$row['client_lname']  ?> </span> </strong><br> 
						<span  >House No:<strong><?php echo $row['House_No'] ?> </span> </strong><br> 

						<span  >Address:<strong><?php echo $row['Barangay']. ' '.$row['Municipality']. ' '.$row['Province']  ?> </span> </stromg><br>
			</td>

			<td   colspan="6" width="175">
				<p tyle='text-align:left;'> Consumption Month:</p>
			<span class="design"> <?php echo $row['invoice_date']. ' To '.$row['invoice_due_date'] ?> <span>
			</div>
			</td>
		</tr>

		<tr>
			<td colspan="2" width="113">
				<p>PERIOD COVERED</p>
			</td>

			<td colspan="2" width="148">
				<p>METER READING</p>
			</td>

			<td colspan="2" rowspan="2" width="127">
				<p>CUBIC METER CONSUMED</p>
			</td>

			<td rowspan="2" width="175">
				<p>AMOUNT</p>

			</td>
		</tr>

		<tr>
			<td width="57">
			<p>FROM</p>
			</td>

			<td width="56">
			<p>TO</p>
			</td>

			<td width="79">
				<p>PRESENT</p>
			</td>

			<td width="69">
				<p>PREVIOUS</p>
			</td>
		</tr>

		<tr>
			<td width="57">
			<span class="design" style="  font-weight:normal; ">  <?php echo $row['invoice_date']?> <span>

			</td>
			<td width="56">
			<span class="design" style="  font-weight:normal; ">  <?php echo $row['invoice_due_date']?> <span>

			</td>
			<td width="79">
			<span class="design" style="  font-weight:normal; ">  <?php echo $row['present']?> <span>

			</td>
			<td width="69">
			<span class="design" style=" font-weight:normal;    ">  <?php echo $row['previous']?> <span>

			</td>
			<td colspan="2" width="127">
			<span class="design" style="font-size:19px;   ">  <?php echo $row['cubic_meter']?> <span>

			</td>
			
			<!-- Amount -->
			<td width="175" style="padding: 24px;">	
				<span class="design" style="font-size:19px;   "> ₱ <?php echo $row['total']?> <span>	
			</td>
		</tr>

		<tr>
			<td colspan="2" width="113">
				<p>Consumption Month</p>
			</td>
			
			<td width="79">
				<p>Amount</p>
			</td>

			<td width="69">
				<p>Penalty</p>
			</td>

			<td width="49">
				<p>Total</p>
			</td>

			<td width="78">
				<p>ARREARS</p>
			</td>

			<td rowspan="2" width="175">


			</td>
		</tr>

		<tr>
			<td colspan="2" width="113">&nbsp;</td>
			<td width="79">&nbsp;</td>
			<td width="69">&nbsp;</td>
			<td width="49">&nbsp;</td>
			<td width="78">
			<p>Previous Year</p>
			</td>
		</tr>
		
		<tr>
			<td colspan="2" width="113">&nbsp;</td>
			<td width="79">&nbsp;</td>
			<td width="69">&nbsp;</td>
			<td width="49">
		
		</td>
		
			<td width="78">
				<p>Current Year</p>
			</td>
			
			<td width="175">&nbsp;</td>
		</tr>

		<tr>
			<td colspan="2" width="113">&nbsp;</td>
			<td width="79">&nbsp;</td>
			<td width="69">&nbsp;</td>
			<td width="49">&nbsp;</td>
		
			<td width="78">
				<p>AMOUNT DUE</p>
			</td>
			
			<td width="175">
				<span class="design" style="font-size:19px;   "> ₱ <?php echo $row['total']?> <span>
			</td>
		</tr>

		<tr>
			
			<td colspan="2" width="113">
				<p>Classification:</p>
			</td>

			<td colspan="3" width="197">
				<p style='text-align:left;'> Size:
				 
				</p>
				<span class="design" style="   ">&#189; <span>

			</td>

			<td width="78">
				<p>10% Penalty after due date</p>
			</td>

			<td width="175">
			<span class="design" style="font-size:19px;   "> <?php
			if($row['penalties'] == 0){
				echo '';

			}

			else{
				echo $row['penalties']. '%';
				
			}
			?> <span>

			</td>
			
		</tr>
		
		<tr>
			<td colspan="5" width="310">
				<p style='text-align:left;'>Bill Number:</p>

				<span class="design" style="font-size:19px;   "> <?php echo $row['meter_no']?> <span>

			</td>
			
			<td width="78">
				<p>Amount due after</p>
								
			</td>
		
			<td width="175">
			<span class="design" style="font-size:19px;   "> <?php 
			
			if($row['penalties'] == 0){
				echo '';
			}

			else{
				$penal = $row['penalties'] / 100 * $row['total'] ;
				$all = $penal + $row['total'] ;
				echo $all;
				
			}?> <span>



			</td></td>
		
		</tr>
		</tbody>
		</table>
<!-- 
<div style="float:left; position:absolute; left:330px;">
		<p style="color:red; margin-right:610px; font-size:15px;"><em>FILE COPY</em></p>
<p style=" margin-right:610px; font-size:13px;">Prepared by:</p>
<p style=" margin-right:310px; font-size:15px;"><strong>SHAIRA MAE L. BALOCATING </strong> <br>Administrative Aide1 <br> Office Clerk  </p>


<div>


<div style="float:right; position:absolute; top:30px; left:360px;">
<p style=" font-size:13px;"> Delivered by:</p>
<p style=" margin-left:180px; font-size:15px;"><strong>JEFFREY RAMOS</strong> <br>Administrative Aide1 <br> Meter Reader </p>


<div> -->

</center>
<?php
				}
			?>