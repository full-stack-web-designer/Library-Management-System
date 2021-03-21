<?php

  session_start();
  include('includes/connection.php');
  error_reporting(0);
   if(isset($_POST['submit']))
  {
  $name=$_POST['name'];
      $email=$_POST['email'];
      $comment=$_POST['comment'];
      $st1='0';
      $query=mysqli_query($con,"INSERT into tbl_feedback(FullName,EmailId,Comment,Status) values('$name','$email','$comment','$st1')");
      if($query):
        echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
        unset($_SESSION['token']);
      else :
       echo "<script>alert('Something went wrong. Please try again.');</script>";  

      endif;

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Feedback</title>
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
        <a class="nav-link" href="student_profile.php">Student Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="issued_books.php">Issued Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Feedback</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h3 class="card-title">|| <font color="navyblue">Feedback and Comments</font> ||</h3>
    <hr>

    <div class="card-body">
              <form name="Comment" method="post">
                <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
              </div>

              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter your valid email" required>
              </div>


              <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
              </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </form>
    </div>

  </div>
</div>
</div>
<hr />
<?php 
 $sts=1;
 $query=mysqli_query($con,"SELECT FullName,Comment,CreateDate from  tbl_feedback where Status='$sts'");
while ($row=mysqli_fetch_array($query)) {
?>
<div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo htmlentities($row['FullName']);?> <br />
                  <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['CreateDate']);?></span>
            </h5>
           
             <?php echo htmlentities($row['Comment']);?>            </div>
          </div>
<?php } ?>
<hr />
<div>
 	<?php
    	include('includes/footer.php');
    ?>
</div>
</body>
</html>