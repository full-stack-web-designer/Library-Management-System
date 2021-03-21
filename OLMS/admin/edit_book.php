
<?php 
    session_start();
    include('includes/connection.php');
    error_reporting(0);
    
        if(isset($_POST['submit']))
        {
            $bookname=$_POST['bookname'];
            $catid=$_POST['category'];
            $authorid=$_POST['author'];
            $booknumber=$_POST['booknumber'];
           
            $status=1;
            $bid=intval($_GET['bn']);
            $query=mysqli_query($con,"UPDATE tbl_books set BookName='$bookname',CatId='$catid',AuthorId='$authorid',BookNumber='$booknumber',Status='$status' where BookNumber='$bid'");
            if($query)
            {
                echo "<script>alert('Book Detail Updated.')</script>";
                header('location:manage_books.php');
            }
            else{
                echo "<script>alert('Something went wrong . Please try again.')</script>";    
            } 
        }
    
?>

<!DOCTYPE html>

<html>
<head>
	<title>OLMS | Edit Book</title>
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

		<h3>Edit Book</h3>
		<p><font color="blue">Admin / Books </font>/ Edit Book</p><hr width="80%"/>

	</div>

		<?php 
                $bid=intval($_GET['bn']);
                $query=mysqli_query($con,"SELECT * from  tbl_category INNER JOIN tbl_authors ON tbl_category.CatId = tbl_authors.CatId INNER JOIN tbl_books ON tbl_authors.Id = tbl_books.AuthorId where tbl_books.Status=1 AND tbl_books.BookNumber='$bid'");
              	
                while($row=mysqli_fetch_array($query))
                {
                ?>

	<div>
		<center>
			
			<form method="POST" action="" enctype="multipart/form-data" name="category">
				
				<table>
					
					<tr>
						<td colspan="2"><b><marquee><font size="5">Edit Book</font></marquee></b><hr width="80%">

						</td>

					</tr>

					<tr>
						<td><b>Book Name :</b></td><td> <input type="text" name="bookname" required="" placeholder="Book Name" class="Cinput" value="<?php echo htmlentities($row['BookName']);?>"></td>
					</tr>
						
					<tr>
						
						<td><b>Category :</b></td>
							<td>
	                          <select class="form-control" name="category">
                                  <option value="<?php echo htmlentities($row['CatId']);?>"><?php echo htmlentities($row['CategoryName']);?></option>
                                   <?php

                                  $ret=mysqli_query($con,"SELECT CatId,CategoryName from  tbl_category where Status=1");
                                  while($result=mysqli_fetch_array($ret))
                                    {    
                                    ?>
                                    <option value="<?php echo htmlentities($result['CatId']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
                                    <?php } ?>

                               </select>
                          </td>
					</tr>
					<tr>
						
						<td><b>Author Name :</b></td>
							<td>
	                          <select class="form-control" name="author">
                                  <option value="<?php echo htmlentities($row['AuthorId']);?>"><?php echo htmlentities($row['AuthorName']);?></option>
                                   <?php

                                  $ret=mysqli_query($con,"SELECT Id,AuthorName from  tbl_authors where Status=1");
                                  while($result=mysqli_fetch_array($ret))
                                    {    
                                    ?>
                                    <option value="<?php echo htmlentities($result['Id']);?>"><?php echo htmlentities($result['AuthorName']);?></option>
                                    <?php } ?>

                               </select>
                          </td>
					</tr>
					<tr>
						<td><b>Book Number :</b></td><td> <input type="text" name="booknumber" required="" placeholder="Book Number" class="Cinput" value="<?php echo htmlentities($row['BookNumber']);?>"></td>
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