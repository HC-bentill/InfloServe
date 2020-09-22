<?php
include('includes/top.php');
include('../connect.php');

session_start();
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

$projectsSql ="SELECT * FROM projects ORDER BY id DESC";
$projectss = $con->query($projectsSql);

//page permission
$Admin = "1";
$User = "2";
$sqlAdmin = (" SELECT * FROM user where user_name ='".$_SESSION['user']."' AND role = '$Admin' ");
$number = 0;
$result_Admin = mysqli_query($con,$sqlAdmin);
if(mysqli_num_rows($result_Admin)==1){
	   
}else{
	 echo "<script>alert('You do not have permission to access this page')</script>";
	 echo "<script type='text/javascript'>window.top.location='welcome.php';</script>"; exit;
}
?>

<body>

<div class="container-fluid">
	<div class="row text-center">
    	<div class="col-md-12">
<img src="images/bg-header.jpg" class="img-fluid header_img">	
        </div>	
    </div><!-- end of row-->

	<div class="row" id="row2">
<div class="col-md-9 bg_all">
    
<table class="table table-responsive table-striped table-bordered" id="table-responsive">
  <thead id="t_head">
    <tr>
      <!--<th scope="col">ID</th>-->
      <th scope="col">Client Name</th>
      <th scope="col">Name of Org</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Progress</th>
      <th scope="col">Description</th>
      <th scope="col">Ref #</th>
      <th scope="col">Date Created (Y-M-D)</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php while($projects = mysqli_fetch_assoc($projectss)) : ?>
    <tr align = "">
        <td><?= $projects['client_name'];?></td>
        <td><?= $projects['org_name'];?></td>
        <td><?= $projects['phone'];?></td>
        <td><?= $projects['email'];?></td>
        <td><?= $projects['address'];?></td>
        <td><?= $projects['progress'];?></td>
        <td><?= $projects['description'];?></td>
        <td><?= $projects['ref_number'];?></td>
        <td><?= $projects['date_created'];?></td>
        <td><a href="edit_project.php?edit_project=<?= $projects['id'];?>"><i class="fa fa-pencil fa" title="edit"></i></a>
        <a href="projects.php?delete=<?= $projects['id'];?>" onClick="return checkDelete()"><i class="fa fa-remove fa" title="delete"</i></a></td>
    </tr>
 <?php endwhile;?>
  </tbody>
</table>
    
    
</div>

<div class="col-md-3 right_col" style="height: 518px;">
	<ul class="list-unstyled nav_list">
<?php
include('includes/nav.php');
?>
    </ul>
</div>
	</div><!-- end of row-->
</div><!-- end of container-->
    
<?php
include('includes/bottom.php');
?>
   