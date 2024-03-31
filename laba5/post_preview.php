<a class="card" title="<?= $row['title'] ?>" href="/post.php?id=<?= $row['post_id'] ?>">
  <img class="card__image" src="<?= $row['image_url'] ?>" alt="<?= $row['image_alt'] ?>">
  <h3 class="card__title"><?= $row['title'] ?></h3>
  <h4 class="card__subtitle"><?= $row['subtitle'] ?></h4>
  <div class="card__info">
    <img class="card__author-photo" src="<?= $row['author_url'] ?>" alt="<?= $row['author_alt'] ?>">
    <p class="card__author-name"><?= $row['author'] ?></p>
    <p class="card__date"><?= date("F j, Y", strtotime($row['publish_date'])) ?></p>
  </div>
  <?php if ($row['sticker']) : ?>
    <div class="card__sticker"><?= $row['sticker'] ?></div>
  <?php endif ?>
</a>