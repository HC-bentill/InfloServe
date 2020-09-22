<?php
include('includes/top.php');
include('../connect.php');

session_start();
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
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

<table class="table table-responsive table-bordered" id="table-responsive">
  <thead id="t_head">
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Date Posted (Y-M-D)</th>
      <!--<th scope="col">Action</th>-->
      <!--<th scope="col">Delete</th>-->
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
    include('../connect.php');
    $get_pst = "select post_id,description_image,date_posted from posts ORDER BY post_id DESC";
    $run_pst = mysqli_query($con, $get_pst);
    $i = 0;
    while($row_pst=mysqli_fetch_array($run_pst)){
        $post_id = $row_pst['post_id'];
		$description_image = $row_pst['description_image'];
		$date_posted = $row_pst['date_posted'];
        $i++;
    ?>
    <tr align = "">
        <td><a href="../images/uploads/<?php echo $description_image;?>" class="gallery_img" data-rel="prettyPhoto[mainteasers]"><img src="../images/uploads/<?php echo $description_image;?>" width="150" height="100"/></a></td>
        <td><?php echo $date_posted;?></td>
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
    if(isset($_POST['publish'])){
        //getting the text data from the fields
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $main_content = $_POST['main_content'];
        $date_posted = $_POST['date_posted'];
        
        //getting the image from the field
		$description_image = $_FILES["description_image"]["name"];
		$description_image_tmp = $_FILES["description_image"]["tmp_name"];
        $filepath ="decs_images/".$description_image;
		
		move_uploaded_file($description_image_tmp,$filepath);
        
        $insert_post = "insert into posts (title,description,description_image,category,main_content,date_posted) values ('$title','$description','$description_image','$category','$main_content',curdate())";
        
        $insert_pst = mysqli_query($con, $insert_post);
        if($insert_pst){
            echo "<script>alert('product has been inserted')</script>";
            echo "<script>window.open('new_post.php?insert_product','_self')</script>";
        }
    }
?>