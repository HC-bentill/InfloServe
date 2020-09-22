<?php
include('includes/top.php');
include('../connect.php');
/*require_once('../helpers/helpers.php');*/
session_start();

if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

//page permission
$Admin = "Admin";
$User = "User";
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

<form id="post_form" action="updatepassword.php" method="post">
  <div class="form-group">
    <label for="old password">Old Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Old Password" required name="oldpassword">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password" required name="newpassword">
  </div>
  
  <div class="form-group">
    <label for="confirm">Confirm New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm New Password" required name="confirm">
  </div>
 <!-- <div class="form-group">
    <label for="exampleInputPassword1"></label>
    <select class="form-control" id="exampleFormControlSelect1" name="role" >
       <option>select role...</option>
      <option>Administrator</option>
      <option>User</option>
    </select>
  </div>-->
  <button type="submit" class="btn btn-primary btn-block" name="updatepassword" style="margin-top:37px;">Update Password</button>
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
    