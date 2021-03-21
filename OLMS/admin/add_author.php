<?php
    session_start();
    include('includes/connection.php');
    error_reporting(0);
        if(isset($_POST['submit']))
        {
        	 $categoryid=$_POST['category'];
            $authorname=$_POST['authorname'];
      		$status=1;
            $query=mysqli_query($con,"INSERT INTO tbl_authors(CatId,AuthorName,Status) VALUES('$categoryid','$authorname',$status)");
            if($query)
            {
                echo "<script>alert('Add Authorname successfully.')</script>";
            }
            else{
                echo "<script>alert('Something went wrong . Please try again.')</script>";  
            } 
        }
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Add Author</title>

	<style type="text/css">


		
.hadding h3{
		margin-left: 180px;

}
.hadding p{
		text-align: right;
		margin-right: 180px;
}

.form{
	border:2px solid blue;
	border-radius: 10px;
	height: 400px;
	width: 500px;
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
	width: 100%;
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
		
			
		<div class="subaddcategory">

			<div class="hadding">

				<h3>Add Author</h3>
				<p><font color="blue">Admin / Author </font>/ Add Author</p><hr width="80%"/>

			</div>
			
			<div>
				<center>
				<form method="POST" action="add_author.php" class="form">
					<table>
						<tr>
							<td colspan="2"><b><marquee><font size="5">Add Author</font></marquee></b><hr width="80%">

							</td>

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
							 <td><b>Author Name :</b></td><td> <input type="text" name="authorname" required="" placeholder="Author Name" class="Cinput"></td>
						</tr>
						<tr>
							<td><button type="submit" name="submit" class="btn1">Submit</button></td>
						</tr>
					</table>
				</form>
				</center>

			</div>
		</div>


</div>
</body>
</html>
