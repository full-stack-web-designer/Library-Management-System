
<?php 
    session_start();
    include('includes/connection.php');
    error_reporting(0);
    
        if(isset($_POST['submit']))
        {
            $studentid=$_POST['student'];
            $bookid=$_POST['books'];
            $fine=$_POST['fine'];
            $rd = $_POST['ReturnDate'];
                $status=1;
                $query=mysqli_query($con,"INSERT INTO tbl_issuedbookdetails(BookId,StudentId,Fine,ReturnDate,ReturnStatus) VALUES('$bookid','$studentid','$fine','$rd','$status')");
                if($query)
                {
                    echo "<script>alert('Book successfully Issued.')</script>";
                }
                else{
                    echo "<script>alert('Something went wrong . Please try again.')</script>";    
                } 

            
        }
        
    
?>

<!DOCTYPE html>

<html>
<head>
	<title>OLMS | Issue New Book</title>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="js/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui.theme.min.css">
	<script type="text/javascript">
		$(document).ready(function() {
			$("#t1").datepicker({
		});
		});
	</script>

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
			width: 60%;
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

		<h3>Isuue New Books</h3>
		<p><font color="blue">Admin / Issue Book </font>/ Isuue New Book</p><hr width="80%"/>

	</div>

	<div>
		<center>
			
			<form method="POST" action="" enctype="multipart/form-data" name="category">
				
				<table>
					
					<tr>
						<td colspan="2"><b><marquee><font size="5">Issue Books</font></marquee></b><hr width="80%">

						</td>

					</tr>

					<tr>
						
						<td><b>Student ID :</b></td>
							<td>
	                          <select class="form-control" name="student" required>

                               <option value="">Select Student ID </option>

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
						
						<td><b>ISBN Book Number :</b></td>
							<td>
	                          <select class="form-control" name="books" required>

                               <option value="">Select ISBN Number </option>

                                <?php

                                $ret=mysqli_query($con,"SELECT BookNumber from  tbl_books where Status=1");
                                while($result=mysqli_fetch_array($ret))
                                {    
                                ?>

                                <option value="<?php echo htmlentities($result['BookNumber']);?>"><?php echo htmlentities($result['BookNumber']);?></option>
                                <option value="<?php echo htmlentities($result['BookNumber']);?>"><?php echo htmlentities($result['BookName']);?></option>

                                <?php } ?>

                              </select>
                          </td>
					</tr>
					<td><b>Book Fine :</b></td><td> <input type="text" name="fine" required="" placeholder="Enter Fine" class="Cinput"></td>
					
					<tr>
					<td><b>Return Date :</b></td><td> <input type="text" name="ReturnDate" required="" placeholder="Return Date" class="Cinput" id="t1" readonly=""></td>
					
					<tr>
						<td colspan="2"><button type="submit" name="submit" value="Upload Image/Data" class="btn1">Issue Book</button></td>
					</tr>
				</table>
			</form>
		</center>

	</div>


</div>


</body>
</html>