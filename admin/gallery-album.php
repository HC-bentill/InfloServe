<?php
session_start();
include('includes/top.php');
include('../connect.php');

if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

//delete gallery 
if(isset($_GET['delete']) && !empty($_GET['delete'])){
	$delete_id = (int)$_GET['delete'];
	$delete_id = $delete_id;
	$sql4 = "DELETE FROM gallery WHERE id = '$delete_id'";
	$con->query($sql4);
	$run_delete = mysqli_query($con, $sql4);
    header("Location: gallery-album.php");
}

//delete gallery cat
if(isset($_GET['delete']) && !empty($_GET['delete'])){
	$delete_id = (int)$_GET['delete'];
	$delete_id = $delete_id;
	$sql4 = "DELETE FROM gallery_category WHERE id = '$delete_id'";
	$con->query($sql4);
	$run_delete = mysqli_query($con, $sql4);
    header("Location: gallery-album.php");
}

    if(isset($_POST['publish'])){
        //getting the text data from the fields
        $title = mysqli_real_escape_string($con,$_POST['title']);
		
	 $img = $_FILES['media']['name'];
	 $insert_post = "INSERT INTO gallery (title,media,date_posted) VALUES ('$title','$img',now())";
        if (mysqli_query($con,$insert_post)){
			move_uploaded_file($_FILES['media']['tmp_name'],"../images/uploads/gallery/$img");
            echo "<script>alert('Gallery has been inserted')</script>";
        }
}
    


//................
if(isset($_POST['add_cat'])){
		$count = 0;
$res = mysqli_query($con,"SELECT * FROM gallery_category WHERE cat_name ='$_POST[cat_name]'");
$count = mysqli_num_rows($res);

if($count>0){
	echo "<script>alert('Title already exists choose another!')</script>";
}
else{
        $cat_name = $_POST['cat_name'];
		//$title_image = $_POST['title_image'];
		
		$img = $_FILES['title_image']['name'];
		$insert_cat = "insert into gallery_category (cat_name,title_image) values ('$cat_name','$img')";
        if (mysqli_query($con,$insert_cat)){
			move_uploaded_file($_FILES['title_image']['tmp_name'],"../images/uploads/gallery/$img");
            echo "<script>alert('New Title added!')</script>";
            //header("Location: gallery-album.php");
           }
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
    		<div class="col-md-6" style="border-bottom:1px solid black;">
            <h3 class="add_cat">Add Gallery</h3>
<form method="post" action="" id="post_form" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Title</label>
    <?php 
	global $con;
$sql2 = ("select * from gallery_category;");
$number = 0;
$result = mysqli_query($con,$sql2);

echo '<select class="form-control" id="exampleFormControlSelect1" name="title" required>';
echo '<option value=""></option>';
while ($row = mysqli_fetch_array($result))
{
	$id = $row['id']; 
	$cat_name = $row['cat_name'];
	echo "
	<option value='$id'>$cat_name</option>";
}
echo '</select>';
	?>
  </div>
<div class="form-group">
    <label for="exampleInputPassword1">Upload File: </label>
    <input type="file" name="media" id="image"/>
  </div>  
  
<button type="submit" class="btn btn-primary rounded-0" name="publish">Add</button>
</form>    
		</div><!-- end of inner col-->
        
        <div class="col-md-6" style="border-left:1px solid black; border-bottom:1px solid black;">
        <h3 class="add_cat">Add Title</h3>
<form method="post" action="" id="post_form" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Gallery Title</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Title" name="cat_name" required>
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Upload File: </label>
    <input type="file" name="title_image" id="title_image"/>
  </div>  

  
  <button type="submit" class="btn btn-primary rounded-0" name="add_cat">Add Title</button>
</form>            
        </div>
    </div><!--end of inner row-->
    
    	<div class="row" style="margin-top:25px;">
        	<div class="col-md-6">
			<?php
			include('includes/view_gallery.php');
			?>
            </div>
            
        	<div class="col-md-6">
			<?php
			include('includes/view_gallery_cat.php');
			?>
            </div>
        </div><!-- end of inner-row-->
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
