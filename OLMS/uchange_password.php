<?php
session_start();

include('includes/connection.php');
error_reporting(0);

    if(isset($_POST['change']))
    {
 
        $cpassword=$_POST['password'];
        $npassword=$_POST['npassword'];
        $conpassword=$_POST['cpassword'];
        $sid=$_SESSION['uname'];

$sql =mysqli_query($con,"SELECT StudentId,EmailId,Password FROM tbl_Student WHERE (StudentId='$sid')");
$num=mysqli_fetch_array($sql);
    $oldpass=$num['Password'];
    if(password_verify($cpassword, $oldpass))
    {
        $hash = password_hash($npassword, PASSWORD_BCRYPT);
        if (password_verify($conpassword, $hash)) 
        {
            $query=mysqli_query($con,"UPDATE  tbl_student set Password='$hash' where StudentId='$sid'");
            if($query)
            {
                echo "<script>alert('Password successfully Updated.')  
                </script>";
                header('location:dashboard.php');
            }
            else{
                echo "<script>alert('Something went wrong . Please try again.')</script>";      
            }
        }
         else{
                echo "<script>alert('Password and Confirm password is Not match !.')</script>";
            }
    }
     else{
                echo "<script>alert('Your current password is wrong.')</script>";
            }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>OLMS | User Change Password</title>
    
    <link href="css/bootstrap.css" rel="stylesheet" />
  
    <link href="css/font-awesome.css" rel="stylesheet" />
   
    <link href="css/style.css" rel="stylesheet" />
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  
</head>

<body background="images/5.jpg" style="background-repeat: none;">
  <div class="logout" style="float: right; margin: 5px;">
    <a href="logout.php" class="btn btn-outline-primary btn-block" id="text">Logout</a>
  </div>
  <div style="width: 10%; margin: 5px;">
    <a href="dashboard.php" class="btn btn-outline-primary btn-block" id="text">Go Back</a>
  </div>
<div class="content-wrapper">
<div class="container" style="height: 400px;width: 400px;border:2px dashed blue; padding: 20px; border-radius: 50px 0px 50px 0px; background-color: pink; margin-top: 100px;">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">User Change Password</h4>
</div>
</div>
          
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">

<div class="panel-body">
<form role="form" method="post" onSubmit="return valid();" name="chngpwd">

<div class="form-group">
<label>Current Password</label>
<input class="form-control" type="password" name="password" placeholder="Current" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Enter Password</label>
<input class="form-control" type="password" name="npassword" placeholder="New" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Confirm Password </label>
<input class="form-control"  type="password" name="cpassword" placeholder="Confirm" autocomplete="off" required  />
</div>

 <button type="submit" name="change" class="btn btn-info">Change </button> 
</form>
 </div>
</div>
</div>
</div>   
    </div>
    </div>
    <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>
   <script src="js/custom.js"></script>
</body>
</html>

