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
    
<table class="table table-responsive table-striped table-bordered" id="table-responsive">
  <thead id="t_head">
    <tr>
      <th scope="col">Category ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
    include('../connect.php');
    $get_cat = "select * from categories ORDER BY cat_id DESC";
    $run_cat = mysqli_query($con, $get_cat);
    $i = 0;
    while($row_cat=mysqli_fetch_array($run_cat)){
        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['category'];
        $i++;
    ?>
    <tr align = "">
        <td><?php echo $cat_id; ?></td>
        <td><?php echo $cat_title; ?></td>
        <td><a href="edit_cat.php?edit_cat=<?php echo $cat_id; ?>" class="btn btn-primary btn-sm" style="padding:5px;"><i class="fa fa-pencil-square-o" title="edit"></i></a>
        <a href="delete_cat.php?delete_cat=<?php echo $cat_id;?>" onClick="return checkDelete()" class="btn btn-danger btn-sm" style="padding:5px;"><i class="fa fa-trash" title="delete"></i></a></td>
    </tr>
    <?php } ?>
    </tr>
  </tbody>
</table>
    
    
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
    include('../connect.php');
    if(isset($_POST['add_cat'])){
        $cat_title = $_POST['category'];
        $insert_cat = "insert into categories (category) values ('$cat_title')";
        $run_cat = mysqli_query($con, $insert_cat);
        if($run_cat){
            echo "<script>alert('New Category has been inserted!')</script>";
            echo "<script>window.open('new_category.php?view_cats','_self')</script>";
           }
    }
?>