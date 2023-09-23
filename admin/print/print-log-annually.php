<?php include 'session.php';?>
<body onload="window.print()">
<div class="print-are">
			<table width='100%' border='2' style="border-collapse:collapse;text-align:center;">
			  <tr>
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()">URBIZTONDO WATER SERVICES	<br><span style="text-align:center;padding:10px;font-weight:bold;color:black;font-family:arial black">(Annualy Activity Log/s)</span></td>
			  </tr>
			  <tr>
              <th>Date</th>
				<th>Full Name</th>
                <th>Activities</th>
			  </tr>
					<?php
                    $today = date('Y');
                    $client = "SELECT * FROM activity  
                        WHERE DATE_FORMAT(time_loged, '%Y') LIKE '$today%' AND
                        Status!='0' ORDER BY time_loged DESC";
                    
				$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
				while($row=mysqli_fetch_assoc($res))
				{
					
			?>
				<tr>  
                    
							<td data-label="time_loged"><?php echo date('Y-m-d H:i A', strtotime($row['time_loged'])) ?></td>
							<td data-label=" Name"><?php echo $row['name']?></td>
							<td data-label="position"><?php echo $row['status']?></td>		
				</tr>
						
			<?php
				}
			?>
		</table>
</div>
</body>