<?php
    session_start();
    include('includes/connection.php');
    error_reporting(0);
    
    
       
        if($_GET['appid'])
        {
          $id=$_GET['appid'];
          $query=mysqli_query($con,"UPDATE tbl_student set Status='0' where StudentId='$id'");
          echo "<script>alert('Student Unapprove successfully.')</script>";
        }
        if($_GET['action']=='del' && $_GET['rid'])
        {
          $id=$_GET['rid'];
          $query=mysqli_query($con,"DELETE from  tbl_student  where StudentId='$id'");
          echo "<script>alert('Student Delete successfully.')</script>";
        }
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>OLMS | Approve Students</title>

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

				<h4>Manage Approve Students</h4>
				<p><font color="blue">Admin / Reg. Students </font>/ Approve Students</p><hr width="100%"/>

			</div>
			
	
			<div class="table-responsive">

                <table class="table m-0 table-colored-bordered table-bordered-primary">
                    <thead>
                     <tr>
                        <th>#</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                         <th>Branch</th>
                        <th>Semester</th>
                        <th>Gender</th>
                        <th>Email Id</th>
                        <th>Mobile Number</th>
                        <th>Reg. Date</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $query=mysqli_query($con,"SELECT * from tbl_student where Status=1");
                        $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>

                        <tr>
                            <th><?php echo htmlentities($cnt);?></th>
                            <td><?php echo htmlentities($row['StudentId']);?></td>
                            <td><?php echo htmlentities($row['FullName']);?></td>
                            <td><?php echo htmlentities($row['Branch']);?></td>
                            <td><?php echo htmlentities($row['Semester']);?></td>
                            <td><?php echo htmlentities($row['Gender']);?></td>
                            <td><?php echo htmlentities($row['EmailId']);?></td>
                            <td><?php echo htmlentities($row['MobileNumber']);?></td>
                             <td><?php echo htmlentities($row['RegDate']);?></td>
                            <td><?php $st=$row['Status'];
                            if($st=='0'):
                              echo "Wating for approval";
                            else:
                              echo "Approved";
                            endif;
                            ?></td>

                            <td><a href="approve_students.php?appid=<?php echo htmlentities($row['StudentId']);?>"><i style="color: #29b6f6;">Unapprove</i></a> 
                          		&nbsp;<a href="approve_students.php?rid=<?php echo htmlentities($row['StudentId']);?>&&action=del"><i style="color: #f05050">Delete</i></a> </td>
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
