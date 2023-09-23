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
				<td colspan='9' style="text-align:center;padding:10px;font-weight:bold;color:blue;font-family:arial black"><img src="../../images/logo.png" width="60px" height="60px" style="float:left" onclick="window.close()">URBIZTONDO WATER SERVICES <br><span style="text-align:center;padding:10px;font-weight:bold;color:black;font-family:arial black">Plumber List</span></td>
				
			  </tr>
			  <tr>
				<th>#</th>
				<th>Fullname</th>
                <th>House_No</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact_No</th>
                <th>Username</th>
                <th>Password</th>
                <th>RegDate</th>
			  </tr>
					<?php
				$client="SELECT * FROM tblplumber";
				$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
				while($rw=mysqli_fetch_assoc($res))
				{
					$pid=$rw["plumber_ID"];
					$fn=$rw["Fname"];
					$mn=$rw["Mname"];
					$ln=$rw["Lname"];
					$hn=$rw["house_no"];
					$address=$rw["address_ID"];
					$email=$rw["Email"];
					$cn=$rw["ContactNo"];
					$us=$rw["Username"];
					$ps=$rw["Password"];
					$rd=$rw["RegDate"];
			?>
					<tr>
						<td data-label="#"><?php echo $pid?></td>
						<td data-label="Fullname"><?php echo $fn." ".$mn." ".$ln;?></td>
						<td data-label="House_No"><?php echo $hn?></td>
						<td data-label="Address">
							<?php 
								$adr=mysqli_query($connect,"SELECT * FROM tbladdress WHERE address_ID='$address'")or die(mysqli_error($connect));
								$rowww=mysqli_fetch_assoc($adr);
								$brgy=$rowww['Barangay'];
								$mun=$rowww['Municipality'];
								$pro=$rowww['Province'];
								echo $brgy." ".$mun." ".$pro;
							?>
						</td>
						<td data-label="Email"><?php echo $email?></td>
						<td data-label="Contact_No"><?php echo $cn?></td>
						<td data-label="Username"><?php echo $us?></td>
						<td data-label="Password"><?php echo "******";?></td>
						<td data-label="RegDate"><?php echo $rd?></td>
			<?php
				}
			?>
		</table>
</div>
</body>