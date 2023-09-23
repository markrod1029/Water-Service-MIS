<?php include 'session.php';?>
<body onload="window.print()">
<div class="print-are">
			<table width='100%' border='2' style="border-collapse:collapse;text-align:center;">
			  <tr>
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()">URBIZTONDO WATER SERVICES	<br><span style="text-align:center;padding:10px;font-weight:bold;color:black;font-family:arial black">(Monthly Complaint )</span></td>
			  </tr>
			  <tr>
              <th>Meter No.</th>
				<th>Client Name</th>
				<th>Complaint Date</th>
                <th>Complaint/Concern</th>
			  </tr>
					<?php
                    $today = date('Y-m');
                    $client = "SELECT *,inspection_schedule_for_complaints.isc_ID AS cid, inspection_schedule_for_complaints.date AS complaint_date FROM inspection_schedule_for_complaints
                    LEFT JOIN tblcomplaints ON inspection_schedule_for_complaints.complaint_ID = tblcomplaints.complaint_ID
                    LEFT JOIN tblclients ON tblclients.client_ID = tblcomplaints.client_ID
                        WHERE DATE_FORMAT(inspection_schedule_for_complaints.date, '%Y-%m') LIKE '$today%' AND
                        inspection_schedule_for_complaints.visited='1' ORDER BY inspection_schedule_for_complaints.date DESC";
                    
				$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
				while($row=mysqli_fetch_assoc($res))
				{
					
			?>
				<tr> 
                <td data-label="#"><?php echo $row['meter_no']?></td>
				<td data-label="Client Name"><?php echo $row['client_fname'].' '. $row['client_mname'].' '.$row['client_lname']?></td>
				<td data-label="Complaint"><?php echo $row['complaint_date']?></td>
				<td data-label="Complaint"><?php echo $row['complaint']?></td>
		
						</tr>
						
			<?php
				}
			?>
		</table>
</div>
</body>