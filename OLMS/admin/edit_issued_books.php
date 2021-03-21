
<?php 
    session_start();
    include('includes/connection.php');
    error_reporting(0);
    
        if(isset($_POST['submit']))
        {
            $bookid=$_POST['book'];
            $studentid=$_POST['student'];
            $fine=$_POST['fine'];
     
            $status=1;
            $bid=intval($_GET['isid']);
            $query=mysqli_query($con,"UPDATE tbl_issuedbookdetails set BookId='$bookid',StudentId='$studentid',Fine='$fine' where BookId='$bid'");
            if($query)
            {
                echo "<script>alert('Book Issued Detail Updated.')</script>";
                header('location:manage_issued_books.php');
            }
            else{
                echo "<script>alert('Something went wrong . Please try again.')</script>";    
            } 
        }
    
?>

<!DOCTYPE html>

<html>
<head>
	<title>OLMS | Edit Issued Book</title>
	<style type="text/css">
		
		.hadding h3{
		margin-left: 180px;

			}
		.hadding p{
		text-align: right;
		margin-right: 180px;
		}
		
		td{
			padding: 10px;
		}
		.Cinput{
			padding: 5px;
			border:2px solid silver;
			border-radius: 5px;
		}

		.btn1{
			width: 50%;
			background:silver;
			border:2px solid blue;
			border-radius: 10px; 
			color: black;
			padding: 5px;
			font-size: 17px;
			cursor: pointer;
			margin: 12px 0;
		}
		.btn1:hover{
			background-color: green;
			transition:0.6s ease;
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
	
	<div class="hadding">

		<h3>Edit Issued Book</h3>
		<p><font color="blue">Admin / Issue Books </font>/ Edit Issued Book</p><hr width="80%"/>

	</div>

		<?php 
                $bid=intval($_GET['isid']);
                $query=mysqli_query($con,"SELECT * from  tbl_books INNER JOIN tbl_issuedbookdetails ON tbl_issuedbookdetails.BookId = tbl_books.BookNumber INNER JOIN tbl_student ON tbl_student.StudentId = tbl_issuedbookdetails.StudentId where tbl_issuedbookdetails.BookId=$bid");
              	
                while($row=mysqli_fetch_array($query))
                {
                ?>

	<div>
		<center>
			
			<form method="POST" action="" enctype="multipart/form-data" name="category">
				
				<table>
					
					<tr>
						<td colspan="2"><b><marquee><font size="5">Edit Issued Book</font></marquee></b><hr width="80%">

						</td>

					</tr>

					
						
					<tr>
						
						<td><b>Student ID :</b></td>
							<td>
	                          <select class="form-control" name="student">
                                  <option value="<?php echo htmlentities($row['StudentId']);?>"><?php echo htmlentities($row['StudentId']);?></option>
                                   <?php

                                  $ret=mysqli_query($con,"SELECT StudentId from  tbl_student where Status=1");
                                  while($result=mysqli_fetch_array($ret))
                                    {    
                                    ?>
                                    <option value="<?php echo htmlentities($result['StudentId']);?>"><?php echo htmlentities($result['StudentId']);?></option>
                                    <?php } ?>

                               </select>
                          </td>
					</tr>
					<tr>
						
						<td><b>Book Number :</b></td>
							<td>
	                          <select class="form-control" name="book">
                                  <option value="<?php echo htmlentities($row['BookNumber']);?>"><?php echo htmlentities($row['BookNumber']);?></option>
                                   <?php

                                  $ret=mysqli_query($con,"SELECT BookNumber from  tbl_books where Status=1");
                                  while($result=mysqli_fetch_array($ret))
                                    {    
                                    ?>
                                    <option value="<?php echo htmlentities($result['BookNumber']);?>"><?php echo htmlentities($result['BookNumber']);?></option>
                                    <?php } ?>

                               </select>
                          </td>
					</tr>
					<tr>
						<td><b>Fine :</b></td><td> <input type="text" name="fine" required="" placeholder="Book Number" class="Cinput" value="<?php echo htmlentities($row['Fine']);?>"></td>
					</tr>
					 <?php } ?>
					<tr>
						<td colspan="2"><button type="submit" name="submit" class="btn1">Update</button></td>
					</tr>
				</table>
			</form>
		</center>

	</div>


</div>


</body>
</html>