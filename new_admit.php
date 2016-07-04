<html>

<head>
<title>New Admission</title>
<link rel="stylesheet" href="style/style.css" media="all">
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
<div class="row">
<center>
	<form method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-4">
		</div>
		<div class="col-xs-4">
		<h2>Enroll New Student</h2>
		<div class="form-group">
		<div class="row">
		<div class="col-xs-12"id="log">
		Name:<input class="form-control"type="text" name="c_name" placeholder="Enter name" required>
		</div>
		</div>
		<div class="row">
		Rollno:<div class="col-xs-12"id="log"><input class="form-control"  type="number" name="c_rno" placeholder="Enter rollno" required>
		</div>
		</div>
		<div class="row">
		DOB:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_dob" placeholder="YY/MM/DD" required>
		</div>
		</div>
		<div class="row">
		Class:<div class="col-xs-12"id="log"><select class="form-control" name="c_class">
		<?php 
		$i=1;
		while($i<=12){
			echo"<option>$i</option>";
			$i++;
		}
		?>
		</select>
		</div>
		</div>
		<div class="row">
		Gender:<div class="col-xs-12"id="log">
		<select class="form-control"  name="c_gender" placeholder="Enter gender" required>
		<option>Male</option>
		<option>Female</option>
		</select>
		</div>
		</div>
		<div class="row">
		Blood group:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_bgroup" placeholder="Enter bloodgroup" required>
		</div>
		</div>
		<div class="row">
		Father's name:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_fname" placeholder="Enter father's name" required>
		</div>
		</div>
		
		<div class="row">
		Mother's Name:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_mname" placeholder="Enter mother's name" required>
		</div>
		</div>
		<div class="row">
		City:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_city" placeholder="Enter city" required>
		</div>
		</div>
		<div class="row">
		Contact:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_contact" placeholder="Enter contact number" required>
		</div>
		</div>
		<div class="row">
		Address:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_address" placeholder="Enter address" required>
		</div>
		</div>
		<div class="row">
		Photo:<div class="col-xs-12"id="log"><input class="form-control" type="file" name="c_image" placeholder="Add image" required>
		</div>
		</div>
		<button type="submit" class="btn btn-primary btn-block"name="enroll">Enroll</button>
	</div>
	
	</form>
</div>
</body>

</html>
<?php
session_start();
include("includes/dbcon.php");
if(isset($_POST['enroll'])){
	$name=$_POST['c_name'];
	$rollno=$_POST['c_rno'];
	$dob=$_POST['c_dob'];
	$class=$_POST['c_class'];
	$bgroup=$_POST['c_bgroup'];
	$gender=$_POST['c_gender'];
	$fname=$_POST['c_fname'];
	$mname=$_POST['c_mname'];
	$city=$_POST['c_city'];
	$contact=$_POST['c_contact'];
	$add=$_POST['c_address'];
	$c_image=$_FILES['c_image']['name'];
	$c_image_tmp=$_FILES['c_image']['tmp_name'];
	move_uploaded_file($c_image_tmp,"student_images/$c_image");
	$insert_student="insert into student_info (c_name,c_rollno,c_dob,c_class,c_bgroup,c_gender,c_fname,c_mname,c_city,c_contact,c_address,c_photo) 
	values('$name','$rollno','$dob','$class','$bgroup','$gender','$fname','$mname','$city','$contact','$add','$c_image')";
	$run_query=mysqli_query($conn,$insert_student);
	if($run_query){
		echo"<script>alert('Record is successfully added.');</script>";
		echo"<script>window.open('index.php','_self');</script>";
	}
}
?>