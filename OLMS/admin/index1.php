<?php
 	session_start();

	include('includes/connection.php');

	if(isset($_POST['login']))
  	{
 
     	$uname=$_POST['uname'];
    	$password=$_POST['upass'];

$sql =mysqli_query($con,"SELECT AdminUserName,AdminEmailId,AdminPassword FROM tbladmin WHERE (AdminUserName='$uname' || AdminEmailId='$uname')");
$num=mysqli_fetch_array($sql);
	if($num>0)
	{
		$hashpassword=$num['AdminPassword']; 
		if (password_verify($password, $hashpassword)) 
		{
			$_SESSION['login']=$_POST['username'];
    		echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
  		} 
  		else {
			echo "<script>alert('Wrong Password');</script>";
 
  		}
	}
	else{
		echo "<script>alert('User not registered with us');</script>";
  		}
 
	}
?>




<html>
<head>
<title>News Portal | Admin Panel</title>
<link rel="stylesheet" href="css/animate.css">

<script type="text/javascript">
	function validation() {
		var uname=document.getElementById('n').value;
		var upass=document.getElementById('p').value;

		if (uname=="" | uname==null) {
			document.getElementById('username').innerHTML="**Can not be empty";
			return false; 
		}
		if(upass=="" | upass==null) {
			document.getElementById('userpass').innerHTML="**Can not be empty";
			return false; 
		}
	}
</script>


<style>
	@import "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
body{
	
	background-image: linear-gradient(120deg,#3498db,#8e44ad);
}

.login-form{
	width: 300px;
	background:#f1f1f1;
	height: 300px;
	font-family:montserrat;
	padding: 80px 40px;
	border-radius:10px;
	
}
 #Uhadding{
	margin-bottom: 30px;
	text-align: center;
}
.txtb{
	
	margin: 30px 0;
	border-bottom: 2px solid #adadad;
}

.txtb input{
	border:none;
	outline:none;
	background:none;
	color:#333;
	font-size:20px;
	width:80%;
	padding:0 10px;
	height:40px;

}
.btn{
	width: 100%;
	background:none;
	border:2px solid #3ACA0B;
	border-radius: 10px; 
	color: black;
	padding: 5px;
	font-size: 17px;
	cursor: pointer;
	margin: 12px 0;
}
.btn:hover{
	background-color: green;
	transition:0.6s ease;
}
.container{
	margin-top: 50px;
}
</style>

</head>
<body>


<div class="container">
	<center>
	<form method="POST" action="index.php" class="login-form" onsubmit="return validation()">
			<font size="6">Admin Login</font>
<div class="txtb">
	<span  class="fa fa-user"></span>
	<input type="text" id="n" name="uname"  placeholder="Username">

	<span id="username"></span>

</div>
<div class="txtb">
	<span class="fa fa-lock"></span>
	<input type="password" id="p" name="upass"  placeholder="Password">
	<spam id="userpass">
</div>

<input type="submit" value="Login" class="btn btn-outline-success" name="login"><br><br>


</center>
</form>
</div>
</body>
</html>