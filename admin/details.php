<?php
session_start();
include('includes/top.php');
include('../connect.php');

if (!isset($_SESSION['user']))
   {
      header("location: index.php");
   }


$id = $_GET['id'];
		$sql = "select o.*, i.title as itemName, i.description as itemPrice from orders as o
					LEFT JOIN posts as i on (i.post_id=o.post_id) WHERE id = '$id'";
		$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0){
	while($row_pst = mysqli_fetch_assoc($result)){
		/*$cat_name = $posts['post_cat'];
		$showcat ="select * from categories where cat_id = '$cat_name'";
		$show_result = $con->query($showcat);
		$category = mysqli_fetch_assoc($show_result);
		$cat = $category['category'];*/
		
		$id = $row_pst['id'];
        $full_name = $row_pst['name'];
        $itemName = $row_pst['itemName'];
        $itemPrice = $row_pst['itemPrice'];
        $quantity = $row_pst['quantity'];
		$number = $row_pst['number'];
		$email = $row_pst['email'];
		$order_date = $row_pst['order_date'];
		$invoice_number = $row_pst['invoice_number'];
		
		$total_amount = $itemPrice * $quantity;
	}
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
	<h5 class="bg-primary text-light text-center" style="padding:10px;">ITEM DETAILS
 <span class="gen_invoice"><a href="invoice.php?id=<?php echo $id;?>" class="btn btn-success btn-sm pull-right" style="position:relative; bottom:4px;">Generate Invoice</a></span>   
    </h5>
    	
	<div class="row" id="details_row">
		<div class="col-md-12">
<table class="table table-md" border="1" style="max-width:100%;" id="details_table">
  <tr class="">
    <th scope="row">Full Name:</th>
    <td><?php echo $full_name;?></td>
  </tr>
  <tr>
    <th scope="row">Item Name</th>
    <td><?php echo $itemName;?></td>
  </tr>
  <tr>
    <th scope="row">Unit Price:</th>
    <td>GH₵ <?php echo $itemPrice;?></td>
  </tr>
  <tr>
    <th scope="row">Quantity:</th>
    <td><?php echo $quantity;?></td>
  </tr>
  <tr>
    <th scope="row">Phone Number:</th>
    <td><?php echo $number;?></td>
  </tr>
  <tr>
    <th scope="row">Email:</th>
    <td><?php echo $email;?></td>
  </tr>
  <tr>
    <th scope="row">Date Ordered (Y-M-D):</th>
    <td><?php echo $order_date;?></td>
  </tr>
  <tr>
    <th scope="row">Total Amount:</th>
    <td>GH₵ <?php echo $total_amount;?></td>
  </tr>
  <tr>
    <th scope="row">Invoice Number:</th>
    <td><?php echo $invoice_number;?></td>
  </tr>
</table>

		</div>
    </div><!-- end of inner row-->
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
   