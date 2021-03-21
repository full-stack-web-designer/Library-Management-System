<?php
include ('includes/connection.php');
if(isset($_POST['register']))
{
$aname=$_POST['aname'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$status=1;
if($_POST['pass']==$_POST['cpass'])
{
	$hash = password_hash($pass, PASSWORD_BCRYPT);
$sql =mysqli_query($con,"INSERT tbl_admin(AdminEmail,UserName,Password,Status) VALUES('$email','$aname','$hash','$status')");
if($sql){
	echo "<script>alert('User registered Successfully');</script>";
	echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
}
else
{
	echo "<script>alert('User not registered');</script>";
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Create Admin Account</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
<body  class="img" background="image/5.jpg">
	<div class="logout" style="float: right; margin: 5px;">
    <a href="logout.php" class="btn btn-outline-primary btn-block" id="text">Logout</a>
  </div>
  <div style="width: 10%; margin: 5px;">
    <a href="dashboard.php" class="btn btn-outline-primary btn-block" id="text">Go Back</a>
  </div>
	<center>
		<form name="aregister" action="create_account.php" method="post">
	<table border="2">
		<tr>
			<td colspan="2" bgcolor="orange" class="t1"><center><h2> Create Admin Account</h2></center></td>
		</tr>
		<tr class="t2">
			<td>Email Id</td>
			<td><input type="email" name="email" placeholder="Email Id" required=""></td>
		</tr>
		<tr class="t2">
			<td>Full Name</td>
			<td><input type="text" name="aname" placeholder="Admin Name" required=""></td>
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
