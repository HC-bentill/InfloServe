<?php 
require('includes/page-head.php');
include('connect.php');

//get page or category
if(isset($_GET['cat'])){
	$cat_id = $_GET['cat'];
}else{
	$cat_id = '';
}  

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

//pagination
$no_of_records_per_page = 20;
$offset = ($pageno-1) * $no_of_records_per_page; 

$total_pages_sql = "SELECT COUNT(*) FROM posts WHERE post_cat = '$cat_id' AND deleted = 0 ";
$result1 = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result1)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);  

$sql1 ="SELECT * FROM posts WHERE post_cat = '$cat_id' AND deleted=0 ORDER BY post_id DESC ";
$resulttt = mysqli_query($con, $sql1);

//displaying name of category
$category = get_category($cat_id);
?>

<?php 
include('includes/nav.php');
?>

<!-- start of Hero -->
<section class="rentals-banner img-fluid">
  <div class="container">
    <div class="row rentals-banner-text">
      <div class="col-md-12">
        <h1 class="w3-animate-left">Rentals > <?=$category['categories'];?></h1>
<?php
include('includes/cat_dropdown.php');
?>
      </div>
    </div>
  </div>
</section>
<!-- end of Hero -->

<section class="rental-section">
  <div class="container">
    <div class="row rentals text-center">
<?php while($posts = mysqli_fetch_assoc($resulttt)) : ?>
      <div class="col-lg-3 col-x-12 col-xs-12">
      	<a href="images/uploads/<?=$posts['description_image']; ?>" data-lightbox="mygallery" data-title="" >
        <img src="images/uploads/<?=$posts['description_image'];?>" class="img-fluid blog-img w3-animate-left" />
        </a>
        <!-- <svg class="bd-placeholder-img rounded-circle" src="img/ama.png" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> -->
        <h3 class="w3-animate-top"><?=$posts['title'];?></h3>
        <!--<p class="text-left w3-animate-right" style="color: grey">
          
        </p>-->
      </div>
<?php endwhile;?>
    </div><!-- end of row-->
    
    <div class="row" style="padding-bottom:40px;">
    	<div class="col-lg-12">
        
<nav aria-label="Page navigation">
<ul class="pagination" id="paginate">
<style>
	#paginate li {
	background-color: rgb(181, 55, 59);
    color: white;
	border:1px solid white;
	border-radius: 3px;
	padding:7px;
	}
</style>
<li><a href="?pageno=1&cat=<?=$cat_id?>"><i class="fa fa-angle-double-left" style="padding:1px;"></i> First</a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; }?>&cat=<?=$cat_id?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>&cat=<?=$cat_id?>"><i class="fa fa-angle-left"></i> Prev</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>&cat=<?=$cat_id?>">
        Next <i class="fa fa-angle-right" style="padding-right:5px;"></i></a>
    </li>
    <li ><a href="?pageno=<?php echo $total_pages; ?>&cat=<?=$cat_id?>">Last <i class="fa fa-angle-double-right" style="padding-right:5px;"></i></a></li>
</ul>
</nav>        
        
        </div>
    </div><!-- end of row-->
  </div><!-- end of container-->
</section>

<?php 
include('includes/footer.php');

function get_category($cat_id){
	global $con;
	$id = $cat_id;
	$sql = "SELECT p.cat_id AS 'cat_id', p.category AS 'categories' FROM categories c INNER JOIN categories p ON p.cat_id
WHERE p.cat_id  = '$id'";
$query = $con->query($sql);
$category = mysqli_fetch_assoc($query);
return $category;
}
?>
