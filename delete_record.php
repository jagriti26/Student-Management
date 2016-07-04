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
<h2 class="record">Delete a record</h2>
<div class="well">

<h4>Search by rollnumber</h4>
<div class="row">
<div class="col-xs-6">
<input class="form-control"type="text" name="search_rollno" placeholder="Enter rollnumber"></div>
<div class="col-xs-6"><button type="submit" name=search_byrno class="btn btn-danger">Delete</button></div>
</div>
</div>
</div>
</form>
</body>
</html>
<?php 
include('includes/dbcon.php');
if(isset($_POST['search_byrno'])){
	$get_rno=$_POST['search_rollno'];
	$get_detail="select * from student_info where c_rollno='$get_rno'";
	$run_detail=mysqli_query($conn,$get_detail);
	$row_detail=mysqli_num_rows($run_detail);
	if($row_detail==0){
		echo"<script>alert('No record exists.');</script>";
	}
	else{
		$del_record="delete from student_info where c_rollno='$get_rno' ";
		$run_record=mysqli_query($conn,$del_record);
		echo"<script>alert('Record is deleted')</script>";
		echo"<script>window.open('index.php','_self')</script>";
}}	
?>