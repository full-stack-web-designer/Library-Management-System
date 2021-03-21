<?php
    session_start();
    include('includes/connection.php');
    error_reporting(0);
    
    
        if($_GET['action']=='del' && $_GET['bn'])
        {
          $id=intval($_GET['bn']);
          $query=mysqli_query($con,"UPDATE tbl_books set Status='0' where BookNumber='$id'");
          echo "<script>alert('Book Unapproved.')</script>";
        }
        if($_GET['presid'])
        {
          $id=intval($_GET['presid']);
          $query=mysqli_query($con,"UPDATE tbl_books set Status='1' where BookNumber='$id'");
          echo "<script>alert('Book Approved successfully.')</script>";
        }
        if($_GET['action']=='parmdel' && $_GET['bn'])
        {
          $id=intval($_GET['bn']);
          $query=mysqli_query($con,"DELETE from  tbl_books  where BookNumber='$id'");
          echo "<script>alert('Book deleted.')</script>";
        }
    

?>


<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Manage Books</title>

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

				<h4>Manage Books</h4>
				<p><font color="blue">Admin / Books </font>/ Manage Books</p><hr width="100%"/>

			</div>
			
			<div>
			
				<a href="add_book.php">
					<button id="addToTable"><i><b>+ Add</b></i></button>
                </a>

			</div>
      <div class="m-b-30" style="margin-top: 50px">

                <h5><i class="fa fa-trash-o" ></i> Approve Books</h5>

      </div>

			<div class="table-responsive">

                <table class="table m-0 table-colored-bordered table-bordered-primary">
                    <thead>
                     <tr>
                        <th>Book Name</th>
                        <th>Category</th>
                        <th>Author Name</th>
                        <th>Book Number</th>
                        <th>Posting Date</th>
                        <th>Last updation Date</th>
                        <th>Action</th>
                     </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $query=mysqli_query($con,"SELECT * from  tbl_category INNER JOIN tbl_authors ON tbl_authors.CatId = tbl_category.CatId INNER JOIN tbl_books ON tbl_books.AuthorId = tbl_authors.Id where tbl_books.Status=1");
                  
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>

                        <tr>
                        
                            <td><?php echo htmlentities($row['BookName']);?></td>
                            <td><?php echo htmlentities($row['CategoryName']);?></td>
                            <td><?php echo htmlentities($row['AuthorName']);?></td>
                            <td><?php echo htmlentities($row['BookNumber']);?></td>
                            <td><?php echo htmlentities($row['RegDate']);?></td>
                            <td><?php echo htmlentities($row['UpdateDate']);?></td>
                            <td><a href="edit_book.php?bn=<?php echo htmlentities($row['BookNumber']);?>"><i class="fa fa-pencil" style="color: #29b6f6;">Edit</i></a> 
                            &nbsp;<a href="manage_books.php?bn=<?php echo htmlentities($row['BookNumber']);?>&&action=del" onclick="return confirm('Do you realy want to Unapproved ?')"> <i class="fa fa-trash-o" style="color: #f05050">Unapprove</i></a> </td>
         
                        </tr>
                        <?php
                       
                        } ?>
                    </tbody>
                                                  
                </table>

        	</div>
          <div class="m-b-30" style="margin-top: 50px">

                <h5><i class="fa fa-trash-o" ></i> Unapprove Books</h5>

            </div>

            <div class="table-responsive">

                <table class="table m-0 table-colored-bordered table-bordered-danger">
                    <thead>
                        <tr>
                         <th>Book Name</th>
                        <th>Category</th>
                        <th>Author Name</th>
                        <th>Book Number</th>
                        <th>Posting Date</th>
                        <th>Last Updation Date</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         $query=mysqli_query($con,"SELECT * from  tbl_category INNER JOIN tbl_authors ON tbl_authors.CatId = tbl_category.CatId INNER JOIN tbl_books ON tbl_books.AuthorId = tbl_authors.Id where tbl_books.Status=0");
                        
                          while($row=mysqli_fetch_array($query))
                          {
                        ?>

                        <tr>
                           
                           <td><?php echo htmlentities($row['BookName']);?></td>
                            <td><?php echo htmlentities($row['CategoryName']);?></td>
                            <td><?php echo htmlentities($row['AuthorName']);?></td>
                           <td><?php echo htmlentities($row['BookNumber']);?></td>
                           <td><?php echo htmlentities($row['RegDate']);?></td>
                           <td><?php echo htmlentities($row['UpdateDate']);?></td>
                            <td><a href="manage_books.php?presid=<?php echo htmlentities($row['BookNumber']);?>"><i class="fa fa-pencil" style="color: #29b6f6;">Approve</i></a> 
                            &nbsp;<a href="manage_books.php?bn=<?php echo htmlentities($row['BookNumber']);?>&&action=parmdel" onclick="return confirm('Do you realy want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050">Delete</i></a> </td>
         
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
