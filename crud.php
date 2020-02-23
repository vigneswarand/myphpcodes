<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vicky";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT id,name FROM crud";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]."<br>";
    }
} else {
    echo "0 results";
}?>

 <center>
<table>
<form action="" method="post">

     <tr><td><label> name:<label></td><td><input type="text" id="username" name="username"></td></tr> 
     <tr><td><label>EMAIL</label></td><td><input type="email" id="useremail" name="email"></td></tr>
    <tr><td> <label> COMPANY URL:</label></td><td><input type="url" name="urlField"/></td></tr>
     <tr><td><label>ENTER AGE</label></td><td><input type="number" name="numberField"/></td></tr>
     <tr><td><label>RANGE FILED</label> </td><td><input type="range" name="rangeField"/></td></tr>
    <tr><td> <label>TELEPHONE</label></td><td><input type="tel" name="telField"/></td></tr>
     <tr><td><label> JOB</label></td><td><input type="search" name="searchField"/></td></tr>
     <tr><td><label>DOB</label> </td><td><input type="date" name="dateField"/></td></tr>
    <tr><td> <label>TIME OF BIRTH</label></td><td><input type="time" name="timeField"/></td></tr>
  <!--  <tr><td> <label>DATE AND TIME</label></td><td><input type="datetime" name="datetimeField"/></td></tr>-->
    <tr><td> <label>ENTER MONTH</label></td><td><input type="month" name="monthField"/></td></tr>
    <tr><td> <label> ENTER WEEK</label></td><td><input type="week" name="weekField"/></td></tr></td></tr>
    <tr><td> <label> FAVORITE COLOR</label></td><td><input type="color" name="colorField"/></td></tr>
	 <tr><td><label>PASSWORD </label></td><td> <input type="password" name="password"/></td></tr>
     <tr><td><label>GENDER:</label> </td><td><input type="radio" required name="gender" value="male"/>male
											<input type="radio" required name="gender" value="female"/>female</td></tr>
     <tr><td><label>FAVORITE LANGUAGE: </label> </td>
	 <td><input type="checkbox" name="languageknown[]" value="tamil"/>tamil
	 <input type="checkbox" name="languageknown[]" value="english"/>english</td>
	 </tr>  
     <tr><td> <label>DESCRIPTION:</label></td><td>  <textarea name="description"></textarea></td></tr>
	<tr><td><label>LANGUAGE KNOWN:</label></td><td> <select id="cars" name="programlanguage">
							    <option value="c">C</option>
                               <option value="c+">C++</option>
                               <option value="javscript">Javascript</option>
                               <option value="php">php</option>
                      </select></td></tr>
   <tr><td><input type="submit" name="submit" value="Submit"><tr><td>
  
  </form>
 </table>
 </center>
  <hr>
<form method="post" action="">
<input type="submit" name="delete" value="DELETE">
<input type="submit" name="update" value="UPDATE">
<form action="" method="post">
  enter your name:<input type="text"  name="name"><br>
  <input type="submit" name="insert" value="INSERT">
  </form>
  <form action="postpdf.php" method="post">
 <input type="submit" name="generatepdf" value="GENERATE PDF">
  </form>
<?php

if(isset($_POST['submit']))
{
$name=$_POST['username'];
$email=$_POST['email'];
$url=$_POST['urlField'];
$age=$_POST['numberField'];
$range_field=$_POST['rangeField'];
$telephone=$_POST['telField'];
$searchfiled=$_POST['searchField'];
$dob=$_POST['dateField'];
$timefiled=$_POST['timeField'];
//$dateandtime=$_POST['datetimeField'];
$week=$_POST['weekField'];
$month=$_POST['monthField'];
$color=$_POST['colorField'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$languageknown=implode(',',$_POST['languageknown']);
$description=$_POST['description'];
$programlanguage=$_POST['programlanguage'];
/*echo "<br>".$name;
echo "<br>".$email;
echo "<br>".$url;
echo "<br>".$age;
echo "<br>".$range_field;
echo "<br>".$telephone;
echo "<br>".$searchfiled;
echo "<br>".$dob;
//echo "<br>".$dateandtime;
echo "<br>".$week;
echo "<br>".$month;
echo "<br>".$color;
echo "<br>".$password;
echo "<br>".$gender;
echo "<br>".$languageknown;
echo "<br>".$description;
echo "<br>".$programlanguage;
echo "<br>".$timefiled;
	*/
$sql = "INSERT into formallfields(name,email,url,age,rangefiled,telephone,searchfiled,dob,month,week,color,password,gender,languageknown,description,programlanguage,time)values('$name','$email','$url','$age','$range_field','$telephone','$searchfiled','$dob','$month','$week','$color','$password','$gender','$languageknown','$description','$programlanguage','$timefiled')";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
	}

$sql = "SELECT * FROM formallfields";
$result = $conn->query($sql);
echo "<table style='border:1px solid black;'>";
echo "<tr><td>id</td><td>name</td><td>EDIT</td><td>DELETE</td></tr>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row['id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['url']."</td>";
		echo "<td>".$row['age']."</td>";
		echo "<td>".$row['rangefiled']."</td>";
		echo "<td>".$row['telephone']."</td>";
		echo "<td>".$row['searchfiled']."</td>";
		echo "<td>".$row['dob']."</td>";
		echo "<td>".$row['month']."</td>";
		echo "<td>".$row['week']."</td>";
		echo "<td>".$row['color']."</td>";
		echo "<td>".$row['password']."</td>";
		echo "<td>".$row['gender']."</td>";
		echo "<td>".$row['languageknown']."</td>";
		echo "<td>".$row['description']."</td>";
		echo "<td>".$row['programlanguage']."</td>";
		echo "<td>".$row['time']."</td>";
		
	echo "<td><a href='edit2.php?id={$row['id']}'>EDIT</a></td>";
	echo "<td><a href='deleteall.php?id={$row['id']}'>DELETE</a></td></tr>";
	//echo "<br />";
?>

<?php 
}
}
else {
    echo "0 results";
}
echo "</table>";
$conn->close();
?>
