<?php 

$conn=new mysqli("localhost","root","","test");
/* if(isset($_POST['submit']))
{
echo $name=$_POST['name']."<br>";
echo $lastname=$_POST['lastname']."<br>";
echo $gender=$_POST['gender']."<br>";
$lang="";
$dob=$_POST['dob'];
$phonenumber=$_POST['phonenumber'];
$language=$_POST['language']."<br>";
$vicky=implode(',',$_POST['language']);
echo $vicky;	
echo $seletprogram=$_POST['seletprogram']."<br>";
echo $password=$_POST['password']."<br>";
echo $name=$_POST['textarea1'];	
}
//$sql=insert into test(name,lastname,gender,language,password,seletprogram)values('$name','$lastname','$gender','$language','$seletprogram','$password');
if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
	*/
//	include 'database.php';
	$id=$_POST['id'];
	$name=$_POST['name'];
	//$email=$_POST['email'];
	//$phone=$_POST['phone'];
	//$city=$_POST['city'];
	$sql = "INSERT INTO register(id,name)VALUES ('$id','$name')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

	
	?>

