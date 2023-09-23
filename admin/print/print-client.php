<?php include 'session.php';?>

<body onload="window.print()">
<div class="print-are">
			<table width='100%' border='2' style="border-collapse:collapse;text-align:center;">
			  <tr>
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()">URBIZTONDO WATER SERVICES
				<br><span style="text-align:center;padding:10px;font-weight:bold;color:black;font-family:arial black">Active Client List</span></td>
			  </tr>
			  <tr>
			  <th>Meter No.</th>
                <th>Client Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact No.</th>
                <th>Classification</th>
                <th>Date Register</th>
			  </tr>
					<?php
				$client="SELECT *,tblclients.client_ID AS cid FROM tblclients
				LEFT JOIN tbladdress ON tbladdress.address_ID = tblclients.address_ID WHERE  tblclients.Status = 1";
				$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
				while($row=mysqli_fetch_assoc($res))
				{
					
			?>
					<tr>
					<td data-label="Contact No."><?php echo $row['meter_no']?></td>

						<td data-label="Client Name"><?php echo $row['client_fname'].' '.$row['client_mname'].' '. $row['client_lname'] ?></td>
						
						<td data-label="Location"><?php echo $row['House_No'].'. '. $row['Barangay'].' '.$row['Municipality'].' '. $row['Province']?></td>
						<td data-label="Contact No."><?php echo $row['ClientEmail']?></td>
						
						<td data-label="Contact No."><?php echo $row['Contact']?></td>
						<td data-label="Contact No."><?php echo $row['classification']?></td>
						<td data-label="Contact No."><?php echo $row['RegDate']?></td>

			<?php
				}
			?>
		</table>
</div>
</body>