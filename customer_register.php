<!Doctype>
<?php 
$conn=mysqli_connect("localhost","root","","ecommerce");
?>
<?php 
session_start();
	include('functions/functions.php');
	include('includes/dbcon.php');
?>
<html>
	<head>
		<title>Online Shopping</title>
		<link rel="stylesheet" href="styles/style.css" media="all">
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/navbar.js"></script>
</head>
<body>
<div class="jumbotron">
<div class="container-fluid" id="main" >
<!--navbar starts-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
	<a class="navbar-brand" id="open" href="#"><img src="images/icon.png"></a>
 <a  class="navbar-brand" id="title" href="#">ShoppingCart.com</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="allproducts.php">All products</a></li>
	  <li><a href="customer/myaccount.php">My account</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right" id="form">
	<div id="form">
	<form method="get" action="results.php" enctype="multipart/form-data">
	<div class="form-group">
	<div class="row">
	<div class="col-xs-6">
      <input class="form-control" type="text" name="user_query" placeholder="Search a item"></div>
     <div class="col-xs-6"> <button type="submit" name="search"class="btn btn-default">Submit</button></div>
	  </div>
	  </div>  
	  </form>
	  </div>
    </ul>
  </div>
</nav>
<!--navbar ends-->
<!--Add to cart-->
<?php add_cart(); ?>
<div id="cart_options">
<div class="row">
<div class="col-xs-6">
<span style="float:left; font-size:20px;padding:5px; line-height:40px;">
<?php 
	
if(isset($_SESSION['customer_email'])){
	echo "<b>Welcome</b>".$_SESSION['customer_email']."!";
}
else{
	echo "<b>Welcome Guest!</b>";
}
 ?>

</div>
<div class="col-xs-6">
<span style="float:right; font-size:20px;padding:5px; line-height:40px;">
<b style="font-size:20px">Total price:$<?php total_price();?></b>
<b>Total items:<?php total_item(); ?></b>
<a href="cart.php"><img src="images/addtocart.jpg" title="Go to cart"></a>
<?php
if(!isset($_SESSION['customer_email'])){
	echo "<a href='checkout.php'>Sign in</a>";
}
else{
	echo "<a href='logout.php'>Sign out</a>";
}
 ?>
</span>
</div>
</div>
</div>

<!--Add to cart ends-->
<!--Sidebar starts-->
<div id="mySidenav" class="sidenav">
	<a href="#"class="closebtn" id="close">-</a>
	<h3 id="header">Categories</h3>
   <?php 
		getcats();
	?>
  <h3 id="header">Brands</h3>
   <?php 
		getbrand();
	?>  
</div>
<!--Sidebar ends-->
<!-- Content area starts-->
<div class="row">
<center>
	<form method="post" action="customer_register.php" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-4">
		</div>
		<div class="col-xs-4">
		<h2>Create Account</h2>
		<div class="form-group">
		<div class="row">
		<div class="col-xs-12"id="log">
		Name:<input class="form-control"type="text" name="c_name" placeholder="Enter name" required>
		</div>
		</div>
		<div class="row">
		E-mail:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_email" placeholder="Enter email" required>
		</div>
		</div>
		<div class="row">
		Password:<div class="col-xs-12"id="log"><input class="form-control"  type="password" name="c_pass" placeholder="Enter password" required>
		</div>
		</div>
		<div class="row">
		Country:<div class="col-xs-12"id="log"><select class="form-control" name="c_country">
		<option>Select a country</option>
		<option>Afganistan</option>
		<option>India</option>
		<option>Japan</option>
		<option>Pakistan</option>
		<option>Nepal</option>
		<option>USA</option>
		</select>
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
		<button type="submit" class="btn btn-primary  btn-block"name="signup">Create Account</button>
	</div>
	
	</form>
</div>
<!-- Content area ends-->

</div>


	</body>
</html>
<?php
if(isset($_POST['signup'])){
	$ip=getIp();
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	$c_image=$_FILES['c_image']['name'];
	$c_image_tmp=$_FILES['c_image']['tmp_name'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address'];
	
	
	
	move_uploaded_file($c_image_tmp,"customer/customerimages/$c_image");
	
	 $insert_c="insert into customers
	(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image)
	values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
	$run_cus=mysqli_query($conn,$insert_c);
	$sel_cart="select * from cart where ip_add='$ip'";
	$run_cart=mysqli_query($conn,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_cart==0){
		$_SESSION['customer_email']=$c_email;
		echo"<script>alert('Your account is created')</script>";
		echo"<script>window.open('customer/myaccount.php','_self')</script>";
	}
	else{
		$_SESSION['customer_email']=$c_email;
		echo"<script>alert('Your account is created')</script>";
		echo"<script>window.open('checkout.php','_self')</script>";
	}
}
 ?>