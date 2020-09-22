<?php
include('includes/top.php');
include('../connect.php');

session_start();
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

//page permission
$Admin = "Admin";
$User = "User";
$sqlAdmin = (" SELECT * FROM user WHERE user_name = '".$_SESSION['user']."' AND role = '$Admin' ");
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
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Password</th>
      <th scope="col">Date Created (Y-M-D)</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
    include('../connect.php');
    $get_user = "select * from user ORDER BY user_id DESC";
    $run_user = mysqli_query($con, $get_user);
    $i = 0;
    while($row_user=mysqli_fetch_array($run_user)){
        $user_id = $row_user['user_id'];
        $first_name = $row_user['first_name'];
		$last_name = $row_user['last_name'];
		$user_name = $row_user['user_name'];
		$user_pass = $row_user['user_pass'];
		$user_date = $row_user['user_date'];
		$role = $row_user['role'];
        $i++;
		
		/*$role_name = $row_user['role'];
		$showrole ="select * from role where role_id = '$role_name'";
		$show_result = $con->query($showrole);
		$role = mysqli_fetch_assoc($show_result);
		$rolee = $role['role'];*/
    ?>
    <tr align = "">
        
        <td><?php echo $first_name; ?></td>
        <td><?php echo $last_name; ?></td>
        <td><?php echo $user_name; ?></td>
        <td>******</td>
        <td><?= date('M d Y',strtotime($user_date));?></td>
        <td><?php echo $role;?></td>
        <td><a href="edit_user.php?edit_user=<?php echo $user_id; ?>" class="btn btn-primary btn-sm" style="padding:5px;"><i class="fa fa-pencil-square-o" title="edit"></i></a>
        <a href="delete_user.php?delete_user=<?php echo $user_id;?>" onClick="return checkDelete()" class="btn btn-danger btn-sm" style="padding:5px;"><i class="fa fa-trash" title="delete"></i></a></td>
    </tr>
    <?php } ?>
    </tr>
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