<!Doctype>
<?php
	include("includes/dbcon.php");?>
<html>
	<head>
		<title>
			Inserting Product
		</title>
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</head>
	<body>
		<form method="post" action="insert_product.php" enctype="multipart/form-data">
			<table align="center" width="900" border="2" bgcolor="grey">
			<tr>
				<td colspan="7">
				<h2 align="center">Insert Product into table</h2>
				</td>
			</tr>
				<tr>
				<div class="form-group">
					<td>Product Title</td>
					<td><input class="form-control"type="text" name="product_title" required></td></div>
				</tr>
				<tr>
					<td>Product Category</td>
					<td><select name="product_cat" required><option>Select a Category</option>
					<?php
					$getcats="select * from categories";
					$runcats=mysqli_query($conn,$getcats);
					while($rowcats=mysqli_fetch_array($runcats)){
					$cat_id=$rowcats['cat_id'];
					$cat_title=$rowcats['cat_title'];
					echo "<option value='$cat_id'>$cat_title</option>";
					}
					?>
					</select></td>
				</tr>
				<tr>
					<td>Product Brand</td>
					<td><select name="product_brand" required><option>Select a brand</option>
					<?php
					$getbrand="select * from brands";
					$runbrand=mysqli_query($conn,$getbrand);
					while($rowbrand=mysqli_fetch_array($runbrand)){
					$brand_id=$rowbrand['brand_id'];
					$brand_title=$rowbrand['brand_title'];
					echo "<option value='$brand_id'>$brand_title</option>";
					}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Product Image</td>
					<td><input type="file" name="product_image" required></td>
				</tr>
				<tr>
					<td>Product Price</td>
					<td><input type="text" name="product_price" required></td>
				</tr>
				<tr>
					<td>Product Description</td>
					<td><textarea name="product_desc" cols="20" rows="10" ></textarea></td>
				</tr>
				<tr>
					<td>Product Keywords</td>
					<td><input type="text" name="product_keywords" required></td>
				</tr>
				<tr align="center">
					
					<td colspan="7"><input type="submit" name="insert_post" value="Insert"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<!--Getting data to insert in database-->
<?php
	if(isset($_POST['insert_post'])){
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$product_brand=$_POST['product_brand'];
		$product_price=$_POST['product_price'];
		$product_desc=$_POST['product_desc'];
		$product_keywords=$_POST['product_keywords'];
		$product_image=$_FILES['product_image']['name'];
		$product_image_tmp=$_FILES['product_image']['tmp_name'];
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		//inserting into table products
		$insert_product="insert into products 
		(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords)
		values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
		
		$insert_pro=mysqli_query($conn,$insert_product);
		if($insert_pro){
			echo "<script>alert('Product has been inserted succesfully')</script>";
			echo "<script>window.open('index.php?insert_product','_self')</script>";
		}
	}
 ?>