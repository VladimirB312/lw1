<a class="recent-card" title="<?= $post['title'] ?>" href="/post.php?id=<?= ($post['post_id']) ?>">
    <img class="recent-card__image" src="<?= $post['image_url'] ?>" alt="<?= $post['image_alt'] ?>">
    <h3 class="recent-card__title"><?= $post['title'] ?></h3>
    <h4 class="recent-card__subtitle"><?= $post['subtitle'] ?></h4>
    <div class="recent-card__info">
        <img class="recent-card__author-photo" src="<?= $post['author_photo_url'] ?>" alt="<?= $post['author_photo_alt'] ?>">
        <p class="recent-card__author-name"><?= $post['author_name'] ?></p>
        <p class="recent-card__date"><?= date("n/j/Y", strtotime($post['publish_date'])) ?></p>
    </div>
    <?php if ($post['sticker']) : ?>
        <div class="recent-card__sticker"><?= $post['sticker'] ?></div>
    <?php endif ?>
</a>