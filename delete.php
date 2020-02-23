<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vicky";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_GET['id'])) {
$update = $_GET['id'];
}
$sql = "DELETE FROM crud where id=$update";
$result = $conn->query($sql);
if($result==TRUE)
{
	header('location:crud.php');
} 
else
{
echo "error in deleting";
}	
 ?>