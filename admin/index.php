<?php  
session_start();
	include('includes/top.php');
	include('../connect.php');
	
if(isset($_POST['loginbtn'])){
	
	$user_name = mysqli_real_escape_string($con,$_POST['user_name']);
	$user_pass = mysqli_real_escape_string($con,$_POST['user_pass']);
	$user_pass = md5($user_pass);
	
$result = mysqli_query($con,'SELECT * FROM user WHERE user_name="'.$user_name.'" AND BINARY user_pass="'.$user_pass.'" ');
if(mysqli_num_rows($result)== 1){
	setcookie('user_name',$user_name,time() + (86400 * 7), '/');
	$_SESSION['user'] = $user_name;
	header('Location: welcome.php');
}
else{
	echo "<script>alert('Incorrect username or password!')</script>";
}
	}
?>

<body>

<div class="container">
	<div class="row">
    	<div class="col-md-12">
<form id="index_form" action="index.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required name="user_name" value="<?php echo isset($_POST["user_name"]) ? $_POST["user_name"] : ''; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"></label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required name="user_pass" value="<?php echo isset($_POST["user_pass"]) ? $_POST["user_pass"] : ''; ?>">
  </div>
 <!-- <div class="form-group">
    <label for="exampleInputPassword1"></label>
    <select class="form-control" id="exampleFormControlSelect1" name="role" >
       <option>select role...</option>
      <option>Administrator</option>
      <option>User</option>
    </select>
  </div>-->
  <button type="submit" class="btn btn-primary btn-block" name="loginbtn" style="margin-top:37px;">Login</button>
</form>   	
        </div>
	</div><!-- end of row-->
</div><!-- end of container-->

<script>
    history.pushState(null, null, null);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, null);
    });
</script>

<?php
include('includes/bottom.php');
?>
