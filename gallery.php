<?php 
require('includes/page-head.php');
include('connect.php');

//pagination
$showRecordPerPage = 20;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "SELECT * FROM posts WHERE post_cat = 24 AND deleted = 0 ";
$allEmpResult = mysqli_query($con, $totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;        

$Sql ="SELECT * FROM posts WHERE post_cat = 24 AND deleted = 0 ORDER BY post_id DESC LIMIT $startFrom, $showRecordPerPage";
$result = $con->query($Sql);
?>

<?php 
include('includes/nav.php');
?>
<!-- start of Hero -->
<section class="gallery-banner img-fluid">
  <div class="container w3-animate-right">
    <div class="roww gallery-banner-text">
      <div class="col-md-12">
        <h1>Gallery</h1>
      </div>
    </div>
  </div>
</section>
<!-- end of Hero -->

<!-- start of exhibition -->
<section class="gallery"  >
  <div class="container">
    <div class="row">
<?php while($posts = mysqli_fetch_assoc($result)) : ?> 
      	<div class="col-lg-4 col-md-4 col-xs-12">
        	<a href="images/uploads/<?=$posts['description_image']; ?>" data-lightbox="mygallery" data-title="" >
        <img src="images/uploads/<?=$posts['description_image']; ?>" class="img-fluid" alt=""/>
     		 </a>
        </div>
<?php endwhile; ?>	
     </div><!-- end of row-->
     
     <div class="row">
     	<div class="col-lg-12">

<nav aria-label="Page navigation example" style="margin-top:50px;">
  <ul class="pagination" id="paginate">
<?php if($currentPage != $firstPage) { ?>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
<span aria-hidden="true">First</span>
</a>
</li>
<?php } ?>
<?php if($currentPage >= 2) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
<?php } ?>
<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
<?php if($currentPage != $lastPage) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
<span aria-hidden="true">Last</span>
</a>
</li>
<?php } ?>
</ul>
</nav>

		</div>
    </div><!-- end of row-->
  </div><!-- end of conatiner-->
</section>

<?php 
 include('includes/footer.php');
?>
