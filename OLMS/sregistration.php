<?php
include ('includes/connection.php');
if(isset($_POST['register']))
{
$enroll=$_POST['enroll'];
$sname=$_POST['sname'];
$branch=$_POST['branch'];
$sem=$_POST['sem'];
$gender=$_POST['g'];
$email=$_POST['email'];
$mob=$_POST['mob'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];

$status=0;
if($_POST['pass']==$_POST['cpass'])
{
	$hash = password_hash($pass, PASSWORD_BCRYPT);
$sql =mysqli_query($con,"INSERT tbl_student(StudentId,FullName,Branch,Semester,Gender,EmailId,MobileNumber,Password,Status) VALUES('$enroll','$sname','$branch','$sem','$gender','$email','$mob','$hash','$status')");
	echo "<script>alert('User registered Successfully');</script>";
	echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else
{
	echo "<script>alert('User not registered');</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Student Signup</title>
	<script src="js/jquery-3.4.1.min.js"></script>
	<style type="text/css">
		body{
			
			background-repeat: no-repeat;

		}
		table{
			border:2px solid blue;
			border-radius: 5px;
			margin-top: 100px;
			background-color: #99918f;
			height: 500px;
			width: 500px;
			padding: 3px;
		}
		input{
			border:1px solid green;
			border-radius: 3px;
		}
		button{
			border:1px solid blue;
			border-radius: 3px;
			background-color: orange;
			padding: 5px auto;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".t1").mouseenter(function(){
				$(this).css("background-color","lightgreen")
			})
			$(".t1").mouseleave(function(){
				$(this).css("background-color","orange")
			})
			$(".t2").mouseenter(function(){
				$(this).css("background-color","lightblue")
			})
			$(".t2").mouseleave(function(){
				$(this).css("background-color","pink")
			})
		})
	</script>
</head>
<body  class="img" background="images/5.jpg">
	<center>
		<form name="sregister" action="sregistration.php" method="post">
	<table border="2">
		<tr>
			<td colspan="2" bgcolor="orange" class="t1"><center><h2> STUDENT REGISTRATION FORM</h2></center></td>
		</tr>
		<tr class="t2">
			<td>Enrollment</td>
			<td><input type="text" name="enroll" placeholder="Enrollment" required=""></td>
		</tr>
		<tr class="t2">
			<td>Full Name</td>
			<td><input type="text" name="sname" placeholder="Student Name" required=""></td>
		</tr>
		<tr class="t2">
			<td>Branch</td>
			<td>
				<select name="branch" required="">
					<option>CSE</option>
					<option>IT</option>
					<option>ME</option>
					<option>CE</option>
					<option>ECE</option>
					<option>EX</option>
				</select>
			</td>
		</tr>
		<tr class="t2">
			<td>Semester</td>
			<td>
				<select name="sem" required="">
					<option>I</option>
					<option>II</option>
					<option>III</option>
					<option>IV</option>
					<option>V</option>
					<option>VI</option>
					<option>VII</option>
					<option>VIII</option>
				</select>
			</td>
		</tr>
		<tr class="t2">
			<td>Gender</td>
			<td><input type="radio" name="g" value="m" required="" checked=""><font color="red" size="4">M</font>ale <input type="radio" name="g" value="f" required=""><font color="orange" size="4">F</font>emale</td>
		</tr>
		<tr class="t2">
			<td>Email-ID</td>
			<td><input type="email" name="email" placeholder="Email ID" required=""></td>
		</tr>
		<tr class="t2">
			<td>Mobile No</td>
			<td><input type="text" name="mob" placeholder="Mobile No" required="" maxlength="10"></td>
		</tr>
		
		<tr class="t2">
			<td>Password</td>
			<td><input type="Password" name="pass" placeholder="Password"></td>
		</tr>
		<tr class="t2">
			<td>Conform Password</td>
			<td><input type="Password" name="cpass" placeholder="Conform Password" required=""></td>
		</tr>
		<tr class="t2">
			<td colspan="2"><center><button class="t1" name="register">REGISTER</button></center></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>
