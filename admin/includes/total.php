<?php
$sql1 = ("select count(*) from posts WHERE deleted='0'");
$number = 0;
$result = mysqli_query($con,$sql1);
$row = mysqli_fetch_array($result);
$totalposts = $row[0];

$sql2 = ("select count(*) from categories");
$number = 0;
$result = mysqli_query($con,$sql2);
$row = mysqli_fetch_array($result);
$totalcats = $row[0];

$sql3 = ("select count(*) from user");
$number = 0;
$result = mysqli_query($con,$sql3);
$row = mysqli_fetch_array($result);
$totaluser = $row[0];

$sql4 = ("select count(description_image) from posts");
$number = 0;
$result = mysqli_query($con,$sql4);
$row = mysqli_fetch_array($result);
$totalmedia = $row[0];

$sql5 = ("select count(*) from comments");
$number = 0;
$result = mysqli_query($con,$sql5);
$row = mysqli_fetch_array($result);
$totalcom = $row[0];

$sql1 = ("select count(*) from gallery");
$number = 0;
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_array($result1);
$totalgallery = $row[0];

$sql1 = ("select count(*) from orders WHERE order_date = curdate()");
$number = 0;
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_array($result1);
$totalorders = $row[0];


$sql10 = ("select count(*) from pages");
$number = 0;
$result10 = mysqli_query($con,$sql10);
$row = mysqli_fetch_array($result10);
$totalpages = $row[0];
?>
