<?php
include('includes/top.php');
include('../connect.php');
session_start();
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

if(isset($_GET['edit_user'])){
	$user_id = $_GET['edit_user']; 
	$get_user = "select * from user where user_id='$user_id'";
	$run_user = mysqli_query($con, $get_user); 
	$row_user = mysqli_fetch_array($run_user); 
	$user_id = $row_user['user_id'];
	$first_name = $row_user['first_name'];
	$last_name = $row_user['last_name'];
	$user_name = $row_user['user_name'];
	//$user_pass = $row_user['user_pass'];
	$role = $row_user['role'];
}
?>

<?php 
	if(isset($_POST['update_user'])){
	$update_id = $user_id;
	$first_name = mysqli_real_escape_string($con,$_POST['first_name']);
	$last_name = mysqli_real_escape_string($con,$_POST['last_name']);
	$user_name = mysqli_real_escape_string($con,$_POST['user_name']);
	//$user_pass = $_POST['user_pass'];
	$role = $_POST['role'];
	
	$update_user = "update user set first_name='$first_name', last_name='$last_name',user_name='$user_name', role='$role' where user_id='$update_id'";
	$run_user = mysqli_query($con, $update_user); 
	if($run_user){

	   echo "<script>alert(' User has been updated!')</script>";
	   echo "<script type='text/javascript'>window.top.location='view_users.php';</script>"; exit;
	   }
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
    
<form method="post" action="" id="post_form">
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" class="form-control" id="inputEmail1" name="first_name"  value="<?php echo $first_name;?>"/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>
      <input type="text" class="form-control" id="inputPassword2" name="last_name" value="<?php echo $last_name;?>"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail3">User name</label>
      <input type="text" class="form-control" id="inputEmail4" name="user_name" value="<?php echo $user_name;?>"/>
    </div>
    <div class="form-group col-md-6">
      <label for="exampleFormControlSelect1">Role</label>
    <?php 
	global $con;
$sql2 = ("select * from role;");
$number = 0;
$result = mysqli_query($con,$sql2);

echo '<select class="form-control" id="exampleFormControlSelect1" name="role">';
echo '<option value=""></option>';

while ($row = mysqli_fetch_array($result))
{
	$role_id = $row['role_id']; 
	$role_name = $row['role']; ?>

	<option value="<?=$role_name?>" <?=($role==$role_name)?'selected':''?> ><?=$role_name?></option>
<?php }
echo '</select>';
	?>
    </div>
  </div>
  

  <button type="submit" class="btn btn-primary rounded-0 " name="update_user">Update User</button>
  <a href="view_users.php" class="btn btn-primary rounded-0">Cancel</a>
</form>    
    
    
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