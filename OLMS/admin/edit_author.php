<?php
    session_start();
    include('includes/connection.php');
  	error_reporting(0);
   
        if(isset($_POST['submit']))
        {
            $aid=intval($_GET['aid']);
            $catid=$_POST['category'];
            $authorname=$_POST['Authorname'];
            $query=mysqli_query($con,"UPDATE  tbl_authors set CatId='$catid', AuthorName='$authorname' where Id='$aid'");
            if($query)
            {
                echo "<script>alert('Author Name Updated.')</script>";
                header('location:manage_author.php');
            }
            else{
                echo "<script>alert('Something went wrong . Please try again.')</script>";      
            } 
        }
    
?>



<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Edit Author Name</title>

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
       	<link href="css/core.css" rel="stylesheet" type="text/css" />

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
	background-color: lightgreen;
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
		
			
		<div class="addcategory">

			<div class="hadding">

				<h3>Edit Author Name</h3>
				<p><font color="blue">Admin / Author </font>/ Edit Author Name</p><hr width="80%"/>

			</div>


				<?php 
                                $aid=intval($_GET['aid']);
                                $query=mysqli_query($con,"SELECT * from tbl_category INNER JOIN tbl_authors ON tbl_category.CatId = tbl_authors.CatId where tbl_authors.Status=1 AND tbl_authors.Id='$aid'");
                                $cnt=1;
                                while($row=mysqli_fetch_array($query))
                                {
                                ?>

			
			<div>

				<center>
				<form method="POST" name="category">

					<table>
						<tr>
							<td colspan="2"><b><marquee><font size="5">Edit Author Name</font></marquee></b><hr width="80%">

							</td>

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
							<td>

							 	<b>Author Name :</b></td><td> <input type="text" name="Authorname" required="" placeholder="Author Name" class="Cinput" value="<?php echo htmlentities($row['AuthorName']);?>"></td>
						</tr>
						<?php } ?>
						<tr>
							<td><button type="submit" name="submit" class="btn1">Update</button></td>
						</tr>
					</table>
					
				</form>
				</center>
			
			</div>

		</div>


</div>
</body>
</html>
