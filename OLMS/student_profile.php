<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Student Profile</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<div>
 	<?php
    	include('includes/header.php');
    ?>
</div>
<hr>
<div>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Student Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="issued_books.php">Issued Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="feedback.php">Feedback</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h3 class="card-title">*<font color="green"> Student Profile </font>*</h3>
  </div>
    <div class="table-responsive">
    <table class="table">
  <tbody>
    <?php 
   session_start();
 
    include 'includes/connection.php';
   
 
        $uname=$_SESSION['uname'];
        //$password=$_SESSION['upass'];

                        $query=mysqli_query($con,"SELECT * from  tbl_student where StudentId='$uname' AND Status=1");
                      
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>
    <tr>
      <th scope="row">1</th>
      <th scope="row">Enrollment</th>
      <td><?php echo htmlentities($row['StudentId']);?></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <th scope="row">Student Name</th>
      <td><?php echo htmlentities($row['FullName']);?></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <th scope="row">Email-Id</th>
      <td><?php echo htmlentities($row['EmailId']);?></td>
    </tr>
     <tr>
      <th scope="row">4</th>
      <th scope="row">Branch</th>
      <td><?php echo htmlentities($row['Branch']);?></td>
    </tr>
     <tr>
      <th scope="row">5</th>
      <th scope="row">Semester</th>
      <td><?php echo htmlentities($row['Semester']);?></td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <th scope="row">Registration Date</th>
      <td><?php echo htmlentities($row['RegDate']);?></td>
    </tr>
    <?php               } ?>
   
    
  </tbody>
</table>
</font>
<hr />
    <a href="" class="btn btn-primary">Go somewhere</a>
  </div><br>
</div>
</div>

<div>
 	<?php
    	include('includes/footer.php');
    ?>
</div>
</body>
</html>