<?php 
include('../connect.php');
session_start();
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

if(isset($_GET['edit_post'])){
	$post_id = $_GET['edit_post']; 
	$get_post = "select * from posts where post_id='$post_id'";
	$run_post = mysqli_query($con, $get_post); 
	$row_post = mysqli_fetch_array($run_post); 
		
	$post_id = $row_post['post_id'];
	$title = $row_post['title'];
	$description = $row_post['description'];
	$event_date = $row_post['event_date'];
	$time_from = $row_post['time_from'];
	$time_to = $row_post['time_to'];
	$description_image = $row_post['description_image'];
	$post_cat = $row_post['post_cat'];
	$ref = $row_post['ref'];
	$page = $row_post['page'];
	$main_content = $row_post['main_content'];
}
?>

<?php 
	if(isset($_POST['update_post'])){
	$update_id = $post_id;
	$title = mysqli_real_escape_string($con,$_POST['title']);
	$description = mysqli_real_escape_string($con,$_POST['description']);
	$event_date = $_POST['event_date'];
	$time_from = $_POST['time_from'];
	$time_to = $_POST['time_to'];
	
	//If the previous Image has been changed
	if(isset($_FILES['description_image']) && !empty($_FILES['description_image']['name'])){
		//move the image file to directory
		$editImage = $_FILES['description_image']['name'];
		move_uploaded_file($_FILES['description_image']['tmp_name'],"../images/uploads/$editImage");
	} else { $editImage = $_POST['previous_image']; }
	
	$post_cat = $_POST['post_cat'];
	$ref = mysqli_real_escape_string($con,$_POST['ref']);
	$page = $_POST['page'];
	$main_content = mysqli_real_escape_string($con,$_POST['main_content']);
	
	$update_post = "UPDATE posts SET title='$title', description='$description',event_date='$event_date',
	time_from='$time_from',time_to='$time_to',description_image='$editImage', post_cat='$post_cat', ref='$ref', page='$page', main_content='$main_content' where post_id='$update_id'";
	$run_post = mysqli_query($con, $update_post); 
	if($run_post){

	   echo "<script>alert('Post has been updated!')</script>";
	   echo "<script type='text/javascript'>window.top.location='view_posts.php';</script>"; exit;
	   }
	}
?>

<?php
include('includes/top.php');
include('../connect.php');
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
    
<form method="post" action="" id="post_form" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Enter title" name="title" value="<?php echo $title;?>"/>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter description" name="description" maxlength="160" value="<?php echo $description;?>"/>
  </div>
<div class="form-group">
    <label for="exampleInputPassword1">Upload File: <span class="bg-danger text-light">(File shouldnt be more than 10MB)</span></label>
    <input type="file" name="description_image"/>
    <input type="text" name="previous_image" value="<?php echo $description_image;?>" style="display:none"/>
  </div>
  <div class="row">
<div class="form-group col-12">
    <label for="">Date (only applicable to events):</label>
    <input type="date" name="event_date" class="form-control" value="<?php echo $event_date;?>">
</div>
  </div><!-- end of row-->
<div class="row">
	<div class="form-group col-6">
    	<label for="">Time From (only applicable to events):</label>
    	<input type="time" name="time_from" class="form-control" value="<?php echo $time_from;?>">
	</div>
<div class="form-group col-6">
    	<label for="">Time To (only applicable to events):</label>
    	<input type="time" name="time_to" class="form-control" value="<?php echo $time_to;?>">
</div>
  </div><!-- end of row-->
  <div class="form-group">
  			<div class="row">
  		<Div class="col-md-6">
    <label for="exampleFormControlSelect1">Select Category</label>
    <?php 
	global $con;
$sql2 = ("select * from categories;");
$number = 0;
$result = mysqli_query($con,$sql2);

echo '<select class="form-control" id="exampleFormControlSelect1" name="post_cat">';
echo '<option value=""></option>';
while ($row = mysqli_fetch_array($result))
{
	$cat_id = $row['cat_id']; 
	$cat_title = $row['category']; ?>
    
	<option value="<?=$cat_id?>" <?=($post_cat==$cat_id)?'selected':''?> ><?=$cat_title?></option>
    
<?php }
echo '</select>';
	?>
    		</Div>
            
<div class="col-md-6">
    <label for="exampleInputRef">Hyper Link (optional)</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Enter Link ref" name="ref" value="<?php echo $ref;?>"/>
  </div>
            	</div><!-- end of row-->
  </div>
  
  <div class="form-group">
  			<div class="row">
  		<Div class="col-md-6">
    <label for="exampleFormControlSelect1">Select Page</label>
    <?php 
	global $con;
$sql22 = ("select * from pages;");
$number = 0;
$result12 = mysqli_query($con,$sql22);

echo '<select class="form-control" id="exampleFormControlSelect1" name="page">';
echo '<option value=""></option>';
while ($row = mysqli_fetch_array($result12))
{
	$pages_id = $row['pages_id']; 
	$page_name = $row['page_name'];?>

	<option value="<?=$pages_id?>" <?=($page==$pages_id)?'selected':''?> ><?=$page_name?></option>
<?php }
echo '</select>';
	?>
    		</Div>
            </div></div>
  
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Main Content</label>
    <textarea class="form-control" id="editor" rows="7" name="main_content" placeholder="content"><?php echo $main_content;?></textarea>
    <script type="text/javascript">
        CKEDITOR.replace( 'main_content' );
      </script>
  </div>
  
  <button type="submit" class="btn btn-primary rounded-0" name="update_post">Update Post</button>
  <a href="view_posts.php" class="btn btn-primary rounded-0">Cancel</a>
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
    