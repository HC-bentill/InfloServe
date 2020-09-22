<?php
session_start();
include('includes/top.php');
include('../connect.php');

if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

if(isset($_GET['keywords'])){
	$keywords = $con->escape_string($_GET['keywords']);
	
$query ="SELECT * FROM posts WHERE title LIKE '%{$keywords}%' AND deleted = '0' LIMIT 20 ";
$results = $con->query($query);
}
?>
<style>
td img {
	width:200px;
	height:180px;
}
</style>
<body>

<div class="container-fluid">
	<div class="row text-center">
    	<div class="col-md-12">
<img src="images/bg-header.jpg" class="img-fluid header_img">	
        </div>	
    </div><!-- end of row-->
	
	<div class="row" id="row2">
<div class="col-md-9 bg_all">
	
	<div class="col-md-12" >
<form method="get" action="search_post.php">
<div class="input-group home_search" style="margin-top:10px; margin-bottom:10px; ">
   <input type="text" class="form-control" placeholder="Search" id="txtSearch" name="keywords"/>
   <div class="input-group-btn pull-right">
       <button class="btn btn-primary" type="submit" id="home_sbmit_btn" name="search">
        <span class="fa fa-search"></span>
        </button>	
        	
   </div>
   </div>
</form>
			</div>
    
<table class="table table-responsive table-striped table-bordered" id="table-responsive">
  <thead id="t_head">
    <tr>
      <th scope="col">Title </th>
      <th scope="col">Description </th>
      <th scope="col">Image</th>
      <th scope="col">Category</th>
      <!--<th scope="col">Ref Link</th>-->
      <th scope="col">Main Content</th>
      <th scope="col" style="width:13%;">Date Posted</th>
      <!--<th scope="col">Author</th>-->
      <th scope="col" style="width:10%;">Action</th>
      <!--<th scope="col">Delete</th>-->
    </tr>
  </thead>
  <tbody>
   <?php while($search = mysqli_fetch_assoc($results)) : 
		$cat_name = $search['post_cat'];
		$showcat ="select * from categories where cat_id = '$cat_name'";
		$show_result = $con->query($showcat);
		$category = mysqli_fetch_assoc($show_result);
		$cat = $category['category'];
	  
	    $page_name = $search['page'];
		$showpage ="select * from pages where pages_id = '$page_name'";
		$show_result = $con->query($showpage);
		$page = mysqli_fetch_assoc($show_result);
		$pagename = $page['page_name'];
		
		$imageFileType = strtolower(pathinfo($search['description_image'],PATHINFO_EXTENSION));
	?>
      
    <!--include('../connect.php');
	$get_pst = "select * from posts where deleted='0' ORDER BY post_id DESC";
    $run_pst = mysqli_query($con, $get_pst);
    $i = 0;
    while($row_pst=mysqli_fetch_array($run_pst)){
		$cat_name = $row_pst['post_cat'];
		$showcat ="select * from categories where cat_id = '$cat_name'";
		$show_result = $con->query($showcat);
		$category = mysqli_fetch_assoc($show_result);
		$cat = $category['category'];
		
		$page_name = $row_pst['page'];
		$showpage ="select * from pages where pages_id = '$page_name'";
		$show_result = $con->query($showpage);
		$page = mysqli_fetch_assoc($show_result);
		$pagename = $page['page_name'];
	
        $post_id = $row_pst['post_id'];
        $title = $row_pst['title'];
        $description = $row_pst['description'];
        $description_image = $row_pst['description_image'];
		$post_cat = $row_pst['post_cat'];
		$ref = $row_pst['ref'];
		$page = $row_pst['page'];
		$main_content = $row_pst['main_content'];
		$date_posted = $row_pst['date_posted'];
        $i++;-->
    
    <tr align = "">
        <td><?= $search['title'];?></td>
        <td><?= $search['description'];?></td>
        <td>
        <?php
		if($imageFileType != "mp3"){
			echo '<img src="../images/uploads/'.$search['description_image'].'" style="width:80px; height:70px;"/>';
		}else{
			echo '<audio controls id="player">
  				<source src="../images/uploads/'.$search['description_image'].'" type="audio/mpeg">
				Your browser does not support the audio element.
				</audio>';	
		}
		?>
        </td>
        </td>
        <td><?php echo $cat;?></td>
        <td><?= $search['main_content'];?></td>
        <td><?= date('M d Y',strtotime($search['date_posted']));?></td>
  <td><a href="edit_post.php?edit_post=<?= $search['post_id'];?>" class="btn btn-primary btn-sm" style="padding:5px;"><i class="fa fa-pencil-square-o" title="edit"></i></a>
  <a href="delete_post.php?delete_post=<?= $search['post_id'];?>" onClick="return checkDelete()"class="btn btn-danger btn-sm" style="padding:5px;"><i class="fa fa-trash" title="delete"></i></a>
        </td>
    </tr>
    <?php endwhile; ?>
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