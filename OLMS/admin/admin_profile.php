<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Admin Profile</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body style="background-color: silver;">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<div class="logout" style="float: right; margin: 5px;">
    <a href="logout.php" class="btn btn-outline-dark btn-block" id="text">Logout</a>
  </div>
  <div style="width: 10%; margin: 5px;">
    <a href="dashboard.php" class="btn btn-outline-dark btn-block" id="text">Go Back</a>
  </div>
<div style="width: 600px; margin: 100px 200px 200px 400px;">
<div class="card text-center">
  <div class="card-body">
    <h3 class="card-title">*<font color="green"> Admin Profile </font>*</h3>
  </div>
    <div class="table-responsive">
    <table class="table">
  <tbody>
    <?php 
   session_start();
    include 'includes/connection.php';
   
        $uname=$_SESSION['uname'];
        //$password=$_SESSION['upass'];
                        $query=mysqli_query($con,"SELECT * from  tbl_admin where UserName='$uname' AND Status=1");
                      
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>
    <tr>
      <th scope="row">1</th>
      <th scope="row">Email Id</th>
      <td><?php echo htmlentities($row['AdminEmail']);?></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <th scope="row">UserName</th>
      <td><?php echo htmlentities($row['UserName']);?></td>
    </tr>
    <?php               } ?>
   
    
  </tbody>
</table>
  </div>
</div>
</div>

</body>
</html>