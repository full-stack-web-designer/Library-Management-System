<?php
    session_start();
    include('includes/connection.php');
    error_reporting(0);
    
    
       
        if($_GET['appid'])
        {
          $id=$_GET['appid'];
          $query=mysqli_query($con,"UPDATE tbl_feedback set Status='1' where EmailId='$id'");
          echo "<script>alert('Comment Approve successfully.')</script>";
        }
        if($_GET['action']=='del' && $_GET['rid'])
        {
          $id=$_GET['rid'];
          $query=mysqli_query($con,"DELETE from  tbl_feedback  where EmailId='$id'");
          echo "<script>alert('Comment Delete successfully.')</script>";
        }
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Unapprove Comments</title>

	<style type="text/css">

	
.hadding h3{
		margin-left: 180px;

}
.hadding p{
		text-align: right;
		margin-right: 30px;
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

				<h4>Manage Unapprove Comments</h4>
				<p><font color="blue">Admin / Comments </font>/ Unapprove Comments</p><hr width="100%"/>

			</div>
			
	
			<div class="table-responsive">

                <table class="table m-0 table-colored-bordered table-bordered-primary">
                    <thead>
                     <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email Id</th>
                        <th>Comment</th>
                        <th>Create Date</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $query=mysqli_query($con,"SELECT * from tbl_feedback where Status=0");
                        $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>

                        <tr>
                            <th><?php echo htmlentities($cnt);?></th>
                            <td><?php echo htmlentities($row['FullName']);?></td>
                            <td><?php echo htmlentities($row['EmailId']);?></td>
                            <td><?php echo htmlentities($row['Comment']);?></td>
                            <td><?php echo htmlentities($row['CreateDate']);?></td>
                            <td><?php $st=$row['Status'];
                            if($st=='0'):
                              echo "Wating for approval";
                            else:
                              echo "Approved";
                            endif;
                            ?></td>
                           
                            <td><a href="unapprove_comments.php?appid=<?php echo htmlentities($row['EmailId']);?>"><i style="color: #29b6f6;">Approve</i></a> 
                          		&nbsp;<a href="unapprove_comments.php?rid=<?php echo htmlentities($row['EmailId']);?>&&action=del"><i style="color: #f05050">Delete</i></a> </td>
                        </tr>
                        <?php
                        $cnt++;
                        } ?>
                    </tbody>
                                                  
                </table>

        	</div>

        	</div>

</div>
</body>
</html>
