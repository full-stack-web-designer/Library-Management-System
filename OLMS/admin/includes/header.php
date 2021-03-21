<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Header Page</title>

		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
       	<link href="css/core.css" rel="stylesheet" type="text/css" />
       	 <link href="css/components.css" rel="stylesheet" type="text/css" />

	<style type="text/css">
		
		.logo{

			height: 50px;
			width: 300px;
			padding: 10px;
		}
		
		.menudropdown{
			width: 100%;
			height: 100px;
			margin: 0px auto;
		}
		.menudropdown ul{
			padding: 0px;
		}
		.menudropdown ul li{
			float:left;
			background-color: black;
			color: white;
			width:185px;
			height: 50px;
			line-height: 50px;
			font-size: 20px;
			text-align: center;
			list-style: none;
			opacity: 0.8;
		}
		.menudropdown ul li ul{
			display: none;
		}
		.menudropdown ul li:hover > ul{
			display: block;
		}
		.menudropdown ul li:hover{
			background-color: lightgreen;
			
		}
	</style>
</head>
<body>
		<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<div style="margin-top: 10px;">
	<div class="logout" style="float: right;">
		<a href="logout.php" class="btn btn-outline-dark btn-block" id="text">Logout</a>
	</div>
	<div style="float: right; margin-right: 5px;">
		<a href="achange_password.php" class="btn btn-outline-dark btn-block" id="text">Change Password</a>
	</div>
	<div style="float: right; margin-right: 5px;">
		<a href="create_account.php" class="btn btn-outline-dark btn-block" id="text">Create Account</a>
	</div>
	<div style="float: right; margin-right: 5px;">
		<a href="admin_profile.php" class="btn btn-outline-dark btn-block" id="text">Admin Profile</a>
	</div>
	<div style="width: 10%;">
		<a href="dashboard.php" class="btn btn-outline-dark btn-block" id="text">Go Back</a>
	</div>
	<div class="abc" style="margin-top: 5px;">
	<!-- Image and text -->
		<nav class="navbar navbar-light bg-light">
			<div>
  			<a class="navbar-brand" href="#">
    		<img src="includes/a.png" width="350" height="70" class="d-inline-block align-top" alt="">
  			</a>
			</div>
			<div>
			<form class="form-inline my-2 my-lg-0">
      		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    		</form>
			</div>
		</nav>
	</div>
		<div class="menudropdown" style="margin-top:">
			<ul>
				<li>Category
					<ul>
						<a href="add_category.php"><li>Add Category</li></a>
						<a href="manage_category.php"><li>Manage Category</li></a>
					</ul>
				</li>
				<li>Authors
					<ul>
						<a href="add_author.php"><li>Add Author</li></a>
						<a href="manage_author.php"><li>Manage Author</li></a>
					</ul>
				</li>
				<li>Books
					<ul>
						<a href="add_book.php"><li>Add Book</li></a>
						<a href="manage_books.php"><li>Manage Book</li></a>
					</ul>
				</li>
				<li>Issue Books
					<ul>
						<a href="issue_newbook.php"><li>Issue New Book</li></a>
						<a href="manage_issued_books.php"><li>Manage Issued Books</li></a>
					</ul>
				</li>
				<li>Reg. Students
					<ul>
						<a href="unapprove_students.php"><li>Un Approve Students</li></a>
						<a href="approve_students.php"><li>Approved Students</li></a>
					</ul>
				</li>
				<li>Comments
					<ul>
						<a href="unapprove_comments.php"><li>Un Approve Comments</li></a>
						<a href="approve_comments.php"><li>Approved Comments</li></a>
					</ul>
				</li>
			</ul>
		</div>
		
</div>		

</body>
</html>