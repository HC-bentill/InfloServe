<?php
session_start();
include('includes/top.php');
include('../connect.php');

if (!isset($_SESSION['user']))
   {
      header("location: index.php");
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
		<div class="row">
        	<div class="col-md-10">
<form method="get" action="search.php">
<div class="input-group home_search" style="margin-top:10px; margin-bottom:10px; ">
   <input type="text" class="form-control" placeholder="search by invoice number" id="txtSearch" name="keywords" required/>
   <div class="input-group-btn pull-right">
       <button class="btn btn-primary" type="submit" id="home_sbmit_btn" name="search">
        <span class="fa fa-search"></span>
        </button>	
        	
   </div>
   </div>
</form>
			</div>
            
            <div class="col-md-2">
<div class="dropdown" id="orders_dropdown">
  <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    View by
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="view_orders.php">Current Orders</a>
    <a class="dropdown-item" href="all_orders.php">All Orders</a>
  </div>
</div>            
            </div>
		</div><!-- end of inner row-->
	
<table class="table table-responsive table-striped table-md table-bordered" id="table-responsive">
  <thead id="t_head">
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Item Name</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Quantity</th>
      <!--<th scope="col">Phone Number</th>-->
      <!--<th scope="col">Email</th>-->
      <th scope="col">Date Ordered (Y-M-D)</th>
      <!--<th scope="col">Total Amount</th>-->
      <th scope="col">Invoice Number</th>
      <th scope="col"></th>
      <!--<th scope="col">Delete</th>-->
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
    include('../connect.php');
	$get_pst = "select o.*, i.title as itemName, i.description as itemPrice from orders as o
					LEFT JOIN posts as i on (i.post_id=o.post_id) WHERE order_date = curdate() ORDER BY o.id DESC";
    $run_pst = mysqli_query($con, $get_pst);
    $i = 0;
    while($row_pst=mysqli_fetch_array($run_pst)){
		//$cat_name = $row_pst['post_cat'];
		//$showcat ="select * from categories where cat_id = '$cat_name'";
		//$show_result = $con->query($showcat);
		//$category = mysqli_fetch_assoc($show_result);
		//$cat = $category['category'];

        $id = $row_pst['id'];
        $full_name = $row_pst['name'];
        $itemName = $row_pst['itemName'];
        $itemPrice = $row_pst['itemPrice'];
        $quantity = $row_pst['quantity'];
		$number = $row_pst['number'];
		$email = $row_pst['email'];
		$order_date = $row_pst['order_date'];
		$order_time = $row_pst['order_time'];
		$invoice_number = $row_pst['invoice_number'];
		
		$total_amount = $itemPrice * $quantity;
       
    ?>
    <tr align = "">
        <td><?php echo $full_name; ?></td>
        <td><?php echo $itemName; ?></td>
        <td><button type="button" class="btn btn-primary table_btn">GH₵ <?php echo $itemPrice; ?></button></td>
        <td><?php echo $quantity;?></td>
        <td style="color:red; font-weight:bold;"><?php echo $order_date. " " .$order_time;?></td>
        <td><?php echo $invoice_number;?></td>
        <td><a href="details.php?id=<?= $id;?>"><button type="button" class="btn btn-success table_btn">more details</button></a></td>
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