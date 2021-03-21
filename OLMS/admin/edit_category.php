<?php
    session_start();
    include('includes/connection.php');
  	error_reporting(0);
   
        if(isset($_POST['submit']))
        {
            $catid=intval($_GET['cid']);
            $category=$_POST['Categoryname'];
            $query=mysqli_query($con,"UPDATE  tbl_category set CategoryName='$category' where CatId='$catid'");
            if($query)
      {
                echo "<script>alert('Category Updated.')  
                </script>";
                header('location:manage_category.php');
            }
            else{
                echo "<script>alert('Something went wrong . Please try again.')</script>";      
            } 
        }
    
?>



<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Edit Category</title>

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

				<h3>Edit Category</h3>
				<p><font color="blue">Admin / Category </font>/ Edit Category</p><hr width="80%"/>

			</div>


				<?php 
                                $catid=intval($_GET['cid']);
                                $query=mysqli_query($con,"SELECT * from  tbl_category where Status=1 and CatId='$catid'");
                                $cnt=1;
                                while($row=mysqli_fetch_array($query))
                                {
                                ?>

			
			<div>

				<center>
				<form method="POST" name="category">

					<table>
						<tr>
							<td colspan="2"><b><marquee><font size="5">Edit Category</font></marquee></b><hr width="80%">

							</td>

						</tr>
						<tr>
							<td>

							 	<b>Category :</b></td><td> <input type="text" name="Categoryname" required="" placeholder="Category Name" class="Cinput" value="<?php echo htmlentities($row['CategoryName']);?>"></td>
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
