<?php
include('includes/top.php');
include('../connect.php');

session_start();
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

		
if(isset($_POST['updatepassword'])){
		
		$oldpassword = mysqli_real_escape_string($con,$_POST['oldpassword']);
		$oldpassword = md5($oldpassword);
		$newpassword = md5($_POST['newpassword']);
		$confirm = md5($_POST['confirm']);
		
		/*$oldpassword = md5($_POST['oldpassword']);
		$newpassword = md5($_POST['newpassword']);
		$confirm = $_POST['confirm'];*/
		
		//check password against db
		
		
		$queryget = mysqli_query($con,"SELECT user_pass FROM user WHERE user_name = '".$_SESSION['user']."' ");
		$row = mysqli_fetch_assoc ($queryget); 
		$oldpassworddb = $row['user_pass'];
		
		//check passwords
		if ($oldpassword == $oldpassworddb){
				//check two new passwords
				if($newpassword == $confirm){
					if (strlen($newpassword) < 6){
	echo "<script>alert('New Password should be more than 6 characters.')</script>";	
	echo "<script type='text/javascript'>window.top.location='changepassword.php';</script>"; exit;
		}
		if($newpassword == $oldpassword){
			echo "<script>alert('New Password cannot be the same as Old Password')</script>";
			echo "<script type='text/javascript'>window.top.location='changepassword.php';</script>"; exit;
		}
		else{
					//change password in db
					$querychange = mysqli_query($con,"UPDATE user SET user_pass = '$newpassword' WHERE user_name = '".$_SESSION[		                    'user']."'");
					session_destroy();
					die("Password Succesfully Changed. <a href='index.php' style='color:white;'>Login With New Password</a>");
				}}
				else {
						echo "<script>alert('New Password doesnt match')</script>";
						echo "<script type='text/javascript'>window.top.location='changepassword.php';</script>"; exit;
					 }
		}
		else{
			echo "<script>alert('Old Password doesnt match')</script>"; '<br>';
			echo "<script type='text/javascript'>window.top.location='changepassword.php';</script>"; exit;
		}
		}
?>

