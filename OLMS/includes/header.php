
<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Header</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<style type="text/css">
	.logout{
			text-align:right;
			font-size:25px;
			text-decoration: none;
		}
</style>
<body>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<div class="logout" style="float: right;">
		<a href="logout.php" class="btn btn-outline-dark btn-block" id="text">Logout</a>
	</div>
	<div style="float: right; margin-right: 5px ">
		<a href="uchange_password.php" class="btn btn-outline-dark btn-block" id="text">Change Password</a>
	</div>
	<div style="width: 10%; margin: 5px;">
		<a href="dashboard.php" class="btn btn-outline-dark btn-block" id="text">Go Back</a>
	</div>
	
	<!-- Image and text -->
<nav class="navbar navbar-light bg-light">

<div>
  <a class="navbar-brand" href="dashboard.php">
    <img src="images/a.png" width="350" height="70" class="d-inline-block align-top" alt="">
  </a>
</div>
<div>
	<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
</nav>
</body>
</html>