<?php
$catSql ="SELECT * FROM categories WHERE cat_id != 24 ORDER BY category ASC";
$catresult = $con->query($catSql);
?>

<div class="dropdown">
          <button
            class="btn btn-secondary dropdown-toggle w3-animate-right"
            type="button"
            id="dropdownMenuButton"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            Categrories
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<?php while($posts = mysqli_fetch_assoc($catresult)) : ?>
            <a class="dropdown-item" href="categories.php?cat=<?=$posts['cat_id'];?>#<?=$posts['category'];?>"><?= $posts['category'];?></a>
<?php endwhile;?>
          </div>
        </div><!--end of dropdown-->