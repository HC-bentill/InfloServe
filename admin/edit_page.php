<?php
include('includes/top.php');
include('../connect.php');

session_start();
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

if(isset($_GET['edit_page'])){
	$page_id = $_GET['edit_page']; 
	$get_page = "select * from pages where pages_id='$page_id'";
	$run_page = mysqli_query($con, $get_page); 
	$row_page = mysqli_fetch_array($run_page); 
	$page_id = $row_page['pages_id'];
	$page_name = $row_page['page_name'];
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
    
<form method="post" action="" id="post_form">
  <div class="form-group">
    <label for="exampleInputEmail1">Page Name</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Page name" name="page_name" value="<?php echo $page_name;?>">
  </div>
  
  <button type="submit" class="btn btn-primary rounded-0" name="update_page">Update Page</button>
  <a href="view_pages.php" class="btn btn-primary rounded-0">Cancel</a>
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

<?php 
	if(isset($_POST['update_page'])){
	$update_id = $page_id;
	$page_name = $_POST['page_name'];
	$update_page = "update pages set page_name='$page_name' where pages_id='$update_id'";
	$run_page = mysqli_query($con, $update_page); 
	if($run_page){

	   echo "<script>alert('Page has been updated!')</script>";
	   echo "<script type='text/javascript'>window.top.location='view_pages.php';</script>"; exit;
	   }
	}
?>
    
    
