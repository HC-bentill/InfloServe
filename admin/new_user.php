<?php
session_start();
include('includes/top.php');
include('../connect.php');

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

if(isset($_POST['sign_up'])){
$count = 0;
$res = mysqli_query($con,"SELECT * FROM user WHERE user_name ='$_POST[user_name]'");
$count = mysqli_num_rows($res);

if($count>0){
	echo "<script>alert('User name already exists choose another!')</script>";
}
else{

        $first_name = mysqli_real_escape_string($con,$_POST['first_name']);
		$last_name = mysqli_real_escape_string($con,$_POST['last_name']);
		$user_name = mysqli_real_escape_string($con,$_POST['user_name']);
		$user_pass = mysqli_real_escape_string($con,$_POST['user_pass']);
		$user_pass = md5($user_pass);
		//$user_date = $_POST['user_date'];
		$role = $_POST['role'];
		
		if (strlen($user_pass) < 6){
	echo "<script>alert('Password should be more than 6 characters.')</script>";	
		}else {
		
        $insert_user = "insert into user (first_name,last_name,user_name,user_pass,user_date,role) values ('$first_name', '$last_name', '$user_name', '$user_pass', now(), '$role')";
		
        $run_user = mysqli_query($con, $insert_user);
        if($run_user){
            echo "<script>alert('New User has been inserted!')</script>";
			echo "<script type='text/javascript'>window.top.location='new_user.php';</script>"; exit;
           }
    }
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
      <label for="name">First Name</label>
      <input type="text" class="form-control" id="inputEmail1" placeholder="First Name" name="first_name" value="<?php echo isset($_POST["first_name"]) ? $_POST["first_name"] : ''; ?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" id="inputPassword2" placeholder="last name" name="last_name" value="<?php echo isset($_POST["last_name"]) ? $_POST["last_name"] : ''; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="user_name">User name <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Username" name="user_name" required value="<?php echo isset($_POST["user_name"]) ? $_POST["user_name"] : ''; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword5">Password <span class="text-danger">*</span></label>
      <input type="password" class="form-control" id="inputPassword6" placeholder="Password" name="user_pass" required value="<?php echo isset($_POST["user_pass"]) ? $_POST["user_pass"] : ''; ?>">
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="exampleFormControlSelect1">Role <span class="text-danger">*</span></label>
      <?php 
	global $con;
$sql2 = ("select * from role;");
$number = 0;
$result = mysqli_query($con,$sql2);
 
echo '<select class="form-control" id="exampleFormControlSelect1" name="role" required>';
echo '<option value=""></option>';
while ($row = mysqli_fetch_array($result)) 
{
	$role_id = $row['role_id']; 
	$role_name = $row['role'];
	echo "<option value='$role_name'>$role_name</option>";
}
echo '</select>';
	?>
    </div>
  	</div>

  <button type="submit" class="btn btn-primary rounded-0 btn-block" 
  name="sign_up">Sign up</button>
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