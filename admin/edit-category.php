<?php include 'includes/session.php';?>
<?php include 'includes/header.php' ?>
<?php include 'includes/topbar.php' ?>
<?php $page = "advisory"; include 'includes/leftbar.php' ?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
    <li style='color:black'>Admin</li>
      <li style='color:black'>Complaint Category</li>
      <li style='color:black'>Add Category</li>
    </ul>

  </div>
  </section>

  <section class="section main-section">
  
    <div class="card has-table">

   
		<form method="POST">

        <?php

$id = $_GET['id'];
$qry="SELECT * FROM complaint_category WHERE category_ID = '$id'";
$res=mysqli_query($connect, $qry)or die(mysqli_error($connect));
while($rw=mysqli_fetch_assoc($res))
{
?>

		<table>
			<tr>
				<th>Complaint Category</th>
				<td style='background:white'><input type='text' name="category" value="<?php echo $rw['category']?>" style="border:solid;border-color:lightblue;border-width:1px;width:100%;padding:5px"required></td>
			</tr>
			
			<tr>
				<td style='background:white' colspan="2">
				<center>
				<button type="submit" style="background:lightblue;font-weight:bold;padding:5px;width:100px" name="submit">Submit</button>
				<button type="button" style="background:lightblue;font-weight:bold;padding:5px;width:100px" onclick="window.location.href='complaint-category.php'">Cancel</button>
				</center>
				</td>
			</tr>
            <?php
				}
			?>
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
<br>
<br>
<?php include 'includes/footer.php' ?>
<?php
		if(isset($_POST['submit']))
		{
			$id=$_GET['id'];
			$category = htmlspecialchars( $_POST['category'], ENT_QUOTES, 'UTF-8');
			
			

            $add="UPDATE complaint_category SET category = '$category' WHERE category_ID ='$id' ";
            
			if($connect->query($add)){
				$_SESSION['success'] = 'Update Complaint Category Successfully';

				$name = $user['Firstname'].' '.$user['Middlename'].' '.$user['Lastname']; 

				$insert = "INSERT INTO activity( name, position,  time_loged, status)
					VALUES( '$name', 'Admin',   NOW(),  'Update as a Complaint Category')";
					$query = mysqli_query($connect,$insert);

				echo
				"
					<script>
					window.location='complaint-category.php';

					</script>
				";
			}

			else{
				$_SESSION['error'] = $connect->error;
			}
            echo
            "
                <script>
                window.location='complaint-category.php';

                </script>
            ";
		}
		?>