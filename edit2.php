<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vicky";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_GET['id'])) {
$update = $_GET['id'];
}
$sql = "SELECT * FROM formallfields where id=$update";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) { 

  $check=$row['languageknown'];
  $data=(explode(",",$check));
  $check=array("tamil","english");
if (in_array($check[0], $data))
{
$checked1 ="checked";
}
else
{
$checked1 ="";
}
if (in_array($check[1], $data))
{
$checked2 ="checked";
}
else
{
$checked2="";
}
  echo "<form action='' method='POST'>";
echo"<input  type='hidden' name='nameid' value='{$row['id']}' />";

     echo "<tr><td><label> name:<label></td><td><input type='text' id='username' value='{$row['name']}' name='username'></td></tr>"; 
    echo " <tr><td><label>EMAIL</label></td><td><input type='email' id='useremail' value='{$row['email']}' name='email'></td></tr>";
   echo " <tr><td> <label> COMPANY URL:</label></td><td><input type='url' value='{$row['url']}' name='urlField'/></td></tr>";
   echo "   <tr><td><label>ENTER AGE</label></td><td><input type='number' value='{$row['age']}' name='numberField'/></td></tr>";
     echo " <tr><td><label>RANGE FILED</label> </td><td><input type='range'  value='{$row['rangefiled']}'name='rangeField'/></td></tr>";
     echo "<tr><td> <label>TELEPHONE</label></td><td><input type='tel' value='{$row['telephone']}' name='telField'/></td></tr>";
      echo "<tr><td><label> JOB</label></td><td><input type='search'value='{$row['searchfiled']}'  name='searchField'/></td></tr>";
      echo "<tr><td><label>DOB</label> </td><td><input type='date' value='{$row['dob']}'  name='dateField'/></td></tr>";
     echo "<tr><td> <label>TIME OF BIRTH</label></td><td><input type='time' value='{$row['time']}' name='timeField'/></td></tr>";
   echo "  <tr><td> <label>ENTER MONTH</label></td><td><input type='month' value='{$row['month']}' name='monthField'/></td></tr>";
     echo "<tr><td> <label> ENTER WEEK</label></td><td><input type='week' value='{$row['week']}' name='weekField'/></td></tr></td></tr>";
     echo "<tr><td> <label> FAVORITE COLOR</label></td><td><input type='color' value='{$row['color']}' name='colorField'/></td></tr>";
	  echo "<tr><td><label>PASSWORD </label></td><td> <input type='password' value='{$row['password']}' name='password'/></td></tr>";
      echo "<tr><td><label>GENDER:</label> </td><td><input type='radio' value='{$row['gender']}' name='gender' value='male'/>male
											<input type='radio' value='{$row['gender']}' name='gender' value='female'/>female</td></tr>";
     echo " <tr><td><label>FAVORITE LANGUAGE: </label> </td>";
  echo " <td><input type='checkbox' name='languageknown[]' value='tamil' {$checked1}/>tamil
	 <input type='checkbox' name='languageknown[]' value='english' {$checked2} />english</td>
	 </tr>  ";
      echo "<tr><td> <label>DESCRIPTION:</label></td><td>  <textarea name='description'>
	  {$row['description']} </textarea></td></tr>";
	 echo "<tr><td><label>LANGUAGE KNOWN:</label></td><td> <select id='cars' name='programlanguage'>
							    <option value='{$row['programlanguage']}'>C</option>
                               <option value='c+'>C++</option>
                               <option value='javscript'>Javascript</option>
                               <option value='php'>php</option>
                      </select></td></tr>";
//   echo "<tr><td><input type='submit' name='submit' value='Submit'><tr><td>";
echo "<input type='submit' name='update' value='UPDATE'>";
echo "</form>";
  }
  }  
if(isset($_POST['update']))
{
	$name=$_POST['name'];
	$nameid=$_POST['nameid'];
	$languageknown=implode(',',$_POST['languageknown']);
	echo "<pre>";
	print_r($languageknown);
	echo "</pre>";
	//$sql = "UPDATE formallfields SET name='$name' WHERE id=$nameid";
	//if ($conn->query($sql) === TRUE) {
    //``echo "Record updated successfully";
	//header('location:crud.php');
}	
 ?>