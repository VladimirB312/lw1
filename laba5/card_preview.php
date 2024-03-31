<a class="recent-card" title="<?= $row['title'] ?>" href="/post.php?id=<?= ($row['post_id']) ?>">
    <img class="recent-card__image" src="<?= $row['image_url'] ?>" alt="<?= $row['image_alt'] ?>">
    <h3 class="recent-card__title"><?= $row['title'] ?></h3>
    <h4 class="recent-card__subtitle"><?= $row['subtitle'] ?></h4>
    <div class="recent-card__info">
        <img class="recent-card__author-photo" src="<?= $row['author_url'] ?>" alt="<?= $row['author_alt'] ?>">
        <p class="recent-card__author-name"><?= $row['author'] ?></p>
        <p class="recent-card__date"><?= date("n/j/Y", strtotime($row['publish_date'])) ?></p>
    </div>
    <?php if ($row['sticker']) : ?>
        <div class="recent-card__sticker"><?= $row['sticker'] ?></div>
    <?php endif ?>
</a>