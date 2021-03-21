<?php
    session_start();
    include('includes/connection.php');
    error_reporting(0);
    
    
        if($_GET['action']=='del' && $_GET['bid'])
        {
          $id=intval($_GET['bid']);
          $query=mysqli_query($con,"UPDATE tbl_issuedbookdetails set ReturnStatus='0' where BookId='$id'");
          echo "<script>alert('Book Unapproved.')</script>";
        }
        if($_GET['presid'])
        {
          $id=intval($_GET['presid']);
          $query=mysqli_query($con,"UPDATE tbl_issuedbookdetails set ReturnStatus='1' where BookId='$id'");
          echo "<script>alert('Book Approved successfully.')</script>";
        }
        if($_GET['action']=='parmdel' && $_GET['bid'])
        {
          $id=intval($_GET['bid']);
          $query=mysqli_query($con,"DELETE from  tbl_issuedbookdetails  where BookId='$id'");
          echo "<script>alert('Book deleted.')</script>";
        }
    

?>


<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Manage Issued Books</title>

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

				<h4>Manage Issued Books</h4>
				<p><font color="blue">Admin / Issue Books </font>/ Manage Issued Books</p><hr width="100%"/>

			</div>
			
			<div>
			
				<a href="issue_newbook.php">
					<button id="addToTable"><i><b>+ Add</b></i></button>
                </a>

			</div>
      <div class="m-b-30" style="margin-top: 50px">

                <h5><i class="fa fa-trash-o" ></i> Approve Issued Books</h5>

      </div>

			<div class="table-responsive">

                <table class="table m-0 table-colored-bordered table-bordered-primary">
                    <thead>
                     <tr>
                        <th>Student Name</th>
                        <th>Book Name</th>
                        <th>Book Number</th>
                        <th>Issued Date</th>
                        <th>Return Date</th>
                        <th>Last Updation Date</th>
                        <th>Fine</th>
                        <th>Action</th>
                     </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $query=mysqli_query($con,"SELECT * from  tbl_books INNER JOIN tbl_issuedbookdetails ON tbl_issuedbookdetails.BookId = tbl_books.BookNumber INNER JOIN tbl_student ON tbl_student.StudentId = tbl_issuedbookdetails.StudentId where tbl_issuedbookdetails.ReturnStatus=1");
                  
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>

                        <tr>
                        
                            <td><?php echo htmlentities($row['FullName']);?></td>
                            <td><?php echo htmlentities($row['BookName']);?></td>
                            <td><?php echo htmlentities($row['BookNumber']);?></td>
                            <td><?php echo htmlentities($row['IssuedDate']);?></td>
                            <td><?php echo htmlentities($row['ReturnDate']);?></td>
                            <td><?php echo htmlentities($row['LastUpdate']);?></td>
                            <td><?php echo htmlentities($row['Fine']);?></td>

                            <td><a href="edit_issued_books.php?isid=<?php echo htmlentities($row['BookId']);?>"><i class="fa fa-pencil" style="color: #29b6f6;">Edit</i></a> 
                            &nbsp;<a href="manage_issued_books.php?bid=<?php echo htmlentities($row['BookId']);?>&&action=del" onclick="return confirm('Do you realy want to Unapproved ?')"> <i class="fa fa-trash-o" style="color: #f05050">Unapprove</i></a> </td>
         
                        </tr>
                        <?php
                       
                        } ?>
                    </tbody>
                                                  
                </table>

        	</div>
          <div class="m-b-30" style="margin-top: 50px">

                <h5><i class="fa fa-trash-o" ></i> Unapprove Issued Books</h5>

            </div>

            <div class="table-responsive">

                <table class="table m-0 table-colored-bordered table-bordered-danger">
                    <thead>
                        <tr>
                         <th>Student Name</th>
                        <th>Book Name</th>
                        <th>Book Number</th>
                        <th>Issued Date</th>
                        <th>Return Date</th>
                        <th>Last Updation Date</th>
                        <th>Fine</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         $query=mysqli_query($con,"SELECT * from  tbl_books INNER JOIN tbl_issuedbookdetails ON tbl_issuedbookdetails.BookId = tbl_books.BookNumber INNER JOIN tbl_student ON tbl_student.StudentId = tbl_issuedbookdetails.StudentId where tbl_issuedbookdetails.ReturnStatus=0");
                  
                          while($row=mysqli_fetch_array($query))
                          {
                        ?>

                        <tr>
                           
                           <td><?php echo htmlentities($row['FullName']);?></td>
                            <td><?php echo htmlentities($row['BookName']);?></td>
                            <td><?php echo htmlentities($row['BookNumber']);?></td>
                            <td><?php echo htmlentities($row['IssuedDate']);?></td>
                            <td><?php echo htmlentities($row['ReturnDate']);?></td>
                            <td><?php echo htmlentities($row['LastUpdate']);?></td>
                            <td><?php echo htmlentities($row['Fine']);?></td>

                             <td><a href="manage_issued_books.php?presid=<?php echo htmlentities($row['BookId']);?>"><i class="fa fa-pencil" style="color: #29b6f6;">Approve</i></a> 
                            &nbsp;<a href="manage_issued_books.php?bid=<?php echo htmlentities($row['BookId']);?>&&action=parmdel" onclick="return confirm('Do you realy want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050">Delete</i></a> </td>
         
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
