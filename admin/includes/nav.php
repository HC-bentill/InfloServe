<?php require_once('includes/total.php');?>

<li style="color:red; background-color:white; text-align:center; font-weight:500;"><script type="text/javascript">
								<!--
								var mydate=new Date()
								var year=mydate.getYear()
								if (year < 1000)
								year+=1900
								var day=mydate.getDay()
								var month=mydate.getMonth()
								var daym=mydate.getDate()
								if (daym<10)
								daym="0"+daym
								var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
								var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
								document.write(""+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+"")
								// -->
							</script><br />
</li>
<li><a href="welcome.php">Home</a></li>
<li><a href="new_post.php">New Post</a></li>   
<li><a href="view_posts.php">View All Posts (<?=$totalposts;?>)</a></li> 
<!--<li><a href="view_orders.php">Current Orders</a></li>
<li><a href="projects.php">Add Project</a></li> 
<li><a href="view_projects.php">View Projects</a></li> -->     
<li><a href="new_page.php">New Page</a></li>   
<li><a href="view_pages.php">View Pages (<?=$totalpages;?>)</a></li>
<li><a href="new_category.php">New Category</a></li>
<li><a href="view_cats.php">View Categories (<?=$totalcats;?>)</a></li>    
<li><a href="new_user.php">New User</a></li>   
<li><a href="view_users.php">View All Users (<?=$totaluser;?>)</a></li>  
<li><a href="gallery-album.php">Gallery / Album (<?=$totalgallery;?>)</a></li>
<!--<li><a href="view_media.php">Media </a></li>-->
<!--<li><a href="role.php">Role</a></li>-->
<li><a href="logout.php">Logout</a></li> 
<li><A href="../index.php" target="_blank">View Site</A> 
<li><a href="changepassword.php">Change Password</a></li>
<!--<li><a href="" class="btn btn-danger rounded-0" style="font-size: 17px;"><i class="fa fa-question-circle" style="background-color: #dc3545;border: none;"></i> Contact Support</a></li>-->

<!--<li><a href="view_comments.php">comments </a></li>  
<li>
<form action="insert_comment.php" method="post">
<textarea class="form-control" rows="2" name="comment" placeholder="comment" required="required"></textarea>

<button type="submit" style="margin-top:5px;" name="add_com">Add comment</button>
</form>
</li>

