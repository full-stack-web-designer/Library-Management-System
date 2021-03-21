<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Dashboard</title>
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
        <a class="nav-link active" href="#">Home</a>
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
        <a class="nav-link" href="feedback.php">Feedback</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h3 class="card-title">@<font color="mahroon"> Pictures </font>@</h3>

   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/3.jpg" alt="First slide" height="400px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/2.jpg" alt="Second slide" height="400px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/5.jpg" alt="Third slide" height="400px">
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <hr>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>

<div>
 	<?php
    	include('includes/footer.php');
    ?>
</div>
</body>
</html>