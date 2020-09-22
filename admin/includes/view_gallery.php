<?php
include('../connect.php');
$Sql ="SELECT * FROM gallery ORDER BY id DESC";
$result = $con->query($Sql);

?>

<table class="table table-responsive table-striped table-bordered" style="height:200px;">
  <thead id="t_head">
    <tr style="background-color:#007bff; color:white;">
      <th scope="col">Title</th>
      <th scope="col" width="500">Media</th>
      <th scope="col" width="500">Date Posted</th>
      <!--<th scope="col">Edit</th>-->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php while($gallery = mysqli_fetch_assoc($result)) : ?>
		<?php 
$cat_name = $gallery['title'];
$showcat ="select * from gallery_category where id = '$cat_name'";
$show_result = $con->query($showcat);
$category = mysqli_fetch_assoc($show_result);
$cat = $category['cat_name'];
		?>

    <tr align = "">
        <td><?php echo $cat;?></td>
        <td><img src="../images/uploads/gallery/<?= $gallery['media'];?>" style="width: 100%;">
        <td><?= $gallery['date_posted'];?></td>
        <!--<td><a href="">Edit</a></td>-->
        <td><a href="gallery-album.php?delete=<?= $gallery['id'];?>" onClick="return checkDelete()"><i class="fa fa-remove fa" title="delete"></i></a></td>
    </tr>
<?php endwhile;?>
  </tbody>
</table>
           