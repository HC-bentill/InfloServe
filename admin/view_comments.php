<?php
include('includes/top.php');
include('../connect.php');

session_start();
if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }

$commentSql ="SELECT com_id, comment, comment_date FROM comments ORDER BY com_id DESC LIMIT 5";
$comment = $con->query($commentSql);
?>

<body>

<div class="container-fluid">
	<div class="row text-center">
    	<div class="col-md-12">
<img src="images/bg-header.jpg" class="img-fluid header_img">	
        </div>	
    </div><!-- end of row-->

	<div class="row" id="row2">
<div class="col-md-9" style="background-color:white;
    background-size: cover;
    max-width: 68.9%;
    margin-left: 70px;">

<?php while($posts = mysqli_fetch_assoc($comment)) : ?>
<p style="margin-bottom:0; margin-top:10px;"><em><strong><?=$posts['comment_date']; ?></strong></em></p>
<p><em><?=$posts['comment']; ?></em> 
<a href="delete_com.php?delete_com=<?php echo $com_id;?>" onClick="return checkDelete()" class="pull-right" style="margin-left:10px;">Delete</a>
<a href="edit_user.php?edit_cat=<?php echo $com_id; ?>" class="pull-right" >Edit</a>
</p>
<hr>
<?php endwhile;?>
    
    
</div>

<div class="col-md-3 right_col" style="height: 561px;">
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
   