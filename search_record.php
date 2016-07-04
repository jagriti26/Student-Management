<html>
<head>
<title>Edit record</title>
	<link rel="stylesheet" href="style/style.css" media="all">
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<form method="post" action="">
<div class="search">
<h2 class="record">Search a record</h2>
<div class="well">
<h4>Search by name</h4>
<div class="row">
<div class="col-xs-6">
<input class="form-control"type="text" name="search_name" placeholder="Enter Name"></div>
<div class="col-xs-6"><button type="submit" name=search_byname class="btn btn-primary">Search</button></div>
</div>
<h4>Search by rollnumber</h4>
<div class="row">
<div class="col-xs-6">
<input class="form-control"type="text" name="search_rollno" placeholder="Enter rollnumber"></div>
<div class="col-xs-6"><button type="submit" name=search_byrno class="btn btn-primary">Search</button></div>
</div>
</div>
</div>
</form>
</body>
</html>
<?php 
session_start();
include('includes/dbcon.php');
if(isset($_POST['search_byname'])){
	$get_name=$_POST['search_name'];
	$get_detail="select * from student_info where c_name like '%$get_name%'";
	$run_detail=mysqli_query($conn,$get_detail);
	$row_detail=mysqli_num_rows($run_detail);
	if($row_detail==0){
		echo"<script>alert('No record exists.');</script>";
	}
	else{
		echo"<p>$row_detail record found</p>";
		while($row_stu=mysqli_fetch_array($run_detail)){
			$name=$row_stu['c_name'];
			$rollno=$row_stu['c_rollno'];
			$class=$row_stu['c_class'];
			$dob=$row_stu['c_dob'];
			$bgroup=$row_stu['c_bgroup'];
			$fname=$row_stu['c_fname'];
			$mname=$row_stu['c_mname'];
			$gender=$row_stu['c_gender'];
			$city=$row_stu['c_city'];
			$add=$row_stu['c_address'];
			$contact=$row_stu['c_contact'];
			$image=$row_stu['c_photo'];
			echo"<div class='well'>
			<div class='row'>
			<div class='col-xs-4'>
			<img src='student_images/$image' width='200' height='200'>
			</div>
			<div class='col-xs-6'>
			<h4>Name:$name</h4>
			<h4>Rollno:$rollno</h4>
			<h4>Class:$class</h4>
			<h4>Gender:$gender</h4>
			<h4>DOB(YY/MM/DD):$dob</h4>
			<h4>Father's name:$fname</h4>
			<h4>Mother's name:$mname</h4>
			<h4>Contact:$contact</h4>
			<h4>City:$city</h4>
			<h4>Address:$add</h4>
			</div>
			</div>
			</div>";
		}
	}
}
if(isset($_POST['search_byrno'])){
	$get_rno=$_POST['search_rollno'];
	$get_detail="select * from student_info where c_rollno='$get_rno'";
	$run_detail=mysqli_query($conn,$get_detail);
	$row_detail=mysqli_num_rows($run_detail);
	if($row_detail==0){
		echo"<script>alert('No record exists.');</script>";
	}
	else{
		echo"<p>Record found!</p>";
		$row_stu=mysqli_fetch_array($run_detail);
			$name=$row_stu['c_name'];
			$rollno=$row_stu['c_rollno'];
			$class=$row_stu['c_class'];
			$dob=$row_stu['c_dob'];
			$bgroup=$row_stu['c_bgroup'];
			$fname=$row_stu['c_fname'];
			$mname=$row_stu['c_mname'];
			$gender=$row_stu['c_gender'];
			$city=$row_stu['c_city'];
			$add=$row_stu['c_address'];
			$contact=$row_stu['c_contact'];
			$image=$row_stu['c_photo'];
			echo"<div class='well'>
			<div class='row'>
			<div class='col-xs-4'>
			<img src='student_images/$image' width='200' height='200'>
			</div>
			<div class='col-xs-6'>
			<h4>Name:$name</h4>
			<h4>Rollno:$rollno</h4>
			<h4>Class:$class</h4>
			<h4>Gender:$gender</h4>
			<h4>DOB(YY/MM/DD):$dob</h4>
			<h4>Father's name:$fname</h4>
			<h4>Mother's name:$mname</h4>
			<h4>Contact:$contact</h4>
			<h4>City:$city</h4>
			<h4>Address:$add</h4>
			</div>
			</div>
			</div>";
		}
	}

?>