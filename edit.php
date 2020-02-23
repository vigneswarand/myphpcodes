<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vicky";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_GET['id'])) {
$update = $_GET['id'];
}
$sql = "SELECT id,name FROM crud where id=$update";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) { 
echo "<form action='' method='POST'>";
echo"<input  type='hidden' name='nameid' value='{$row['id']}' />";
echo"<input  type='text' name='name' value='{$row['name']}' />";
echo "<input type='submit' name='update' value='UPDATE'>";
echo "</form>";
  }
  }  
if(isset($_POST['update']))
{
	$name=$_POST['name'];
	$nameid=$_POST['nameid'];
	$sql = "UPDATE crud SET name='$name' WHERE id=$nameid";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
	header('location:crud.php');
} 
}	
 ?>