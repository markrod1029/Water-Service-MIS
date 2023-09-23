<?php
include('session.php');
if(!empty($_POST["cat_id"])) 
{
 $id=intval($_POST['cat_id']);
$query=mysqli_query($connect,"SELECT * FROM tblclients WHERE client_ID =' $id' ");
?>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo $row['client_ID']; ?>"><?php echo htmlentities($row['client_mname']); ?></option>
  <?php
 }
}
?>