<?php include 'session.php';?>
<style>
@media print
				{
					@page {size: landscape}
					
					.print-area, .print-area *
					{
						visibility:visible;
					}
					.print-area
					{
						position:absolute;
						top:0% !important;
						left:0% !important;
						right:0% !important;
						bottom:0% !important;
						
						
						width:100%;
						height:100%;display: block;
					    margin-left: auto;
					    margin-right: auto;
						
					}
					.img1
					{
						width:100%;
						height:100%;
						
					}
					.pic
					{
						width:100px;
						height:100px;
						overflow: hidden;
						
					}
					.cedula
					{
						width:70%;
						height:30%;
						margin-top:50px;
					}
					.clearance
					{
						clear:both;
						width: 90%;
						height:100%;
						bottom:0% !important;
						overflow: hidden;
					}
				}
</style>
<body onload="window.print()">
<div class="print-are">
			<table width='100%' border='2' style="border-collapse:collapse;text-align:center;">
			  <tr>
				<td colspan='4' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()">
				URBIZTONDO WATER SERVICES <br><span style="text-align:center;padding:10px;font-weight:bold;color:black;font-family:arial black">Registered Location/s</span></td>
			  </tr>
			  <tr>
				<th>Barangay</th>
                <th>Municipality</th>
                <th>Province</th>
			  </tr>
				<?php
				$client="SELECT * FROM tbladdress";
				$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
				while($rw=mysqli_fetch_assoc($res))
				{
				
					$cn=$rw["Barangay"];
					$cadd=$rw["Municipality"];
					$cem=$rw["Province"];
			?>
					<tr>
					
						<td data-label="Barangay"><?php echo $cn?></td>
						<td data-label="Municipality"><?php echo $cadd?></td>
						<td data-label="Province"><?php echo $cem?></td>
					</tr>
						<?php
				}
						?>
		</table>
</div>
</body>