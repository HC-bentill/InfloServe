<?php
include('../connect.php');

if(isset($_GET['delete_com'])){
    $delete_id = $_GET['delete_com'];
    $delete_com = "delete from comments where com_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete_com);
    if($run_delete){
       echo "<script>alert('Comment deleted!')</script>";
	   echo "<script>window.open('view_comments.php','_self')</script>";
    }
}
?>