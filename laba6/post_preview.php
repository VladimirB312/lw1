<a class="card" title="<?= $post['title'] ?>" href="/post.php?id=<?= $post['post_id'] ?>">
  <img class="card__image" src="<?= $post['image_url'] ?>" alt="<?= $post['image_alt'] ?>">
  <h3 class="card__title"><?= $post['title'] ?></h3>
  <h4 class="card__subtitle"><?= $post['subtitle'] ?></h4>
  <div class="card__info">
    <img class="card__author-photo" src="<?= $post['author_photo_url'] ?>" alt="<?= $post['author_photo_alt'] ?>">
    <p class="card__author-name"><?= $post['author_name'] ?></p>
    <p class="card__date"><?= date("F j, Y", strtotime($post['publish_date'])) ?></p>
  </div>
  <?php if ($post['sticker']) : ?>
    <div class="card__sticker"><?= $post['sticker'] ?></div>
  <?php endif ?>
</a>