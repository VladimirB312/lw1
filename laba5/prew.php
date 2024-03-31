<a class="card" title="<?= $row['title'] ?>" href="/row?id=<?= bin2hex($row['post_id']) ?>">
  <img class="card__image" src="<?= $row['image_url'] ?>" alt="The Road Ahead">
  <h3 class="card__title"><?= $row['title'] ?></h3>
  <h4 class="card__subtitle"><?= $row['subtitle'] ?></h4>
  <div class="card__info">
    <img class="card__author-photo" src="<?= $row['author_url'] ?>" alt="Mat Vogels">
    <p class="card__author-name"><?= $row['author'] ?></p>
    <p class="card__date"><?= $row['publish_date'] ?></p>
  </div>
</a>