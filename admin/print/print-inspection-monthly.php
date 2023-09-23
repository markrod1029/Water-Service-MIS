<?php include 'session.php';?>
<body onload="window.print()">
<div class="print-are">
			<table width='100%' border='2' style="border-collapse:collapse;text-align:center;">
			  <tr>
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()">URBIZTONDO WATER SERVICES	<br><span style="text-align:center;padding:10px;font-weight:bold;color:black;font-family:arial black">(Inspections and Installations Monthly)</span></td>
			  </tr>
			  <tr>
              <th>Meter No.</th>
			<th>Client Name</th>
			<th>Address</th>
			<th>Date Inspected</th>
			<th>Date Installated</th>
			  </tr>
					<?php
                    $today = date('Y-m');
                    $client = "SELECT *,inspection_schedule_for_registration_approval.schedule_ID  AS sid FROM inspection_schedule_for_registration_approval
					LEFT JOIN tblclients ON tblclients.client_ID = inspection_schedule_for_registration_approval.client_ID 
					LEFT JOIN tbladdress ON tbladdress.address_ID = tblclients.address_ID
					LEFT JOIN tblplumber ON tblplumber.plumber_ID = inspection_schedule_for_registration_approval.plumber_ID  
                        WHERE DATE_FORMAT(inspection_schedule_for_registration_approval.date_install, '%Y-%m') LIKE '$today%' AND
                        inspection_schedule_for_registration_approval.inspected =1 AND  inspection_schedule_for_registration_approval.inspection_installation =1 ORDER BY inspection_schedule_for_registration_approval.date_install DESC";
                    
				$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
				while($row=mysqli_fetch_assoc($res))
				{
					
			?>
				<tr>  
				<td data-label="#"><?php echo $row['meter_no']?></td>
							<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
						<td data-label="Location"><?php echo $row['House_No'].'. '. $row['Barangay'].' '.$row['Municipality'].' '. $row['Province']?></td>
							<td data-label="Date"><?php echo $row['sched_visited']?></td>
							<td data-label="time_loged"><?php echo date('Y-m-d H:i A', strtotime($row['date_install'])) ?></td>		
				</tr>
						
			<?php
				}
			?>
		</table>
</div>
</body>