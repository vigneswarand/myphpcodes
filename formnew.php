<!--<html>
<head>
<title>
form
</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<h1>Registration Form</h1>
<div>

<form method="POST" action="db.php">
name:<input type="text" name="name" id="name"/><br>
fathername:<input type="text" id="lastname"name="lastname"/><br>
<input type="radio" name="gender" value="male">male<br>
<br><input type="radio" name="gender"  value="female">female
<br>tamil<input type="checkbox"  name="language[]" value="tamil">
<br>english<input type="checkbox" name="language[]" value="english">
<br><select name="seletprogram"  id="program_select">
<option value="c">c program</option>
<option value="c++">c++</option>
<option value="javacript">javascript</option>
<option value="node">node</option>
</select>
dob:<input type="date" id="dob"name="dob"><br>
Phone Number:<input type="number" name="phonenumber" id="phonenumber"><br>
Email:<input type="email" name="email" id="email"><br>
<textarea name="textarea1" id="textarea"></textarea>
<br>password<input type="password" name="password" id="password" >
<br><input type="submit" name="submit" id="butsave" value="submit"/>
</form>
<script>
$(document).ready(function() {
	$('#butsave').on('click', function() {
		//$("#butsave").attr("disabled", "disabled");
		var name = $('#name').val();
	/*var email = $('#email').val();		
		var phone = $('#phonenumber').val();
		var city = $('#city').val();
		*/
		//alert(name);
		if(name!="")
			//if(name!="" && email!="" && phone!="" && city!=""){
			$.ajax({
				url: "db.php",
				type: "POST",
				data: {
					name: name,
			//		email: email,
				//	phone: phone,
					//city: city				
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !'); 						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}	
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script></div>
</body>
</html>
-->
<!DOCTYPE html>
<html>
<head>
	<title>Insert data in MySQL database using Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container" style="margin-top:50px;">
	<form id="fupForm" name="form1" method="post">
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
		<input type="text" class="form-control" id="id" placeholder="id" name="name">
		<input type="button" name="save" class="btn btn-primary" value="Save to database" id="butsave">
	</form>
</div>
</div>
<div class="container">
  <h2>View data</h2>
	<table class="table table-bordered table-sm" >
    <thead>
      <tr>
        <th>ID</th>
        <th>name</th>
      <th>EDIT</th>
	  </tr>
    </thead>
    <tbody id="table">
    </tbody>
  </table>
</div>
<script>
$.ajax({
		url: "show.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#table').html(data); 
		}
	});	
$(document).ready(function() {
	$('#butsave').on('click', function() {
		var name = $('#name').val();
		var id = $('#id').val();
		if(name!=""){
			$.ajax({
				url: "db.php",
				type: "POST",
				data: {
				id:id,
				name: name	
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){			
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						//console.log(dataResult[0]);					
					$("#success").show();
						$('#success').html('Data added successfully !'); 						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
</body>
</html>