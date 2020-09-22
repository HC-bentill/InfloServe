<?php
include('includes/top.php');
include('../connect.php');

session_start();
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

//page permission
$Admin = "Admin";
$User = "User";
$sqlAdmin = (" SELECT * FROM user where user_name ='".$_SESSION['user']."' AND role = '$Admin' ");
$number = 0;
$result_Admin = mysqli_query($con,$sqlAdmin);
if(mysqli_num_rows($result_Admin)==1){
	   
}else{
	 echo "<script>alert('You do not have permission to access this page')</script>";
	 echo "<script type='text/javascript'>window.top.location='welcome.php';</script>"; exit;
}

//Adding Catergory
if(isset($_POST['add_cat'])){
		$count = 0;
$res = mysqli_query($con,"SELECT * FROM categories WHERE category ='$_POST[category]'");
$count = mysqli_num_rows($res);

if($count>0){
	echo "<script>alert('Category already exists choose another!')</script>";
}
else{
        $cat_title = mysqli_real_escape_string($con,$_POST['category']);
        $insert_cat = "insert into categories (category) values ('$cat_title')";
        $run_cat = mysqli_query($con, $insert_cat);
        if($run_cat){
            echo "<script>alert('New Category added!')</script>";
            echo "<script>window.open('new_category.php?view_cats','_self')</script>";
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
    
<form method="post" action="new_category.php" id="post_form">
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Category name" name="category" required>
  </div>
  
  <button type="submit" class="btn btn-primary rounded-0" name="add_cat">Add Category</button>
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