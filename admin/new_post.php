<?php
session_start();
include('includes/top.php');
include('../connect.php');
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

if(isset($_POST['publish'])){
        //getting the text data from the fields
        $title = mysqli_real_escape_string($con,$_POST['title']);
		$post_cat = $_POST['post_cat'];
		$ref = mysqli_real_escape_string($con,$_POST['ref']);
		$page = $_POST['page'];
        $description = mysqli_real_escape_string($con,$_POST['description']);
		$event_date = $_POST['event_date'];
		$time_from = $_POST['time_from'];
		$time_to = $_POST['time_to'];
        $main_content = mysqli_real_escape_string($con,$_POST['main_content']);

		$img =  $_FILES["description_image"]["name"];
		$imageFileType = strtolower(pathinfo($img,PATHINFO_EXTENSION));

// Check file size
if ($_FILES["description_image"]["size"] > 10485760) { {
	echo "<script>alert('Sorry, your file is too large.')</script>";
	echo "<script>window.open('new_post.php','_self')</script>";
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "mp3" ) {
	echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
	echo "<script>window.open('new_post.php','_self')</script>";
}
}else{
		 
$insert_post = "INSERT INTO posts 
(title,post_cat,ref,page,description,description_image,event_date,time_from,time_to,main_content,date_posted) VALUES ('$title','$post_cat','$ref','$page','$description','$img','$event_date','$time_from','$time_to','$main_content',now())";

		 if (mysqli_query($con,$insert_post)){
			 move_uploaded_file($_FILES["description_image"]["tmp_name"],"../images/uploads/$img");
			 echo "<script>alert('Post has been Published')</script>";
		 }
}}
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

<form method="post" action="new_post.php" id="post_form" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Enter title" name="title" value="<?php echo isset($_POST["title"]) ? $_POST["title"] : ''; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter description" name="description"  maxlength="100" value="<?php echo isset($_POST["description"]) ? $_POST["description"] : ''; ?>">
  </div>
<div class="form-group">
	<label for="">Upload File: <span class="bg-danger text-light">(File shouldnt be more than 10MB)</span></label>
    <input type="file" name="description_image" id="image"/>
  </div>
  <div class="row">
<div class="form-group col-12">
    <label for="">Date (only applicable to events):</label>
    <input type="date" name="event_date" class="form-control" value="<?php echo isset($_POST["event_date"]) ? $_POST["event_date"] : ''; ?>">
</div>
  </div><!-- end of row-->
<div class="row">
	<div class="form-group col-6">
    	<label for="">Time From (only applicable to events):</label>
    	<input type="time" name="time_from" class="form-control" value="<?php echo isset($_POST["time_from"]) ? $_POST["time_from"] : ''; ?>">
	</div>
<div class="form-group col-6">
    	<label for="">Time To (only applicable to events):</label>
    	<input type="time" name="time_to" class="form-control" value="<?php echo isset($_POST["time_to"]) ? $_POST["time_to"] : ''; ?>">
</div>
  </div><!-- end of row-->
  <div class="form-group">
  			<div class="row">
  		<Div class="col-md-6">
    <label for="exampleFormControlSelect1">Select Category <span class="text-danger">*</span></label>
    <?php 
	global $con;
$sql2 = ("select * from categories;");
$number = 0;
$result = mysqli_query($con,$sql2);

echo '<select class="form-control" id="exampleFormControlSelect1" name="post_cat" required>';
echo '<option value=""></option>';
while ($row = mysqli_fetch_array($result))
{
	$cat_id = $row['cat_id']; 
	$cat_title = $row['category'];
	echo "
	<option value='$cat_id'>$cat_title</option>";
}
echo '</select>';
	?>
    		</Div>
            
<div class="col-md-6">
    <label for="exampleInputRef">Hyper Link (optional)</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Enter Link ref" 
    name="ref" value="<?php echo isset($_POST["ref"]) ? $_POST["ref"] : ''; ?>">
  </div>
            	</div><!-- end of row-->
  </div>
  
<div class="form-group">
  			<div class="row">
  		<Div class="col-md-6">
    <label for="exampleFormControlSelect1">Select Page</label>
    <?php 
	global $con;
$sql2 = ("select * from pages;");
$number = 0;
$result = mysqli_query($con,$sql2);

echo '<select class="form-control" id="exampleFormControlSelect1" name="page">';
echo '<option value=""></option>';
while ($row = mysqli_fetch_array($result))
{
	$page_id = $row['pages_id']; 
	$page_name = $row['page_name'];
	echo "
	<option value='$page_id'>$page_name</option>";
}
echo '</select>';
	?>
    		</Div>
            </div></div>

   <div class="form-group" style="margin-top:20px;">
    <label for="exampleFormControlTextarea1">Main Content</label>
    <textarea class="form-control" id="editor" rows="7" name="main_content"><?php echo isset($_POST["main_content"]) ? $_POST["main_content"] : ''; ?></textarea>
  </div>
  
<button type="submit" class="btn btn-primary rounded-0" name="publish">Publish</button>
</form>    
    
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