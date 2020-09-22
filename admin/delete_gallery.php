<?php
include('../connect.php');
if($_GET['op'] == "delete")
{
	$delete_img = $_GET['title_image'];
	$query = "DELETE FROM gallery_category WHERE title_image = '$delete_img'";
	$result = mysqli_query($con,$query);
	if($result){
		?>
	<script>	
		alert('Image Deleted');
		window.location.href='gallery-album.php?deleted';
	</script>	
    
    <?php
	unlink("images/uploads/gallery/$delete_img");
	}	
}





?>