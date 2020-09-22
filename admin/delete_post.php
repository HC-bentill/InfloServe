<?php
include('../connect.php');
if(isset($_GET['delete_post'])){

    $delete_id = $_GET['delete_post'];
	
	/*$res = mysqli_query($con, "SELECT * FROM posts WHERE post_id = '$delete_id'");
	while($row = mysqli_fetch_array($res)){
		$img = $row['description_image'];	
	}
	unlink($img);*/
	
    //$delete_posts = "delete from posts where post_id='$delete_id'";
    $delete_posts = "UPDATE posts SET deleted='1' where post_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete_posts);
    if($run_delete){
       /*echo "<script>alert('Post deleted!')</script>";*/
	   echo "<script>window.open('view_posts.php','_self')</script>";
    }
}
?>