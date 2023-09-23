<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "advisory"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
    <li style='color:black'>Admin</li>
      <li style='color:black'>Advisory</li>
      <li style='color:black'>Add Advisory</li>
    </ul>

  </div>
  </section>

  <section class="section main-section">
  
    <div class="card has-table">

   
		<form method="POST"  enctype='multipart/form-data'>
		<table>
			<tr>
				<th>What</th>
				<td style='background:white'><input type='text' name="what" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			<tr>
				<th>When Date</th>
				<td style='background:white'>
				<input type='date' name="date" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>

			<tr>
				<th>When Time Start</th>
				<td style='background:white'>
				<input type='time' name="start" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>

			<tr>
				<th>When Time End</th>
				<td style='background:white'>
				<input type='time' name="end" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>


			<tr>
				<th>Affected Areas</th>
				<td style='background:white'>
				<div class="custom-select">
  <span class="select-text" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px">Select locations</span>
  <ul class="options">
    <?php
      $add="SELECT * FROM tbladdress";
      $resadd=mysqli_query($connect,$add)or die(mysqli_error($connect));
      while($rww=mysqli_fetch_assoc($resadd))
      {
        $ai=$rww['address_ID'];
        $b=$rww['Barangay'];
        $m=$rww['Municipality'];
        $p=$rww['Province'];
    ?>
        <li>
          <label>
            <input type="checkbox" name="location[]" value="<?php echo $b." ".$m." ".$p; ?>">
            <?php echo $b." ".$m." ".$p; ?>
          </label>
        </li>
    <?php
      }
    ?>
  </ul>
</div>

				</td>
			</tr>
			<tr>
				<th>Reason</th>
				<td style='background:white'>
				<input type='text' name="reason" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" required>
				</td>
			</tr>
			<tr>
				<th>Upload Picture</th>
				<td style='background:white'><input type='file' name="image3[]" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px" ></td>
			</tr>
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
				<button type="button" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="window.location.href='public-advisory.php'">Cancel</button>
				</center>
				</td>
			</tr>
		</table>
		</form>
    </div>
    </div>

  </section>

  <br>
<br>
<br>
<br>
<br>
<?php include 'includes/footer.php' ?>
<?php
		if(isset($_POST['submit']))
		{
			$what = htmlspecialchars( $_POST['what'], ENT_QUOTES, 'UTF-8');
			$date = htmlspecialchars( $_POST['date'], ENT_QUOTES, 'UTF-8');
			$start = htmlspecialchars( $_POST['start'], ENT_QUOTES, 'UTF-8');
			$end = htmlspecialchars( $_POST['end'], ENT_QUOTES, 'UTF-8');
			$reason = htmlspecialchars( $_POST['reason'], ENT_QUOTES, 'UTF-8');
			$locations = $_POST['location'];
			$status=1;
		
			


							
$output_dir3 = "../advisory_images";/* Path for file upload */
$RandomNum3   = time();
$ImageName3      = str_replace(' ','-',strtolower($_FILES['image3']['name'][0]));
$ImageType3      = $_FILES['image3']['type'][0];
											 
$ImageExt3 = substr($ImageName3, strrpos($ImageName3, '.'));
$ImageExt3       = str_replace('.','',$ImageExt3);
$ImageName3      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName3);
$NewImageName3 = $ImageName3.'-'.$RandomNum3.'.'.$ImageExt3;
$ret3[$NewImageName3]= $output_dir3.$NewImageName3;
												
/* Try to create the directory if it does not exist */
if (!file_exists($output_dir3))
{
	@mkdir($output_dir3, 0777);
}               
move_uploaded_file($_FILES["image3"]["tmp_name"][0],$output_dir3."/".$NewImageName3 );




			

			$affected_areas = implode(",", $locations);

			$adv="INSERT INTO tbladvisory(Wht, date, time_start, time_end, affected_area, Reason,Status,advisory_photo)
			VALUES('$what','$date', '$start', '$end', '$affected_areas', '$reason','$status','$NewImageName3	')";
			if($connect->query($adv)){
				$_SESSION['success'] = 'Advisory Added successfully';

				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Added as a new Advisory')";
					$query = mysqli_query($connect,$insert);

				echo
				"
					<script>
					window.location='public-advisory.php';

					</script>
				";
			}

			else{
				$_SESSION['error'] = $connect->error;
			}

		}
		?>


<style>
	.custom-select {
  position: relative;
  width: 100%;
  font-size: 16px;
  color: #333;
}

.select-text {
  display: block;
  padding: 10px;
  background-color: #f5f5f5;
  border: 1px solid #ccc;
  border-radius: 4px;
  cursor: pointer;
}

.options {
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  max-height: 200px;
  overflow-y: auto;
  background-color: #fff;
  border: 1px solid #ccc;
  border-top: none;
  border-radius: 0 0 4px 4px;
  padding: 10px;
  z-index: 9999;
  display: none;
}

.options li {
  margin: 5px 0;
}

.options label {
  display: inline-block;
  margin-right: 10px;
}

.options input[type="checkbox"] {
  margin-right: 5px;
}


</style>

<script>
	document.addEventListener("DOMContentLoaded", function() {
  const selectText = document.querySelector(".custom-select .select-text");
  const options = document.querySelector(".custom-select .options");
  const checkboxes = document.querySelectorAll(".custom-select input[type='checkbox']");
  
  // Show/hide options
  selectText.addEventListener("click", function() {
    options.style.display = options.style.display === "block" ? "none" : "block";
  });
  
  // Update select text
  checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener("change", function() {
      const checked = document.querySelectorAll(".custom-select input[type='checkbox']:checked");
      selectText.innerHTML = "Select options";
      if (checked.length) {
        const values = [];
        checked.forEach(function(checkbox) {
          values.push(checkbox.parentNode.innerText.trim());
        });
        selectText.innerHTML = values.join(", ");
      }
    });
  });
});

</script>