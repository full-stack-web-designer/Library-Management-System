<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Header Page</title>

		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
       	<link href="css/core.css" rel="stylesheet" type="text/css" />
       	 <link href="css/components.css" rel="stylesheet" type="text/css" />

	<style type="text/css">

		.header{
			background-color: white;
			border:2px solid green;
			margin-top: 20px;
			height: 70px;
			width: 100%;
			opacity: 0.7;
		}
		.logo{

			height: 50px;
			width: 300px;
			padding: 10px;
		}
		.logout{
			text-align:right;
			font-size:25px;
			margin-bottom:-20px;
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
			width:222px;
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
	<div class="containner">
						<div class="logout">
							<a href="logout.php" id="text">Logout</a>
						</div>
		
		<div class="header">
			
				<div class="logo">
						<a href="dashboard.php"><img src="includes/a.png" height="50px" width="300px"></a>
						
				</div>
						
		</div>
		<div class="menudropdown">
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
			</ul>
		</div>
		
		
	</div>
</body>
</html>