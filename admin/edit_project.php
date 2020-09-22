<?php
include('includes/top.php');
include('../connect.php');
require_once('../helpers/helpers.php');
session_start();

if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }
   
if(isset($_GET['edit_project'])){
	$project_id = $_GET['edit_project']; 
	$get_project = "SELECT * from projects WHERE id='$project_id'";
	$run_project = mysqli_query($con, $get_project); 
	$row_project = mysqli_fetch_array($run_project); 
		
	$project_id = $row_project['id'];
	$client_name = $row_project['client_name'];
	$org_name = $row_project['org_name'];
	$phone = $row_project['phone'];
	$email = $row_project['email'];
	$address = $row_project['address'];
	$progress = $row_project['progress'];
	$description = $row_project['description'];
}
?>

<?php 
if(isset($_POST['update'])){
	$update_id = $project_id;
	$client_name = $_POST['client_name'];
	$org_name = $_POST['org_name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$progress = $_POST['progress'];
	$description = $_POST['description'];
	
	$update_project = "UPDATE projects SET client_name='$client_name', org_name='$org_name',phone='$phone', email='$email', address='$address', progress='$progress', description='$description' where id ='$update_id'";
	$run_post = mysqli_query($con, $update_project); 
	if($run_post){

	   echo "<script>alert(' Record been updated!')</script>";
	   echo "<script type='text/javascript'>window.top.location='view_projects.php';</script>"; exit;
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

<form method="post" action="" id="post_form">
  <div class="form-group">
  			<div class="row">
  		<Div class="col-md-6">
    <label for="exampleInputEmail1">Client Name</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Client Name" name="client_name" value="<?php echo $client_name;?>">
    		</Div>
            
<div class="col-md-6">
    <label for="exampleInputRef">Name of Organization</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Name of Organization" name="org_name" value="<?php echo $org_name;?>">
  </div>
            	</div><!-- end of row-->
  </div>
  <div class="form-group">
  			<div class="row">
  		<Div class="col-md-6">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Phone Number" name="phone" value="<?php echo $phone;?>">
    		</Div>
            
<div class="col-md-6">
    <label for="exampleInputRef">Email</label>
    <input type="email" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Email" name="email" value="<?php echo $email;?>">
  </div>
            	</div><!-- end of row-->
  </div>
   <div class="form-group">
  			<div class="row">
  		<Div class="col-md-6">
    <label for="exampleInputEmail1">Address</label>
  <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Address" name="address" value="<?php echo $address;?>">
    		</Div>
            
<div class="col-md-6">
    <label for="exampleInputRef">Project Progress</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" value="<?php echo $progress;?>" name="progress">
  </div>
            	</div><!-- end of row-->
  </div>
  
  <div class="form-group">
  		<div class="row">
        	<div class="col-md-6">
<label for="exampleInputRef">Description</label>
<textarea rows="5" name="description" class="form-control"><?php echo $description;?></textarea>            
            </div>
        </div><!-- end of row-->
  </div>
  
<button type="submit" class="btn btn-primary rounded-0" name="update">Update</button>
<a href="view_projects.php" class="btn btn-primary rounded-0">Cancel</a>
</form>    
    
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
    