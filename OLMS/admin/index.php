<?php
    session_start();

    include('includes/connection.php');

    if(isset($_POST['login']))
    {
 
        $uname=$_POST['uname'];
        $password=$_POST['upass'];
        
$sql =mysqli_query($con,"SELECT * FROM tbl_admin WHERE (UserName='$uname' || AdminEmail='$uname')");

    if($num=mysqli_fetch_array($sql))
    {
        $hashpassword=$num['Password']; 
        if (password_verify($password, $hashpassword)) 
        {
            
            $_SESSION['uname']=$num[1];
           
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

<!DOCTYPE html>
<html>
<head>
    <title>OLMS | Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style type="text/css">
        .container{
            margin-top: 100px;
            width:450px;

        }

    </style>
</head>
<body background="image/4.jpg">

<div class="container">
<div class="card">
<article class="card-body">

<h2 class="card-title mb-4 mt-1">Admin Login</h2>
	 <form method="POST" action=" " class="login-form" onsubmit="return validation()">
    <div class="form-group">
    	<label>Your email</label>
        <input name="uname" class="form-control" placeholder="Email or Username" type="text" required="">
        <span id="username"></span>
    </div> 
    <div class="form-group">
    	<label>Your password</label>
        <input class="form-control" placeholder="******" type="password" name="upass" required="">
    </div>
    <div class="form-group"> 
    <div class="checkbox">
      <label> <input type="checkbox"> Save password </label>
    </div> 
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-dark btn-block" value="Login" name="login"> Login  </button>
    </div>                                                           
</form>
</article>
</div>
</div>
</body>
</html>
