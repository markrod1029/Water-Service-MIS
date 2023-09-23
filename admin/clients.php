<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "client"; include 'includes/leftbar.php' ?>



<?php

	@$diwow=$_GET['ctid'];
	@$printnow=$_GET['YesToPrint'];
	if($printnow==1)
	{
		echo
		"
			<script>
			 window.onload = function(){
				window.open('print.php', '_blank','pagename','resizable,height=500,width=1000');
			}		
				
			</script>
		";
		
		
	}
	if($diwow==TRUE)
	{
		$clientf="SELECT * FROM tblclients WHERE client_ID='$diwow' ";
		$res=mysqli_query($connect, $clientf)or die(mysqli_error($connect));
		while($rw=mysqli_fetch_assoc($res))
		{
			
			$cidt=$rw["meter_no"];
			$name=$rw["client_fname"].' '.$rw["client_mname"].' '.$rw["client_lname"];
			$address=$rw["address_ID"];
			$houseno=$rw["House_No"];
			$email=$rw["ClientEmail"];
			$contact=$rw["Contact"];
			$regdate=$rw["RegDate"];
			$status="Status: Active";
			$zip=2421;
			
			$add2="SELECT * FROM tbladdress WHERE address_ID='$address'";
			$resadd2=mysqli_query($connect,$add2)or die(mysqli_error($connect));
			$rww2=mysqli_fetch_assoc($resadd2);
			$b2=$rww2['Barangay'];
			$m2=$rww2['Municipality'];
			$p2=$rww2['Province'];
			$all=$b2." ".$m2." ".$p2;
			
			$font=realpath('font/calibri.ttf');
			$image=imagecreatefromjpeg("img/application-form.jpg");
			$color=imagecolorallocate($image,19,21,22);

				
				imagettftext($image,30,0,1100,620,$color,$font,$cidt);
				imagettftext($image,30,0,300,730,$color,$font,$name);
				imagettftext($image,30,0,200,850,$color,$font,$houseno);
				imagettftext($image,30,0,290,850,$color,$font,$all);
				imagettftext($image,30,0,250,950,$color,$font,$email);
				imagettftext($image,30,0,1100,840,$color,$font,$contact);
				imagettftext($image,30,0,300,620,$color,$font,$regdate);
				imagettftext($image,30,0,1300,540,$color,$font,$status);
				imagettftext($image,30,0,1100,950,$color,$font,$zip);
	
              
                
						
						
			imagejpeg($image,"img/".$cidt.".jpg");
			imagedestroy($image);
			
			$up="UPDATE tblclients SET Viewed='1' WHERE client_ID='$diwow'";
			$resup=mysqli_query($connect,$up)or die(mysqli_error($connect));
			
			$admin = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 
			$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$admin', 'Admin',   NOW(),  ' View $name Information')";
				$query = mysqli_query($connect,$insert);
				
			echo
			"
			<script>
					window.location='print.php?view=$cidt';
				</script>
			";
		}
	}
	?>


<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>Clients</li>
      <li style='color:black'>Clients List</li>
    </ul>
	<div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h2 class="title">
    </h2>
	

    <a href = "add-clients.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add CLient</a>
  </div>
  </div>

  
  </section>

  <section class="section main-section">

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

	
	</div>
	<div id='em' >
    <div class="  bg-gray-50" >
