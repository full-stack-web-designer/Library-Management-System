<?php
    session_start();
    include('includes/connection.php');
    error_reporting(0);
    
    
        if($_GET['action']=='del' && $_GET['rid'])
        {
          $id=intval($_GET['rid']);
          $query=mysqli_query($con,"UPDATE tbl_authors set Status='0' where Id='$id'");
          echo "<script>alert('Author Name Unapproved.')</script>";
        }
        if($_GET['resid'])
        {
          $id=intval($_GET['resid']);
          $query=mysqli_query($con,"UPDATE tbl_authors set Status='1' where Id='$id'");
          echo "<script>alert('Author Name Approved successfully.')</script>";
        }
        if($_GET['action']=='parmdel' && $_GET['rid'])
        {
          $id=intval($_GET['rid']);
          $query=mysqli_query($con,"DELETE from  tbl_authors  where Id='$id'");
          echo "<script>alert('Author Name deleted.')</script>";
        }
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Manage Authors</title>

	<style type="text/css">

	
.hadding h3{
		margin-left: 180px;

}
.hadding p{
		text-align: right;
		margin-right: 30px;
}

#addToTable{
	margin-left: 20px;
	padding: 5px;
	width: 100px;
	border:1px solid blue;
	border-radius: 5px;
	margin-bottom: 20px;
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

				<h4>Manage Authors</h4>
				<p><font color="blue">Admin / Author </font>/ Manage Authors</p><hr width="100%"/>

			</div>
			
			<div>
			
				<a href="add_author.php">
					<button id="addToTable"><i><b>+ Add</b></i></button>
                </a>

			</div>
      <div class="m-b-30" style="margin-top: 50px">

                <h5><i class="fa fa-trash-o" ></i> Approve Author Name</h5>

        </div>

			<div class="table-responsive">

                <table class="table m-0 table-colored-bordered table-bordered-primary">
                    <thead>
                     <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Author Name</th>
                        <th>Posting Date</th>
                        <th>Last updation Date</th>
                        <th>Action</th>
                     </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $query=mysqli_query($con,"SELECT * from tbl_category INNER JOIN tbl_authors ON tbl_category.CatId = tbl_authors.CatId where tbl_authors.Status=1");
                        $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>

                        <tr>
                            <th><?php echo htmlentities($cnt);?></th>
                            <td><?php echo htmlentities($row['CategoryName']);?></td>
                            <td><?php echo htmlentities($row['AuthorName']);?></td>
                            <td><?php echo htmlentities($row['CreateDate']);?></td>
                            <td><?php echo htmlentities($row['UpdateDate']);?></td>
                            <td><a href="edit_author.php?aid=<?php echo htmlentities($row['Id']);?>"><i style="color: #29b6f6;">Edit</i></a> 
                          		&nbsp;<a href="manage_author.php?rid=<?php echo htmlentities($row['Id']);?>&&action=del"><i style="color: #f05050">Unapprove</i></a> </td>
                        </tr>
                        <?php
                        $cnt++;
                        } ?>
                    </tbody>
                                                  
                </table>

        	</div>

        	<div class="m-b-30" style="margin-top: 50px">

                <h5><i class="fa fa-trash-o" ></i> Unapprove Author Name</h5>

            </div>

            <div class="table-responsive">

                <table class="table m-0 table-colored-bordered table-bordered-danger">
                    <thead>
                        <tr>
                         <th>#</th>
                         <th>Category</th>
                         <th>Author Name</th>
                         <th>Posting Date</th>
                         <th>Last updation Date</th>
                         <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         $query=mysqli_query($con,"SELECT * from tbl_category INNER JOIN tbl_authors ON tbl_category.CatId = tbl_authors.CatId where tbl_authors.Status=0");
                          $cnt=1;
                          while($row=mysqli_fetch_array($query))
                          {
                        ?>

                        <tr>
                           <th scope="row"><?php echo htmlentities($cnt);?></th>
                           <td><?php echo htmlentities($row['CategoryName']);?></td>
                            <td><?php echo htmlentities($row['AuthorName']);?></td>
                      		  <td><?php echo htmlentities($row['CreateDate']);?></td>
                            <td><?php echo htmlentities($row['UpdateDate']);?></td>
                            <td><a href="manage_author.php?resid=<?php echo htmlentities($row['Id']);?>"><i title="Restore this category">Approve</i></a> &nbsp;<a href="manage_author.php?rid=<?php echo htmlentities($row['Id']);?>&&action=parmdel" title="Delete forever"> <i style="color: #f05050">Delete</i> </td>
                        </tr>
                        <?php
                        $cnt++;
                        } ?>
                    </tbody>
                </table>
            </div>


</div>
</body>
</html>
