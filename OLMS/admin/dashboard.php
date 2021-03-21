<?php
 	session_start();
    include('includes/connection.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Dashboard Page</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
</head>
<body>

<div class="container">

<div>
  <?php
  include 'includes/header.php';
  ?>
</div>
<center>
<div class="haddings">
	<a href="manage_category.php">
	 <div class="wigdet-one-content">

        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Categories Listed</p>
       <?php $query=mysqli_query($con,"SELECT * from tbl_category where Status=1");
        $countcat=mysqli_num_rows($query);
        ?>
        <h2><?php echo htmlentities($countcat);?> <small></small></h2>
                                    
      </div>
  	</a>
    <a href="manage_author.php">
      <div class="wigdet-one-content">

         <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Authors</p>
        <?php $query=mysqli_query($con,"SELECT * from tbl_authors where Status=1");
         $countsubcat=mysqli_num_rows($query);
                                    ?>
        <h2><?php echo htmlentities($countsubcat);?> <small></small></h2>
                              
        </div>

    </a>
  	<a href="manage_books.php">
  		<div class="wigdet-one-content">

         <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Listed Books</p>
        <?php $query=mysqli_query($con,"SELECT * from tbl_books where Status=1");
         $countsubcat=mysqli_num_rows($query);
                                    ?>
        <h2><?php echo htmlentities($countsubcat);?> <small></small></h2>
                              
        </div>

  	</a>
  	<a href="approve_students.php">
  		 <div class="wigdet-one-content">

        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Students</p>
        <?php $query=mysqli_query($con,"SELECT * from tbl_student where Status=1");
        $countposts=mysqli_num_rows($query);
        ?>
        <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                              
        </div>

  	</a>
    <a href="approve_comments.php">
       <div class="wigdet-one-content">

        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Comments</p>
        <?php $query=mysqli_query($con,"SELECT * from tbl_feedback where Status=1");
        $countposts=mysqli_num_rows($query);
        ?>
        <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                              
        </div>

    </a>
	
</div>
</center>
	
</div>


</body>
</html>