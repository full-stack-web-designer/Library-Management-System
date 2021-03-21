<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Issued Books</title>

	<style type="text/css">

	
.hadding p{
		text-align: right;
		margin-right: 30px;
}

	</style>
</head>
<body>

<div class="container">
		<div>
  				<?php
  				include 'includes/header.php';
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
        <a class="nav-link active" href="#">Issued Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="feedback.php">Feedback</a>
      </li>
    </ul>
  </div>

			
		<div class="addcategory">

			<div>

				<h4 style="margin: 20px;">Issued Books</h4>
			</div>

			<div class="table-responsive">

                <table class="table m-0 table-colored-bordered table-bordered-primary">
                    <thead>
                     <tr>
                       
                        <th>Book Name</th>
                        <th>Book Number</th>
                        <th>Issued Date</th>
                        <th>Return Date</th>
                        <th>Fine</th>
                     </tr>
                    </thead>
                    <tbody>
                      <?php
                      session_start();
    include('includes/connection.php');
     $uname=$_SESSION['uname'];
     echo "<b>$uname</b>";
                        $query=mysqli_query($con,"SELECT * from  tbl_books INNER JOIN tbl_issuedbookdetails ON tbl_issuedbookdetails.BookId = tbl_books.BookNumber INNER JOIN tbl_student ON tbl_student.StudentId = tbl_issuedbookdetails.StudentId where tbl_issuedbookdetails.ReturnStatus=1 AND tbl_student.Status=1 AND tbl_issuedbookdetails.StudentId='$uname'");
                  
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>

                        <tr>
                            <td><?php echo htmlentities($row['BookName']);?></td>
                            <td><?php echo htmlentities($row['BookNumber']);?></td>
                            <td><?php echo htmlentities($row['IssuedDate']);?></td>
                            <td><?php echo htmlentities($row['ReturnDate']);?></td>
                            <td><?php echo htmlentities($row['Fine']);?></td>
                        </tr>
                        <?php
                       
                        } ?>
                    </tbody>
                                                  
                </table>

        	</div>
          <hr />
          <div> <?php include('includes/footer.php');?></div>
        	

</div>
</div>
</body>
</html>
