<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
  <script src="https://cdn.tiny.cloud/1/b22imv1fhir2jzeev9sl5uahae8kuphrrq2hk6ngsjoaspsl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<?php include 'includes/topbar.php' ?>
<?php $page = "plumber"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li style='color:black'>Admin</li>
      <li style='color:black'>About Us</li>
      <li style='color:black'> Edit About Us</li>
    </ul>

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
    <div class="card has-table" style='color:blue'>

	<form method="POST" enctype='multipart/form-data'>
		<?php
			$id = $_GET['id'];
			$client="SELECT * FROM system WHERE system_ID ='$id' ";
			$res=mysqli_query($connect, $client)or die(mysqli_error($connect));
			while($rw=mysqli_fetch_assoc($res))
			{
			
		?>
		<table>
	
			<tr>
				<th>Picture 1</th>
				<td style='background:white'><input type='file' value="<?php echo $rw['picture1'];?>" name="picture1" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
            </tr>
			<tr>
				<th>Picture 2</th>
				<td style='background:white'><input type='file' value="<?php echo $rw['picture2'];?>" name="picture2" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
            </tr>
			<tr>
				<th>Picture 3</th>
				<td style='background:white'><input type='file' value="<?php echo $rw['picture3'];?>" name="picture3" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
            </tr>
			
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="submit" value="Done" name="btnupdate" style="background:lightblue;font-weight:bold;padding:5px;width:100px">Submit</button>
				<a href="system.php"type="submit" value="Cancel" name="btncancel" style="background:lightblue;font-weight:bold;padding:5px;width:100px">Cancel</a>
				
				</center>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
		</form>
    </div>

  </section>


<?php include 'includes/footer.php' ?>
<script type="text/javascript">
    tinymce.init({
      selector: 'textarea#basic-example',
      height: 500,
      plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'help', 'wordcount'
      ],
      toolbar: 'undo redo | blocks | ' +
      'bold italic backcolor | alignleft aligncenter ' +
      'alignright alignjustify | bullist numlist outdent indent | ' +
      'removeformat | help',
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
  </script>


<?php
		if(isset($_POST['btnupdate']))
			{
			
						
				
				$fileinfo=PATHINFO($_FILES["picture1"]["name"]);
				$newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
				move_uploaded_file($_FILES["picture1"]["tmp_name"],'../images/' .$newFilename);
				$picture1 = $newFilename;
				
				$fileinfo=PATHINFO($_FILES["picture2"]["name"]);
				$newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
				move_uploaded_file($_FILES["picture2"]["tmp_name"],'../images/' .$newFilename);
				$picture2 = $newFilename;
				
				$fileinfo=PATHINFO($_FILES["picture3"]["name"]);
				$newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
				move_uploaded_file($_FILES["picture3"]["tmp_name"],'../images/' .$newFilename);
				$picture3 = $newFilename;

				
				$update="UPDATE system SET a picture1='$picture1' , picture2='$picture2' , picture3='$picture3' WHERE system_ID='$id'";
				if($connect->query($update)){
				$_SESSION['success'] = 'About Us Updated successfully';


				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Updated a About Us')";
					$query = mysqli_query($connect,$insert);

				echo
				"
					<script>
						window.location='about-picture.php';
					</script>
				";
			}

			else{
				$_SESSION['error'] = $connect->error;
                echo
				"
					<script>
						window.location='about-picture.php';
					</script>
				";
			}


				
			
			}

			if(isset($_POST['btncancel']))
					{
						echo
							"
								<script>
									window.location='about-picture.php';
								</script>
							";
					}

				
	?>

