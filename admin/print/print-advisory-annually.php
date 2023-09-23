<?php include 'session.php';?>
<body onload="window.print()">
<div class="print-are">
			<table width='100%' border='2' style="border-collapse:collapse;text-align:center;">
			  <tr>
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()">URBIZTONDO WATER SERVICES	<br><span style="text-align:center;padding:10px;font-weight:bold;color:black;font-family:arial black">(Annually Advisory)</span></td>
			  </tr>
			  <tr>
              <th>What</th>
                <th>Reason</th>
                <th>When</th>
                <th>time</th>
				<th>Affected Area/s</th>
			  </tr>
					<?php
                    $today = date('Y');
                    $client = "SELECT *,tbladvisory.advisory_ID AS aid FROM tbladvisory  
                        WHERE DATE_FORMAT(date, '%Y') LIKE '$today%' AND
                        Status!='0' ORDER BY date DESC";
                    
				$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
				while($row=mysqli_fetch_assoc($res))
				{
					
			?>
				<tr>   <td data-label="What"><?php echo $row['Wht']?></td>
						<td data-label="Reason"><?php echo $row['Reason']?></td>
						<td data-label="When"><?php echo  date('F-d-Y ', strtotime($row['date']))?></td>
						<td data-label="When"><?php echo  date('H:i A', strtotime($row['time_start'])). date(' H:i A', strtotime($row['time_end'])) ?></td>
						<td data-label="Reason"><?php echo $row['affected_area']?></td>
							
						</tr>
						
			<?php
				}
			?>
		</table>
</div>
</body>