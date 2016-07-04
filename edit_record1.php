<?php 
include('includes/dbcon.php');
if(isset($_POST['search_byrno'])){
	$get_rno=$_POST['search_rollno'];
	$get_detail="select * from student_info where c_rollno='$get_rno'";
	$run_detail=mysqli_query($conn,$get_detail);
	$row_detail=mysqli_num_rows($run_detail);
	if($row_detail==0){
		echo"<script>alert('No record exists.');</script>";
		echo"<script>window.open('edit_record.php','_self');</script>";
		return;
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
?>
<html>
	<form method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-4">
		</div>
		<div class="col-xs-4">
		<h2>Edit Student Details</h2>
		<div class="form-group">
		<div class="row">
		<div class="col-xs-12"id="log">
		Name:<input class="form-control"type="text" name="c_name" value="<?php echo $name;?>">
		</div>
		</div>
		<div class="row">
		Rollno:<div class="col-xs-12"id="log"><input class="form-control"  type="number" name="c_rno" value="<?php echo $rollno;?>"disabled>
		</div>
		</div>
		<div class="row">
		DOB:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_dob" placeholder="YY/MM/DD" value="<?php echo $dob;?>">
		</div>
		</div>
		<div class="row">
		Class:<div class="col-xs-12"id="log"><select class="form-control" name="c_class" >
		<option><?php echo $class; ?></option>
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
		<select class="form-control"  name="c_gender" placeholder="Enter gender" >
		<option><?php echo $gender; ?></option>
		<option>Male</option>
		<option>Female</option>
		</select>
		</div>
		</div>
		<div class="row">
		Blood group:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_bgroup" value="<?php echo $bgroup;?>">
		</div>
		</div>
		<div class="row">
		Father's name:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_fname" value="<?php echo $fname;?>">
		</div>
		</div>
		
		<div class="row">
		Mother's Name:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_mname" value="<?php echo $mname;?>">
		</div>
		</div>
		<div class="row">
		City:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_city" value="<?php echo $city;?>">
		</div>
		</div>
		<div class="row">
		Contact:<div class="col-xs-12"id="log"><input class="form-control"  type="number" name="c_contact"value="<?php echo $contact;?>">
		</div>
		</div>
		<div class="row">
		Address:<div class="col-xs-12"id="log"><input class="form-control"  type="text" name="c_address" value="<?php echo $add;?>">
		</div>
		</div>
		
		<button type="submit" class="btn btn-primary btn-block"name="update">Update</button>
	</div>
	</div>
	</form>
</html>	
	<?php }} ?> 
	<?php
if(isset($_POST['update'])){
	
			$name=$_POST['c_name'];
			
			$class=$_POST['c_class'];
			$dob=$_POST['c_dob'];
			$bgroup=$_POST['c_bgroup'];
			$fname=$_POST['c_fname'];
			$mname=$_POST['c_mname'];
			$gender=$_POST['c_gender'];
			$city=$_POST['c_city'];
			$add=$_POST['c_address'];
			$contact=$_POST['c_contact'];
			
	$update_student="update student_info set c_name='$name',c_dob='$dob',c_class='$class',c_bgroup='$bgroup',c_gender='$gender',c_fname='$fname',c_mname='$mname',c_city='$city',c_contact='$contact',c_address='$add'"; 
	
	$run_query=mysqli_query($conn,$update_student);
	echo"<script>alert('Record successfully updated.');</script>";
		echo"<script>window.open('index.php','_self');</script>";
}	
?>	