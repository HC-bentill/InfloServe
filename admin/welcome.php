<?php
session_start();
include('includes/top.php');
include('../connect.php');

if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

$var1 = '';
$postsSql ="SELECT * FROM posts WHERE title != '$var1' AND deleted = 0 ORDER BY post_id DESC";
$postss = $con->query($postsSql);
?>

<body>
<div class="container-fluid">
	<div class="row text-center">
    	<div class="col-md-12">
<img src="images/bg-header.jpg" class="img-fluid header_img">	
        </div>	
    </div><!-- end of row-->

	<div class="row" id="row2">
<div class="col-md-9" id="bg">
<marquee scrolldelay="0" scrollamount="8" id="marquee">
<?php while($posts = mysqli_fetch_assoc($postss)) : ?>
<span style="font-weight:900; font-size:30px; color:black;">.</span> <?=$posts['title']; ?> &nbsp;&nbsp;
<?php endwhile; ?>
</marquee>

	<div class="row">
    	
    </div><!-- end of inner row-->
</div>

<div class="col-md-3 right_col" style="height:518px;">
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