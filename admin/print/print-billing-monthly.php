<?php include 'session.php';?>
<body onload="window.print()">
<div class="print-are">
			<table width='100%' border='2' style="border-collapse:collapse;text-align:center;">
			  <tr>
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()">URBIZTONDO WATER SERVICES
				<br><span style="text-align:center;padding:10px;font-weight:bold;color:black;font-family:arial black">Monthly Statement of Accounts</span></td>
			  </tr>
			  <tr>
              <th>Meter No.</th>
				<th>Client Name</th>
				<th style="display:none;">Address</th>
				<th>Date Billed</th>
                <th>From</th>
                <th>To</th>
				<th>Cubic Meter Consumed</th>
				<th>Amount</th>
			  </tr>
					<?php
                    $today = date('Y-m');

                    $client = "SELECT *, billing.billing_ID AS bid FROM billing 
                        LEFT JOIN tblclients ON tblclients.client_ID =  billing.client_ID
                        LEFT JOIN tbladdress ON tbladdress.address_ID = tblclients.address_ID
                        WHERE DATE_FORMAT(billing.due_date, '%Y-%m') LIKE '$today%'
                        ORDER BY billing.invoice_due_date DESC";
                    
				$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
				while($row=mysqli_fetch_assoc($res))
				{
					
			?>
				<tr>
							<td data-label="#"><?php echo $row['meter_no']?></td>
								<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
								<td style="display:none;" data-label="Location"><?php echo $row['House_No'].'. '. $row['Barangay'].' '.$row['Municipality'].' '. $row['Province']?></td>
							<td data-label="Plumber Name"><?php echo date('F-d-y', strtotime( $row['due_date']));?></td>
							<td data-label="Date"><?php echo date('F-d-y', strtotime( $row['invoice_date']));?></td>
							<td data-label="Complaint"><?php echo date('F-d-y', strtotime( $row['invoice_due_date']));?></td>
							<td data-label="Complaint"><?php echo $row['cubic_meter']?> Cubic Meters</td>
							<td data-label="Complaint"><?php echo $row['total']?> Pesos</td>
							
						</tr>
						
			<?php
				}
			?>
		</table>
</div>
</body>