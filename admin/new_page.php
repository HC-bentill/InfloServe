<?php
include('includes/top.php');
include('../connect.php');

session_start();
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }
?>

<?php
    if(isset($_POST['add_page'])){
		$count = 0;
$res = mysqli_query($con,"SELECT * FROM pages WHERE page_name ='$_POST[page_name]'");
$count = mysqli_num_rows($res);

if($count>0){
	echo "<script>alert('Page already exists choose another!')</script>";
}
else{
        $page_name = $_POST['page_name'];
		
        $insert_page = "insert into pages (page_name) values ('$page_name')";
        $run_page = mysqli_query($con, $insert_page);
        if($run_page){
            echo "<script>alert('New Page added!')</script>";
            echo "<script>window.open('new_page.php','_self')</script>";
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
    
<form method="post" action="" id="post_form">
  <div class="form-group">
    <label for="exampleInputEmail1">Page Name</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Page name" name="page_name" required>
  </div>
  
  <button type="submit" class="btn btn-primary rounded-0" name="add_page">Add Page</button>
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
    