<div class="container mt-4">
<a href = "print/print-client.php"class="button blue px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Print</a>

        <select id="customFilter" class=" custom-cls" aria-controls="userTable">
		<option value="">Select Client Address</option>
						<?php
							$add="SELECT * FROM tbladdress";
							$resadd=mysqli_query($connect,$add)or die(mysqli_error($connect));
							while($rww=mysqli_fetch_assoc($resadd))
							{
								$ai=$rww['Barangay'].' '.$rww['Municipality'].' '.$rww['Province'];
								$b=$rww['Barangay'];
								$m=$rww['Municipality'];
								$p=$rww['Province'];

								
						?>
								<option value="<?php echo $ai;?>"><?php echo $ai." ".$b." ".$m." ".$p?></option>
						<?php
							}
						?>

          
        </select>


	<table id="userTable"  class="cell-border" >
	<!-- <button class='button small green' style="font-size:15px;  " onclick=window.location.href="clients.php"   type='button' name="print" > Add Client<button> -->
            
	<thead style='color:blueT; '>
			  <tr>
				<th>Picture</th>
				<th>Meter No.</th>
                <th>Client Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact No.</th>
                <th>Classification</th>
                <th>Control</th>
			  </tr>
			  </thead>
			  <tbody>
					<?php

						$qry="SELECT *,tblclients.client_ID AS cid FROM tblclients
						LEFT JOIN tbladdress ON tbladdress.address_ID = tblclients.address_ID WHERE  tblclients.Status = 1";
						$query = $connect->query($qry) ;
						$num=mysqli_num_rows($query);
					

						while($row = $query->fetch_assoc()){

							if($row['Status']==1)
								{
									$status = "Active";
								}else
								{
									$status =  "Pending...";
								}

							?>
	
					
						<tr>

						<td class="image-cell">
						  <div class="image">
						    <img class="pic"  src="<?php echo (!empty($row['picture']))? '../upload/ClientPicture/'.$row['picture']:'../upload/ClientPicture/images.jpg'; ?>"
						 width='50%' height='50%' style='border: solid blue 1px' class="rounded-full">
						  </div>
						</td>
						<td data-label="Contact No."><?php echo $row['meter_no']?></td>

						<td data-label="Client Name"><?php echo $row['client_fname'].' '.$row['client_mname'].' '. $row['client_lname'] ?></td>
						
						<td data-label="Location"><?php echo $row['House_No'].'. '. $row['Barangay'].' '.$row['Municipality'].' '. $row['Province']?></td>
						<td data-label="Contact No."><?php echo $row['ClientEmail']?></td>
						
						<td data-label="Contact No."><?php echo $row['Contact']?></td>
						<td data-label="Status"> <?php echo $row['classification']?></td>
						<center>
						<td class="actions-cell">
						
						<button class='button small blue' onclick=window.location.href="clients.php?ctid=<?php echo $row['cid'];?>"   type='button' name="print" >
								  <span class='icon'><i class='mdi mdi-eye'></i></span>
								</button>
							<a type='button' href="edit-client.php?id=<?php echo $row['cid'];?>" class='button small green --jb-modal'  data-target='sample-modal-3' type='button'>
							  <span class='icon'><i class='fa fa-edit'></i></span>
							</a>
				
							

							<a type='button' onclick="return confirm('Are you sure you want to Delete this User?')" href="CRUD/delete-client.php?id=<?php echo $row['cid'];?>" class='button small red --jb-modal' data-target='sample-modal' type='button'>
							  <span class='icon'><i class='mdi mdi-trash-can'></i></span>
							</a>
						</td></center>
						</tr>
						
									
						<?php }
				
					?>
						
					
								
			  </tbody>
                        </table>
	</div>
	</div>


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


<?php include 'includes/footer.php' ?>





<script>
        $("document").ready(function () {

            $("#userTable").dataTable({
                "searching": true,
				"lengthChange": false
            });

            var table = $('#userTable').DataTable();

            $("#userTable_filter.dataTables_filter").append($("#customFilter"));

            var index = 0;
            $("#userTable th").each(function (i) {
                if ($($(this)).html() == "Address") {
                    index = i;
                    return false;
                }
            });

            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var selectedItem = $('#customFilter').val()
                    var gender = data[index];
                    if (selectedItem === "" || gender.includes(selectedItem)) {
                        return true;
                    }
                    return false;
                }
            );

         
            $("#customFilter").change(function (e) {
                table.draw();
            });

            table.draw();
        });
    </script>