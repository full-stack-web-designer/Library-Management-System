<?php

 session_start();
 error_reporting(0);
 if(isset($_POST['login'])){
 $u=$_POST['uname'];
 $p=$_POST['upass'];


include 'includes/connection.php';
$sql="SELECT * from tbl_student where StudentId='$u' || EmailId='$u'";
$res=mysqli_query($con,$sql);
if($row=mysqli_fetch_array($res))
{
    $hash = $row['Password'];
    if(password_verify($p, $hash))
    {       
        if($row[8]==1){
            $_SESSION['uname']=$row[0];
            
        header('location:dashboard.php');
    }
    else
    {
       echo "<script>alert('User Not Aprroved');</script>"; 
    }
    }
    else{
        echo "<script>alert('Wrong Password');</script>";
        
    }
}
else
{
            echo "<script>alert('User not registered with us');</script>";

}
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>OLMS | User Login</title>
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
<body background="images/4.jpg">

<div class="container">
<div class="card">
<article class="card-body">
<a href="sregistration.php" class="float-right btn btn-outline-primary">Sign up</a>
<h2 class="card-title mb-4 mt-1">User Login</h2>
	 <form method="POST" action=" " class="login-form" onsubmit="return validation()">
    <div class="form-group">
    	<label>Your email</label>
        <input name="uname" class="form-control" placeholder="Email or Username" type="text" required="">
        <span id="username"></span>
    </div> 
    <div class="form-group">
    	
    	<label>Your password</label>
        <input class="form-control" placeholder="******" type="password" name="upass">
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