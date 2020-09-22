<?php 
session_start();
include('../connect.php');
include('includes/top.php');

if(isset($_GET['edit_cat'])){
	$cat_id = $_GET['edit_cat']; 
	$get_cat = "select * from categories where cat_id='$cat_id'";
	$run_cat = mysqli_query($con, $get_cat); 
	$row_cat = mysqli_fetch_array($run_cat); 
	$cat_id = $row_cat['cat_id'];
	$cat_title = $row_cat['category'];
}

if(isset($_POST['update_cat'])){
	$update_id = $cat_id;
	$new_cat = mysqli_real_escape_string($con,$_POST['new_cat']);
	$update_cat = "update categories set category='$new_cat' where cat_id='$update_id'";
	$run_cat = mysqli_query($con, $update_cat); 
	if($run_cat){

	   echo "<script>alert('Category updated!')</script>";
	   echo "<script type='text/javascript'>window.top.location='view_cats.php';</script>"; exit;
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
<div class="col-md-9" style="background-color: white;
    background-size: cover;
    max-width: 68.9%;
    margin-left: 70px;
    overflow-x: scroll;
    height: 518px;">
 
    
<form method="post" action="" id="post_form">
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" name="new_cat" value="<?php echo $cat_title;?>"/> 
  </div>
  
  <button type="submit" class="btn btn-primary rounded-0" name="update_cat">Update Category</button>
  <a href="view_cats.php" class="btn btn-primary rounded-0">Cancel</a>
</form>    
    </div>

<div class="col-md-3 right_col" style="height:518px;">
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