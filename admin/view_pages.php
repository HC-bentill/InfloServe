<?php
include('includes/top.php');
include('../connect.php');

session_start();
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }
   
//delete page
if(isset($_GET['delete_page'])){
    $delete_id = $_GET['delete_page'];
    $delete_page = "delete from pages where pages_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete_page);
    if($run_delete){
       /*echo "<script>alert('Page deleted!')</script>";*/
	   echo "<script>window.open('view_pages.php','_self')</script>";
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
    
<table class="table table-responsive table-striped table-bordered" id="table-responsive">
  <thead id="t_head">
    <tr>
      <th scope="col">Page ID</th>
      <th scope="col">Page Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
    include('../connect.php');
    $get_page = "select * from pages ORDER BY pages_id DESC";
    $run_page = mysqli_query($con, $get_page);
    $i = 0;
    while($row_page=mysqli_fetch_array($run_page)){
        $pages_id = $row_page['pages_id'];
        $page_name = $row_page['page_name'];
        $i++;
    ?>
    <tr align = "">
        <td><?php echo $pages_id; ?></td>
        <td><?php echo $page_name; ?></td>
        <td><a href="edit_page.php?edit_page=<?php echo $pages_id; ?>" class="btn btn-primary btn-sm" style="padding:5px;"><i class="fa fa-pencil-square-o" title="edit"></i></a>
        <a href="view_pages.php?delete_page=<?php echo $pages_id;?>" onClick="return checkDelete()" class="btn btn-danger btn-sm" style="padding:5px;"><i class="fa fa-trash" title="delete"></i></a></td>
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