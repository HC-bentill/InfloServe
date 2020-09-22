<?php
include('../connect.php');
if(isset($_GET['delete_user'])){
    $delete_id = $_GET['delete_user'];
    $delete_user = "delete from user where user_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete_user);
    if($run_delete){
       echo "<script>alert('User deleted!')</script>";
	   echo "<script>window.open('view_users.php','_self')</script>";
    }
}
?>