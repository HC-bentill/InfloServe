<?php
include('includes/top.php');
include('../connect.php');
require_once('../helpers/helpers.php');
session_start();

if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }
   
//delete projects
if(isset($_GET['delete']) && !empty($_GET['delete'])){
	$delete_id = (int)$_GET['delete'];
	$delete_id = $delete_id;
	$sql4 = "DELETE FROM projects WHERE id = '$delete_id'";
	$con->query($sql4);
	$run_delete = mysqli_query($con, $sql4);
    
	if($run_delete){

	   echo "<script>alert(' Record Deleted!')</script>";
	   echo "<script type='text/javascript'>window.top.location='view_projects.php';</script>"; exit;
	   }
}

    if(isset($_POST['publish'])){
		
        //getting the text data from the fields
        $client_name = $_POST['client_name'];
		$org_name = $_POST['org_name'];
		$phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
		$progress = $_POST['progress'];
		$description = $_POST['description'];
        //$date_created = $_POST['date_created'];
		
$a = substr ($org_name,0,3);
$m = date('m');
$y = date('y');
$d = date('d');
$s = time('s');

echo '<br>';

$GetSidNo = "SELECT * FROM projects";
$resultss = mysqli_query($GetSidNo);
/*$GetSidNo = mysqli_query("SELECT * FROM new_order");
$GetSidNo1 = mysqli_num_rows($GetSidNo);*/
$invID = str_pad($resultss, 4,'0', STR_PAD_LEFT);
$sid = $a.$s;
	
		 $insert_post = "INSERT INTO projects (client_name,org_name,phone,email,address,progress,description,date_created,ref_number) VALUES ('$client_name','$org_name','$phone','$email','$address','$progress','$description',now(),'$sid')";
		 if (mysqli_query($con,$insert_post)){
			 echo "<script>alert('Record Added')</script>";
			 echo "<script>window.open('projects.php','_self')</script>";
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
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Client Name" name="client_name" required>
    		</Div>
            
<div class="col-md-6">
    <label for="exampleInputRef">Name of Organization</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Name of Organization" name="org_name">
  </div>
            	</div><!-- end of row-->
  </div>
  <div class="form-group">
  			<div class="row">
  		<Div class="col-md-6">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Phone Number" name="phone" required>
    		</Div>
            
<div class="col-md-6">
    <label for="exampleInputRef">Email</label>
    <input type="email" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Email" name="email">
  </div>
            	</div><!-- end of row-->
  </div>
   <div class="form-group">
  			<div class="row">
  		<Div class="col-md-6">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Address" name="address">
    		</Div>
            
<div class="col-md-6">
	<label for="exampleInputRef">Project Progress</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Project progress" name="progress">
  </div>
            	</div><!-- end of row-->
  </div>
  
  <div class="form-group">
  			<div class="row">
            	<div class="col-md-6">
<label for="exampleInputRef">Description</label>
    <textarea rows="5" name="description" class="form-control"></textarea>                
                </div>
            </div><!-- end of row-->
   </div>
  
<button type="submit" class="btn btn-primary rounded-0" name="publish">Add</button>
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
    