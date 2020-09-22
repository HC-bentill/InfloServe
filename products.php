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
$totalEmpSQL = "SELECT * FROM posts WHERE post_cat !=24 AND deleted=0 ";
$allEmpResult = mysqli_query($con, $totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;



$productsql ="SELECT * FROM posts WHERE post_cat !=24 AND deleted=0 ORDER BY post_id DESC LIMIT $startFrom, $showRecordPerPage";
$productresult = mysqli_query($con, $productsql);

?>

<?php 
include('includes/nav.php');
include('connect.php');
?>

<!-- start of Hero -->
<section class="rentals-banner img-fluid">
  <div class="container">
    <div class="row rentals-banner-text">
      <div class="col-md-12">
        <h1 class="w3-animate-left">Rentals</h1>
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
<?php while($posts = mysqli_fetch_assoc($productresult)) : ?>
      <div class="col-lg-3 col-xs-12">
        <a href="images/uploads/<?=$posts['description_image']; ?>" data-lightbox="mygallery" data-title="" >
        <img src="images/uploads/<?=$posts['description_image']; ?>" class="img-fluid blog-img w3-animate-left" />
        </a>
        <!-- <svg class="bd-placeholder-img rounded-circle" src="img/ama.png" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> -->
        <h3 class="w3-animate-top"><?=$posts['title']; ?></h3>
        <!--<p class="text-left w3-animate-right" style="color: grey">
          InfloServ Rentals has a tent size to fit your event. Wether it is a
          sit down dinner, cocktail party or backyard birthday gathering we have
          what you need.
        </p>-->
      </div>
<?php endwhile;?>
    </div>


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

  </div>
</section>

<?php 
include('includes/footer.php');
?>
