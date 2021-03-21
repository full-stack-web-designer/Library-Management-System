
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
                $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                $query=mysqli_query($con,"INSERT INTO tbl_books(BookName,CatId,AuthorId,BookNumber,Status) VALUES('$bookname','$catid','$authorid','$booknumber','$status')");
                if($query)
                {
                    echo "<script>alert('Book successfully added.')</script>";
                }
                else{
                    echo "<script>alert('Something went wrong . Please try again.')</script>";    
                } 

            
        }
        
    
?>

<!DOCTYPE html>

<html>
<head>
	<title>OLMS | Add Books</title>
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

		<h3>Add Books</h3>
		<p><font color="blue">Admin / Books </font>/ Add Book</p><hr width="80%"/>

	</div>

	<div>
		<center>
			
			<form method="POST" action="" enctype="multipart/form-data" name="category" class="form">
				
				<table>
					
					<tr>
						<td colspan="2"><b><marquee><font size="5">Add Book</font></marquee></b><hr width="80%">

						</td>

					</tr>

					<tr>
						<td><b>Book Name:</b></td><td> <input type="text" name="bookname" required="" placeholder="Book Name" class="Cinput"></td>
					</tr>
						
					<tr>
						
						<td><b>Category :</b></td>
							<td>
	                          <select class="form-control" name="category" required>

                               <option value="">Select Category </option>

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
	                          <select class="form-control" name="author" required>

                               <option value="">Select Author </option>

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
						<td><b>ISBN:</b></td><td> <input type="text" name="booknumber" required="" placeholder="Book Number" class="Cinput"><p><font size="2">An ISBN is an International Standard Book Number.ISBN Must be unique</font></p></td>
					</tr>
					<tr>
						<td colspan="2"><button type="submit" name="submit" value="Upload Image/Data" class="btn1">Add Book</button></td>
					</tr>
				</table>
			</form>
		</center>

	</div>


</div>


</body>
</html>