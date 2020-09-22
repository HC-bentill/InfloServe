<?php
include('../connect.php');
if(isset($_REQUEST['delete_media'])){
    $delid = $_REQUEST['delete_media'];
    $delete_query = mysqli_query($con,"SELECT * from posts where post_id='$delid'");
    //$run_delete = mysqli_fetch_array($con,$delete_query);
	$image = $delete_query['description_image'];
	unlink("../images/uploads/".$image);
    if($run_delete){
       echo "<script>alert('Media has been deleted!')</script>";
	   echo "<script>window.open('view_media.php?view_media','_self')</script>";
    }
}



/*$res = mysqli_query($con, "SELECT * FROM posts WHERE post_id = '$delete_id'");
	while($row = mysqli_fetch_array($res)){
		$img = $row['description_image'];	
	}
	unlink($img);*/
?>