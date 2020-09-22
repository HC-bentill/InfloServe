<?php
session_start();
include('includes/top.php');
include('../connect.php');


if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

if(isset($_GET['edit_gallery'])){
	$title_id = $_GET['edit_gallery']; 
	$get_title = "select * from gallery_category where id='$title_id'";
	$run_title = mysqli_query($con, $get_title); 
	$row_title = mysqli_fetch_array($run_title); 
	
	$title_id = $row_title['id'];
	$cat_name = $row_title['cat_name'];
	$title_image = $row_title['title_image'];
}
?>

<?php 
	if(isset($_POST['update_cat'])){
	$update_id = $title_id;
	$title = $_POST['cat_name'];
	
	//If the previous Image has been changed
	if(isset($_FILES['title_image']) && !empty($_FILES['title_image']['name'])){
		//move the image file to directory
		$editImage = $_FILES['title_image']['name'];
		move_uploaded_file($_FILES['title_image']['tmp_name'],"../images/uploads/gallery/$editImage");
	} else { $editImage = $_POST['previous_image']; }
	
	
	$update_title = "update gallery_category set cat_name='$title',title_image='$editImage' where id='$update_id'";
	$run_post = mysqli_query($con, $update_title); 
	if($run_post){

	   echo "<script>alert(' Title has been updated!')</script>";
	   echo "<script type='text/javascript'>window.top.location='gallery-album.php';</script>"; exit;
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
		<div class="row" style="margin-top:20px;">
        
        <div class="col-md-12" style="border-bottom:1px solid black;">
        <h3 class="add_cat">Edit Title</h3>
<form method="post" action="" id="post_form" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Gallery Title</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Title" name="cat_name" value="<?php echo $cat_name;?>">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Upload File: </label>
    <input type="file" name="title_image" id="title_image"/>
	<input type="text" name="previous_image" value="<?php echo $title_image;?>" style="display:none"/>
  </div>  

  
  <button type="submit" class="btn btn-primary rounded-0" name="update_cat">Edit Title</button>
  <a href="gallery-album.php" class="btn btn-primary rounded-0">Cancel</a> 
</form>            
        </div>
    </div><!--end of inner row-->
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

    