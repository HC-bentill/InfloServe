<?php
include('../connect.php');
$Sql ="SELECT * FROM gallery_category ORDER BY id DESC";
$result = $con->query($Sql);

?>

<table class="table table-responsive table-striped table-bordered" style="height:200px;">
  <thead id="t_head">
    <tr style="background-color:#007bff; color:white;">
      <th scope="col">Title</th>
      <th scope="col">Date Posted</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php while($gallery = mysqli_fetch_assoc($result)) : ?>
		<?php 
/*$cat_name = $gallery['title'];
$showcat ="select * from gallery_category where id = '$cat_name'";
$show_result = $con->query($showcat);
$category = mysqli_fetch_assoc($show_result);
$cat = $category['cat_name'];*/
		?>

    <tr align = "">
        <td><?= $gallery['cat_name'];?></td>
        <td><?= $gallery['date_posted'];?></td>
        <td><a href="edit-gallery-album.php?edit_gallery=<?= $gallery['id'];?>"><i class="fa fa-pencil fa" title="edit"></i></a>
        <a href="gallery-album.php?delete=<?= $gallery['id'];?>" onClick="return checkDelete()"><i class="fa fa-remove fa" title="delete"></i></a></td>
    </tr>
<?php endwhile;?>
  </tbody>
</table>
           