<?php 
	session_start();
	include("includes/dbcon.php");
if(!isset($_SESSION['user_name'])){
	echo"<script>alert('You are not logged in.Please login first!!');</script>";
	echo"<script>window.open('login.php','_self');</script>";
}
?>



<!Doctype>
<html>
<head>
		<title>Admin Section</title>
		<link rel="stylesheet" href="style/style.css" media="all">
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body style="background-image:url('images/township10.jpg'); background-repeat:no-repeat;">
<h1 class="toparea"><img src="images/mgmlogo.jpg" width="100" height="100"><b>MGM Higher Secondary School,Balco</h1>
<a style="float:right; margin-right:10px;"href="logout.php">Logout</a>
<center>
<div class="row">
<div class="col-xs-4"></div>
<div class="col-xs-4">
<div class="row btnpad">
<button type="button" class="btn btn-primary btn-block"><a style="color:black;"href="new_admit.php?new_admit">Enroll a new record</a></button></div>
<div class="row btnpad">
<button type="button" class="btn btn-success btn-block"><a style="color:black;"href="edit_record.php?edit_record">Edit a record</a></button></div>
<div class="row btnpad">
<button type="button" class="btn btn-warning btn-block"><a style="color:black;"href="search_record.php?search_record">Search a record</a></button></div>
<div class="row btnpad">
<button type="button" class="btn btn-danger btn-block"><a style="color:black;"href="delete_record.php?delete_record">Delete a record</a></button></div>
</div>
</body>
</html>
